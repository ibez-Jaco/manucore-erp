@extends('layouts.panel')
@section('title', 'Branches - ManuCore ERP')
@section('header', 'Branch Management')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">Branches</h2>
        <button class="erp-btn-primary">Add Branch</button>
    </div>
    <table class="erp-table">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-3 text-left">Branch Name</th>
                <th class="px-4 py-3 text-left">Location</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3">Head Office</td>
                <td class="px-4 py-3">Johannesburg</td>
                <td class="px-4 py-3"><span class="erp-badge">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
