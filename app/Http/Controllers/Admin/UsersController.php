<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    // Roles quick view (existing)
    public function roles(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $roles = Role::query()
            ->withCount(['users','permissions'])
            ->when($q !== '', fn($qry) => $qry->where('name', 'like', "%{$q}%"))
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $totals = [
            'users' => (int) User::count(),
            'roles' => (int) Role::count(),
            'perms' => (int) \Spatie\Permission\Models\Permission::count(),
        ];

        return view('admin.roles.index', compact('roles', 'totals', 'q'));
    }

    // Index (legacy route name: admin.users)
    public function index(Request $request)
    {
        $q      = trim((string) $request->get('q', ''));
        $sort   = in_array($request->get('sort'), ['name','email','created_at','is_active'], true) ? $request->get('sort') : 'created_at';
        $dir    = $request->get('dir') === 'asc' ? 'asc' : 'desc';
        $status = $request->get('status'); // 'active' | 'inactive' | null

        $users = User::query()
            ->select(['id','name','email','email_verified_at','is_active','created_at'])
            ->with(['roles:id,name'])
            ->when($q !== '', function ($qry) use ($q) {
                $qry->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->when($status === 'active', fn($qry) => $qry->where('is_active', true))
            ->when($status === 'inactive', fn($qry) => $qry->where('is_active', false))
            ->orderBy($sort, $dir)
            ->paginate(15)
            ->withQueryString();

        $roleCounts = Role::query()->withCount('users')->orderBy('name')->get(['id','name']);

        $totals = [
            'users'    => (int) User::count(),
            'verified' => (int) User::whereNotNull('email_verified_at')->count(),
            'roles'    => (int) Role::count(),
        ];

        return view('admin.users.index', compact('users','roleCounts','totals','q','sort','dir','status'));
    }

    public function create()
    {
        $roles = Role::query()->orderBy('name')->pluck('name')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        // Create in a transaction and RETURN the user (so we can use it after commit).
        $user = DB::transaction(function () use ($data) {
            $user = new User();
            $user->name       = $data['name'];
            $user->email      = mb_strtolower($data['email']);
            $user->password   = Hash::make($data['password']);
            $user->is_active  = (bool)($data['is_active'] ?? true);
            $user->save();

            if (!empty($data['roles'])) {
                $user->syncRoles($data['roles']);
            }

            return $user;
        });

        // Send verification email AFTER the commit; never break the request on mail errors.
        if (!empty($data['send_verification']) && !$user->hasVerifiedEmail()) {
            try {
                $user->sendEmailVerificationNotification(); // queued via custom notification
            } catch (\Throwable $e) {
                Log::warning('User create: verification mail failed', [
                    'user_id' => $user->id,
                    'error'   => $e->getMessage(),
                ]);
                return redirect()
                    ->route('admin.users')
                    ->with('warning', 'User created. Verification email could not be sent (check mailer).');
            }
        }

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::query()->orderBy('name')->pluck('name')->all();
        $userRoles = $user->roles->pluck('name')->all();
        return view('admin.users.edit', compact('user','roles','userRoles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $emailChanged = false;

        DB::transaction(function () use ($user, $data, &$emailChanged) {
            $user->name  = $data['name'];

            // Track if email actually changed (case-insensitive)
            $newEmail = mb_strtolower($data['email']);
            if ($newEmail !== mb_strtolower($user->email)) {
                $user->email = $newEmail;
                $user->email_verified_at = null; // force reverify on email change
                $emailChanged = true;
            }

            if (!empty($data['password'])) {
                $user->password = Hash::make($data['password']);
            }

            if (array_key_exists('is_active', $data)) {
                // Prevent self-deactivation
                if ((int) $user->id === (int) Auth::id() && !$data['is_active']) {
                    abort(422, 'You cannot deactivate your own account.');
                }
                $user->is_active = (bool) $data['is_active'];
            }

            $user->save();

            if (isset($data['roles'])) {
                // Guard: cannot remove Admin from the last Admin
                if ($user->hasRole('Admin') && !in_array('Admin', $data['roles'], true) && $this->isLastAdmin($user)) {
                    abort(422, 'You cannot remove Admin role from the last Admin user.');
                }
                // Guard: cannot remove your own Admin role
                if ((int) $user->id === (int) Auth::id() && !in_array('Admin', $data['roles'], true)) {
                    abort(422, 'You cannot remove your own Admin role.');
                }
                $user->syncRoles($data['roles']);
            }
        });

        // If email changed, (re)send verification — never fail the request if mail throws.
        if ($emailChanged && !$user->hasVerifiedEmail()) {
            try {
                $user->sendEmailVerificationNotification();
            } catch (\Throwable $e) {
                Log::warning('User update: verification mail failed', [
                    'user_id' => $user->id,
                    'error'   => $e->getMessage(),
                ]);
                return redirect()
                    ->route('admin.users')
                    ->with('warning', 'User updated. Re-verification email could not be sent.');
            }
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ((int) $user->id === (int) Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->hasRole('Admin') && $this->isLastAdmin($user)) {
            return back()->with('error', 'You cannot delete the last Admin user.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function toggleActive(User $user)
    {
        if ((int) $user->id === (int) Auth::id()) {
            return back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        return back()->with('success', $user->is_active ? 'User activated.' : 'User deactivated.');
    }

    public function assignRoles(Request $request, User $user)
    {
        $roles = (array) $request->input('roles', []);
        $request->validate([
            'roles' => ['array'],
            'roles.*' => ['string', 'exists:roles,name'],
        ]);

        if ((int) $user->id === (int) Auth::id() && !in_array('Admin', $roles, true)) {
            return back()->with('error', 'You cannot remove your own Admin role.');
        }
        if ($user->hasRole('Admin') && !in_array('Admin', $roles, true) && $this->isLastAdmin($user)) {
            return back()->with('error', 'You cannot remove Admin role from the last Admin user.');
        }

        $user->syncRoles($roles);
        return back()->with('success', 'Roles updated.');
    }

    public function resendVerification(User $user)
    {
        if ($user->hasVerifiedEmail()) {
            return back()->with('warning', 'User already verified.');
        }

        try {
            $user->sendEmailVerificationNotification();
        } catch (\Throwable $e) {
            Log::warning('Resend verification failed', [
                'user_id' => $user->id,
                'error'   => $e->getMessage(),
            ]);
            return back()->with('error', 'Could not send verification email. Check mailer.');
        }

        return back()->with('success', 'Verification email sent.');
    }

    private function isLastAdmin(User $user): bool
    {
        if (!$user->hasRole('Admin')) return false;
        $adminCount = User::role('Admin')->count();
        return $adminCount <= 1;
    }
}
