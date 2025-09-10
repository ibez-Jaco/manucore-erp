<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        // Keep existing behavior, but redirect to the users quick view for convenience
        return redirect()->route('admin.users');
    }

    public function users(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $usersQuery = User::query()
            ->select(['id','name','email','email_verified_at','created_at'])
            ->with(['roles:id,name'])
            ->when($q !== '', function ($qry) use ($q) {
                $qry->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->latest('created_at');

        $users = $usersQuery->paginate(15)->withQueryString();

        $roleCounts = Role::query()
            ->withCount('users')
            ->orderBy('name')
            ->get(['id','name']);

        $totals = [
            'users'    => (int) User::count(),
            'verified' => (int) User::whereNotNull('email_verified_at')->count(),
            'roles'    => (int) Role::count(),
        ];

        return view('admin.users.index', compact('users', 'roleCounts', 'totals', 'q'));
    }

    public function roles(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $roles = Role::query()
            ->withCount(['users','permissions'])
            ->when($q !== '', function ($qry) use ($q) {
                $qry->where('name', 'like', "%{$q}%");
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $totals = [
            'users'    => (int) User::count(),
            'roles'    => (int) Role::count(),
            'perms'    => (int) \Spatie\Permission\Models\Permission::count(),
        ];

        return view('admin.roles.index', compact('roles', 'totals', 'q'));
    }
}
