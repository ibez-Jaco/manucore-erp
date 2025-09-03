<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreBranchRequest;
use App\Http\Requests\Settings\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','role:Admin|SettingsManager']);
    }

    public function index(Request $request)
    {
        $q           = trim((string) $request->get('q', ''));
        $companyId   = (int) $request->get('company_id');
        $showTrashed = $request->boolean('trashed');

        $branches = Branch::query()
            ->when($showTrashed, fn ($b) => $b->onlyTrashed())
            ->with(['company','manager'])
            ->when($q !== '', function ($builder) use ($q) {
                $builder->where(function ($w) use ($q) {
                    $w->where('name', 'like', "%{$q}%")
                      ->orWhere('city', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->when($companyId, fn ($b) => $b->where('company_id', $companyId))
            ->orderByDesc('is_head_office')
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $companies = Company::orderBy('name')->get();

        return view('settings.branches.index', compact('branches','companies','q','companyId','showTrashed'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->get();
        $users     = User::orderBy('name')->get();

        return view('settings.branches.create', compact('companies','users'));
    }

    public function store(StoreBranchRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['is_head_office'])) {
            Branch::where('company_id', $data['company_id'])->update(['is_head_office' => false]);
        }

        Branch::create($data);

        return redirect()
            ->route('settings.branches.index')
            ->with('success', 'Branch created successfully.');
    }

    public function edit(Branch $branch)
    {
        $companies = Company::orderBy('name')->get();
        $users     = User::where('company_id', $branch->company_id)->orderBy('name')->get();

        return view('settings.branches.edit', compact('branch','companies','users'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $data = $request->validated();

        if (!empty($data['is_head_office'])) {
            Branch::where('company_id', $branch->company_id)
                ->where('id', '!=', $branch->id)
                ->update(['is_head_office' => false]);
        }

        $branch->update($data);

        return redirect()
            ->route('settings.branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        if ($branch->is_head_office) {
            return back()->with('error', 'Cannot delete the head office branch.');
        }

        if (method_exists($branch, 'users') && $branch->users()->count() > 0) {
            return back()->with('error', 'Cannot delete a branch with assigned users.');
        }

        $branch->delete();

        return redirect()
            ->route('settings.branches.index', ['trashed' => 1])
            ->with('success', 'Branch moved to bin.');
    }

    public function restore($branchId)
    {
        $branch = Branch::withTrashed()->findOrFail($branchId);
        if (!$branch->trashed()) {
            return back()->with('info', 'Branch is not in the bin.');
        }

        $branch->restore();

        return redirect()
            ->route('settings.branches.index')
            ->with('success', 'Branch restored.');
    }

    public function forceDelete($branchId)
    {
        $branch = Branch::withTrashed()->findOrFail($branchId);

        if (!$branch->trashed()) {
            return back()->with('error', 'Only items in the bin can be permanently deleted.');
        }

        if ($branch->is_head_office) {
            return back()->with('error', 'Cannot permanently delete the head office branch.');
        }

        $branch->forceDelete();

        return redirect()
            ->route('settings.branches.index', ['trashed' => 1])
            ->with('success', 'Branch permanently deleted.');
    }

    public function updateHours(Request $request, Branch $branch)
    {
        $days  = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        $hours = [];

        foreach ($days as $day) {
            $hours[$day] = [
                'is_open' => (bool) $request->boolean("{$day}_is_open"),
                'open'    => (string) $request->input("{$day}_open", ''),
                'close'   => (string) $request->input("{$day}_close", ''),
            ];
        }

        $branch->update(['operating_hours' => $hours]);

        return back()->with('success', 'Operating hours updated.');
    }
}
