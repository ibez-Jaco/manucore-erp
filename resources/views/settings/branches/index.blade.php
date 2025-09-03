{{-- resources/views/settings/branches/index.blade.php --}}
@extends('layouts.panel')

@section('title', 'Branches - ManuCore ERP')
@section('header', 'Branch Management')

@section('content')
    @include('settings.partials._errors')
    @include('settings.partials._flash')

    <div class="mb-4 erp-card">
        <form method="GET" class="flex flex-wrap items-center gap-3">
            <input type="text" name="q" value="{{ $q }}" class="w-48 erp-input" placeholder="Search branches…">

            <select name="company_id" class="w-48 erp-input">
                <option value="">All companies</option>
                @foreach($companies as $c)
                    <option value="{{ $c->id }}" @selected($companyId == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>

            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="trashed" value="1" {{ $showTrashed ? 'checked' : '' }} onchange="this.form.submit()">
                <span>Show bin</span>
            </label>

            <button class="erp-btn-secondary">Apply</button>

            <a href="{{ route('settings.branches.create') }}" class="ml-auto erp-btn-primary">Add Branch</a>
        </form>
    </div>

    <div class="erp-card">
        <table class="erp-table">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Company</th>
                    <th class="px-4 py-3 text-left">Location</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branches as $b)
                    <tr>
                        <td class="px-4 py-3">{{ $b->name }}</td>
                        <td class="px-4 py-3">{{ optional($b->company)->name }}</td>
                        <td class="px-4 py-3">{{ $b->city }}{{ $b->city && $b->country ? ', ' : '' }}{{ $b->country }}</td>
                        <td class="px-4 py-3">
                            @if($showTrashed)
                                <span class="erp-badge erp-badge-danger">Deleted</span>
                            @else
                                @if($b->is_head_office)
                                    <span class="erp-badge erp-badge-primary">Head Office</span>
                                @endif
                                <span class="erp-badge">{{ $b->is_active ? 'Active' : 'Inactive' }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 space-x-2 text-right">
                            @if($showTrashed)
                                <form action="{{ route('settings.branches.restore', $b->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="erp-btn-secondary">Restore</button>
                                </form>

                                <form action="{{ route('settings.branches.forceDelete', $b->id) }}" method="POST" class="inline js-force"
                                      onsubmit="return false;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="erp-btn-danger">Delete forever</button>
                                </form>
                            @else
                                <a href="{{ route('settings.branches.edit', $b) }}" class="erp-btn-secondary">Edit</a>

                                <form action="{{ route('settings.branches.destroy', $b) }}" method="POST" class="inline js-delete"
                                      onsubmit="return false;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="erp-btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">No branches found.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $branches->links() }}
        </div>
    </div>

    <script>
        // SweetAlert2 enhancements (fallback to native confirm if Swal missing)
        document.querySelectorAll('form.js-delete').forEach((f) => {
            f.addEventListener('submit', (e) => {
                e.preventDefault();
                if (!window.Swal) { if (confirm('Delete this branch?')) f.submit(); return; }
                Swal.fire({
                    title: 'Delete branch?',
                    text: 'The branch will be moved to the bin (soft delete).',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                }).then(res => { if (res.isConfirmed) f.submit(); });
            });
        });

        document.querySelectorAll('form.js-force').forEach((f) => {
            f.addEventListener('submit', (e) => {
                e.preventDefault();
                if (!window.Swal) { if (confirm('Permanently delete this branch?')) f.submit(); return; }
                Swal.fire({
                    title: 'Delete forever?',
                    text: 'This action cannot be undone.',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonText: 'Delete forever',
                }).then(res => { if (res.isConfirmed) f.submit(); });
            });
        });
    </script>
@endsection
