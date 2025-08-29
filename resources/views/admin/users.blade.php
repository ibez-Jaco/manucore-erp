@extends('layouts.panel')
@section('title', 'Users - ManuCore ERP')
@section('header', 'User Management')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">System Users</h2>
        <button class="erp-btn-primary">Add User</button>
    </div>
    <table class="erp-table">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3">Admin User</td>
                <td class="px-4 py-3">admin@manucore.co.za</td>
                <td class="px-4 py-3">Administrator</td>
                <td class="px-4 py-3"><span class="erp-badge">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
