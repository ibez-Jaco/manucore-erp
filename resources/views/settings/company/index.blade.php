{{-- resources/views/settings/company/index.blade.php --}}
@extends('layouts.panel')

@section('title', 'Company Profile - ManuCore ERP')

@section('content')
@includeIf('components.flash')

<div class="space-y-8">
    
    {{-- Navigation Tabs --}}
    @include('settings.company.partials.tabs')

    {{-- Company Profile Dashboard --}}
    <div class="space-y-8">
        
        {{-- Company Overview Cards --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
            {{-- Profile Completeness --}}
            <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-blue-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.75m-.75 3h.75m-.75 3h.75m-3.75-16.5h.75m-.75 3h.75m-.75 3h.75m-.75 3h.75"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Profile Status</p>
                            <p class="text-lg font-bold text-gray-900">
                                @php
                                    $completed = 0;
                                    $total = 9;
                                    if($company->name) $completed++;
                                    if($company->email) $completed++;
                                    if($company->phone) $completed++;
                                    if($company->full_address) $completed++;
                                    if($company->currency_code) $completed++;
                                    if($company->vat_rate !== null) $completed++;
                                    if($company->timezone) $completed++;
                                    if($company->email_from_address) $completed++;
                                    if($company->registration_number) $completed++;
                                    $percentage = round(($completed / $total) * 100);
                                @endphp
                                {{ $percentage }}% Complete
                            </p>
                        </div>
                    </div>
                    <div class="w-3 h-3 rounded-full {{ $percentage >= 80 ? 'bg-green-500' : ($percentage >= 50 ? 'bg-yellow-500' : 'bg-red-500') }} animate-pulse"></div>
                </div>
                <div class="mt-3">
                    <div class="w-full h-2 bg-gray-200 rounded-full">
                        <div class="h-2 transition-all duration-500 bg-blue-500 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">{{ $completed }} of {{ $total }} sections configured</p>
                </div>
            </div>

            {{-- Business Status --}}
            <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-green-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Business Status</p>
                            <p class="text-lg font-bold text-gray-900">Active</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-green-600">
                            {{ $company->is_vat_registered ? 'VAT Reg.' : 'Standard' }}
                        </div>
                        <div class="text-xs text-gray-500">{{ $company->registration_number ? 'Registered' : 'Setup' }}</div>
                    </div>
                </div>
                <div class="text-sm text-gray-600">
                    <p>{{ $company->currency_symbol ?? '$' }} {{ strtoupper($company->currency_code ?? 'USD') }} Operating Currency</p>
                    <p class="mt-1 text-xs text-gray-500">Tax Rate: {{ number_format($company->vat_rate ?? 0, 1) }}%</p>
                </div>
            </div>

            {{-- Location Info --}}
            <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-purple-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Primary Location</p>
                            <p class="text-lg font-bold text-gray-900">
                                @php
                                    $city = '';
                                    if ($company->city) {
                                        $city = $company->city;
                                    } elseif ($company->full_address) {
                                        // Try to extract city from address
                                        $parts = explode(',', $company->full_address);
                                        $city = count($parts) > 1 ? trim($parts[count($parts)-2]) : 'Set Location';
                                    } else {
                                        $city = 'Not Set';
                                    }
                                @endphp
                                {{ $city }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-purple-600">{{ $company->timezone ? str_replace('_', ' ', explode('/', $company->timezone)[1] ?? $company->timezone) : 'UTC' }}</div>
                        <div class="text-xs text-gray-500">Timezone</div>
                    </div>
                </div>
                <div class="text-sm text-gray-600">
                    <p>{{ $company->full_address ? 'Address configured' : 'Address needed' }}</p>
                    <p class="mt-1 text-xs text-gray-500">{{ $company->full_postal_address ? 'Postal address set' : 'Physical only' }}</p>
                </div>
            </div>

            {{-- System Integration --}}
            <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-orange-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 bg-orange-100 rounded-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.932 6.932 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Integration</p>
                            <p class="text-lg font-bold text-gray-900">
                                {{ ($company->email_from_address && $company->mail_host) ? 'Connected' : 'Pending' }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-orange-600">{{ $company->mail_mailer ? strtoupper($company->mail_mailer) : 'SMTP' }}</div>
                        <div class="text-xs text-gray-500">Email System</div>
                    </div>
                </div>
                <div class="text-sm text-gray-600">
                    <p>{{ $company->email_from_address ? 'Email configured' : 'Setup required' }}</p>
                    <p class="mt-1 text-xs text-gray-500">{{ $company->mail_host ? 'Server connected' : 'No mail server' }}</p>
                </div>
            </div>
        </div>

        {{-- Main Company Information Sections --}}
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            
            {{-- Company Profile Section --}}
            <div class="space-y-6 lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">Company Profile</h2>
                        <p class="mt-1 text-sm text-gray-600">Essential business information and identity</p>
                    </div>
                </div>

                <div class="space-y-6">
                    {{-- Business Identity Card --}}
                    <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-start gap-4">
                                <div class="flex items-center justify-center w-16 h-16 text-xl font-bold text-white bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                                    {{ $company->name ? strtoupper(substr($company->name, 0, 2)) : 'CO' }}
                                </div>
                                <div>
                                    <h3 class="mb-1 text-xl font-semibold text-gray-900">{{ $company->name ?: 'Company Name Not Set' }}</h3>
                                    @if($company->legal_name && $company->legal_name !== $company->name)
                                        <p class="mb-2 text-gray-600">Legal Name: {{ $company->legal_name }}</p>
                                    @endif
                                    @if($company->registration_number)
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">
                                                Reg: {{ $company->registration_number }}
                                            </span>
                                            @if($company->is_vat_registered)
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                                    VAT Registered
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('settings.company.basic') }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 text-blue-700 transition-colors rounded-lg bg-blue-50 hover:bg-blue-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                </svg>
                                Edit Basic Info
                            </a>
                        </div>

                        {{-- Quick Stats Grid --}}
                        <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-100 md:grid-cols-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">{{ $company->currency_symbol ?: '$' }}</div>
                                <div class="text-xs text-gray-500">Currency</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">{{ number_format($company->vat_rate ?? 15, 0) }}%</div>
                                <div class="text-xs text-gray-500">VAT Rate</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">{{ $company->timezone ? str_replace('_', ' ', explode('/', $company->timezone)[1] ?? 'UTC') : 'UTC' }}</div>
                                <div class="text-xs text-gray-500">Timezone</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold {{ $percentage >= 80 ? 'text-green-600' : ($percentage >= 50 ? 'text-yellow-600' : 'text-red-600') }}">{{ $percentage }}%</div>
                                <div class="text-xs text-gray-500">Complete</div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact & Address Section --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        {{-- Contact Information --}}
                        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-lg">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                                        </svg>
                                    </div>
                                    <h3 class="font-semibold text-gray-900">Contact Information</h3>
                                </div>
                                <a href="{{ route('settings.company.contact') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Edit</a>
                            </div>
                            <div class="space-y-3">
                                @if($company->email)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                        </svg>
                                        <span class="text-sm text-gray-900">{{ $company->email }}</span>
                                    </div>
                                @endif
                                @if($company->phone)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                                        </svg>
                                        <span class="text-sm text-gray-900">{{ $company->phone }}</span>
                                    </div>
                                @endif
                                @if($company->website)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3s-4.5 4.03-4.5 9 2.015 9 4.5 9Zm8.716-6.747a9.028 9.028 0 0 1-8.716 6.747m8.716-6.747L21 14.25m-8.716 6.747 1.716.003"/>
                                        </svg>
                                        <span class="text-sm text-gray-900">{{ $company->website }}</span>
                                    </div>
                                @endif
                                @if(!$company->email && !$company->phone && !$company->website)
                                    <p class="text-sm italic text-gray-500">No contact information configured</p>
                                @endif
                            </div>
                        </div>

                        {{-- Address Information --}}
                        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 bg-teal-100 rounded-lg">
                                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                        </svg>
                                    </div>
                                    <h3 class="font-semibold text-gray-900">Business Address</h3>
                                </div>
                                <a href="{{ route('settings.company.address') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Edit</a>
                            </div>
                            <div class="space-y-3">
                                @if($company->full_address)
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Physical Address</p>
                                        <p class="text-sm text-gray-900">{{ $company->full_address }}</p>
                                    </div>
                                @endif
                                @if($company->full_postal_address && $company->full_postal_address !== $company->full_address)
                                    <div>
                                        <p class="mb-1 text-xs font-medium text-gray-500">Postal Address</p>
                                        <p class="text-sm text-gray-900">{{ $company->full_postal_address }}</p>
                                    </div>
                                @endif
                                @if(!$company->full_address && !$company->full_postal_address)
                                    <p class="text-sm italic text-gray-500">No addresses configured</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Configuration Sidebar --}}
            <div class="space-y-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Configuration</h2>
                        <p class="mt-1 text-sm text-gray-600">System and business settings</p>
                    </div>
                </div>

                <div class="space-y-4">
                    {{-- Financial Settings --}}
                    <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg hover:shadow-md hover:border-orange-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center justify-center w-8 h-8 bg-orange-100 rounded-lg">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H3.75m0 0h-.375M21 10.5h.75c.621 0 1.125.504 1.125 1.125v.375m0 0c0 .621-.504 1.125-1.125 1.125H21m0 0h.375m0 0v-.375c0-.621.504-1.125 1.125-1.125m0 1.125h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.157 3.216 0 1.584-.233 2.707-1.627 2.707-3.227 0-1.6-1.123-2.994-2.707-3.227a15.72 15.72 0 0 0-3.216 0c-1.584.233-2.707 1.627-2.707 3.227Z"/>
                                    </svg>
                                </div>
                                <h3 class="font-medium text-gray-900">Financial Setup</h3>
                            </div>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('settings.company.financial') }}" class="text-xs text-blue-600 hover:text-blue-700">Edit</a>
                                <span class="text-gray-300">|</span>
                                <a href="{{ route('settings.company.finance') }}" class="text-xs text-blue-600 hover:text-blue-700">VAT</a>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Currency:</span>
                                <span class="font-medium">{{ $company->currency_symbol ?: '$' }} {{ strtoupper($company->currency_code ?: 'USD') }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">VAT:</span>
                                <span class="font-medium">{{ number_format($company->vat_rate ?? 0, 1) }}% ({{ ucfirst($company->vat_type ?: 'exclusive') }})</span>
                            </div>
                        </div>
                    </div>

                    {{-- System Settings --}}
                    <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg hover:shadow-md hover:border-purple-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-lg">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.932 6.932 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </div>
                                <h3 class="font-medium text-gray-900">System Config</h3>
                            </div>
                            <a href="{{ route('settings.company.system') }}" class="text-xs text-blue-600 hover:text-blue-700">Edit</a>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Timezone:</span>
                                <span class="font-medium">{{ $company->timezone ? str_replace('_', ' ', explode('/', $company->timezone)[1] ?? $company->timezone) : 'UTC' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Date Format:</span>
                                <span class="font-medium">{{ $company->date_format ?: 'Y-m-d' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Email Configuration --}}
                    <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg hover:shadow-md hover:border-indigo-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-100 rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                    </svg>
                                </div>
                                <h3 class="font-medium text-gray-900">Email Setup</h3>
                            </div>
                            <a href="{{ route('settings.company.email') }}" class="text-xs text-blue-600 hover:text-blue-700">Edit</a>
                        </div>
                        <div class="space-y-2 text-sm">
                            @if($company->email_from_address)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">From:</span>
                                    <span class="text-xs font-medium">{{ $company->email_from_address }}</span>
                                </div>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-xs {{ ($company->email_from_address && $company->mail_host) ? 'text-green-600' : 'text-yellow-600' }}">
                                    {{ ($company->email_from_address && $company->mail_host) ? 'Configured' : 'Setup Needed' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Infrastructure Status --}}
                    <div class="p-4 mt-6 border border-gray-200 rounded-lg bg-gradient-to-br from-gray-50 to-gray-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v5.25a3 3 0 0 1-3 3m-16.5 0a3 3 0 0 1 3 3v5.25a3 3 0 0 1 3 3h6.75a3 3 0 0 1 3-3v-5.25a3 3 0 0 1 3-3m-16.5 0h16.5"/>
                                </svg>
                            </div>
                            <h3 class="font-medium text-gray-800">Infrastructure</h3>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Mail System:</span>
                                <span class="font-medium text-gray-800">{{ $company->mail_mailer ? strtoupper($company->mail_mailer) : 'SMTP' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Database:</span>
                                <span class="font-medium text-green-600">Connected</span>
                            </div>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-300">
                            <a href="{{ route('settings.company.infrastructure') }}" class="text-xs font-medium text-gray-600 hover:text-gray-800">
                                View Infrastructure Settings →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions Bar --}}
        <div class="p-6 mb-8 bg-white border border-gray-200 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="mb-2 font-semibold text-gray-900">Quick Actions</h3>
                    <p class="text-sm text-gray-600">Common configuration tasks and settings</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('settings.branding.edit') }}" class="inline-flex items-center gap-2 px-4 py-2 text-pink-700 transition-colors rounded-lg bg-pink-50 hover:bg-pink-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"/>
                        </svg>
                        Customize Branding
                    </a>
                    @if(Route::has('settings.branches.index'))
                    <a href="{{ route('settings.branches.index') }}" class="inline-flex items-center gap-2 px-4 py-2 text-teal-700 transition-colors rounded-lg bg-teal-50 hover:bg-teal-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                        </svg>
                        Manage Branches
                    </a>
                    @endif
                    @if(Route::has('settings.templates.edit'))
                    <a href="{{ route('settings.templates.edit') }}" class="inline-flex items-center gap-2 px-4 py-2 text-indigo-700 transition-colors rounded-lg bg-indigo-50 hover:bg-indigo-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                        Email Templates
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection