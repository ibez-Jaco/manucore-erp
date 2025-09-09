{{-- resources/views/settings/company/basic.blade.php --}}
@extends('layouts.panel')

@section('title', 'Company Basic Information - ManuCore ERP')

@section('content')
@includeIf('components.flash')

<div class="space-y-8">
    
    {{-- Navigation Tabs --}}
    @include('settings.company.partials.tabs')

    {{-- Basic Information Form --}}
    <div class="w-full">
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl">

            {{-- Error Display --}}
            @if ($errors->any())
                <div class="mx-8 mt-6">
                    <div class="p-4 border border-red-200 rounded-lg bg-red-50">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                            </svg>
                            <div>
                                <h3 class="mb-2 font-medium text-red-800">Please correct the following errors:</h3>
                                <ul class="space-y-1 text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li class="flex items-center gap-2">
                                            <div class="w-1 h-1 bg-red-500 rounded-full"></div>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Form Content --}}
            <form method="POST" action="{{ route('settings.company.basic.update') }}" class="p-8">
                @csrf
                
                <div class="space-y-8">
                    {{-- Company Identity Section --}}
                    <div>
                        <h2 class="flex items-center gap-2 mb-6 text-lg font-semibold text-gray-900">
                            <div class="w-2 h-6 bg-blue-500 rounded-full"></div>
                            Company Identity
                        </h2>
                        
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Company Name --}}
                            <div class="md:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Company Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.75m-.75 3h.75m-.75 3h.75m-3.75-16.5h.75m-.75 3h.75m-.75 3h.75m-.75 3h.75"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="name" 
                                        name="name" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('name') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('name', $company->name) }}" 
                                        required
                                        placeholder="Enter your company's trading name"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">This is the name your company operates under and appears on invoices</p>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Legal Name --}}
                            <div class="md:col-span-2">
                                <label for="legal_name" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Legal Name
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3-7.5H21m-4.5 0a2.25 2.25 0 0 1-2.25-2.25V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.125-.08M15.75 18a2.25 2.25 0 0 0 2.25-2.25V9.75a2.25 2.25 0 0 0-2.25-2.25H8.25A2.25 2.25 0 0 0 6 9.75v8.25A2.25 2.25 0 0 0 8.25 20.25h7.5Z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="legal_name" 
                                        name="legal_name" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('legal_name') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('legal_name', $company->legal_name) }}"
                                        placeholder="Enter the official registered legal name"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">The official name as registered with authorities (if different from company name)</p>
                                @error('legal_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Registration Number --}}
                            <div class="md:col-span-1">
                                <label for="registration_number" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Registration Number
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5ZM12.75 9a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0ZM12 12.75a4.5 4.5 0 0 0-4.5 4.5"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="registration_number" 
                                        name="registration_number" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('registration_number') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('registration_number', $company->registration_number) }}"
                                        placeholder="e.g., 2021/123456/07"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Company registration number (CK, CC, or similar)</p>
                                @error('registration_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Current Status Display --}}
                    @if($company->name || $company->legal_name || $company->registration_number)
                    <div class="p-6 border border-blue-200 rounded-lg bg-blue-50">
                        <h3 class="flex items-center gap-2 mb-4 text-sm font-semibold text-blue-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Current Configuration
                        </h3>
                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">
                            <div>
                                <p class="font-medium text-blue-700">Company Name</p>
                                <p class="text-blue-900">{{ $company->name ?: 'Not set' }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-blue-700">Legal Name</p>
                                <p class="text-blue-900">{{ $company->legal_name ?: 'Same as company name' }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-blue-700">Registration</p>
                                <p class="text-blue-900">{{ $company->registration_number ?: 'Not registered' }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Form Actions --}}
                <div class="flex items-center justify-between pt-8 mt-8 border-t border-gray-200">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                        </svg>
                        <span class="text-sm text-gray-600">All changes are saved securely</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('settings.company') }}" class="inline-flex items-center gap-2 px-6 py-3 text-gray-700 transition-colors bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Save Basic Information
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection