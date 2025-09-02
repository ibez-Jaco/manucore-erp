@extends('layouts.panel')

@section('title', 'Branches - ManuCore ERP')
@section('header', 'Branch Management')

@section('content')
<div class="erp-card">
    <div class="flex items-center justify-between mb-6">
        <h2 class="erp-header">Branches</h2>
        <button class="erp-btn-primary" type="button">Add Branch</button>
    </div>

    <table class="w-full erp-table">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-3 text-left">Branch Name</th>
                <th class="px-4 py-3 text-left">Location</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse(($branches ?? []) as $branch)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $branch->name }}</td>
                    <td class="px-4 py-3">{{ $branch->city ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <span class="erp-badge">{{ $branch->is_active ? 'Active' : 'Inactive' }}</span>
                    </td>
                </tr>
            @empty
                <tr class="border-t">
                    <td class="px-4 py-3" colspan="3">No branches found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
