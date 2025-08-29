@extends('layouts.front')
@section('title', 'ManuCore - Modern ERP Solutions')
@section('content')
<div class="front-hero text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to ManuCore ERP</h1>
        <p class="text-xl mb-8">Modern Manufacturing Resource Planning</p>
        <a href="{{ route('dashboard') }}" class="erp-btn bg-white text-blue-600 hover:bg-gray-100">Get Started</a>
    </div>
</div>
<div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="erp-card">
            <h3 class="erp-header mb-4">Customer Management</h3>
            <p class="text-gray-600">Comprehensive CRM capabilities.</p>
        </div>
        <div class="erp-card">
            <h3 class="erp-header mb-4">Quote Builder</h3>
            <p class="text-gray-600">Dynamic quote generation.</p>
        </div>
        <div class="erp-card">
            <h3 class="erp-header mb-4">Document Management</h3>
            <p class="text-gray-600">Secure document storage.</p>
        </div>
    </div>
</div>
@endsection
