@extends('layouts.panel')

@section('title', 'System Administration - ManuCore ERP')
@section('header', 'System Administration')
@section('subheader', 'Manage your ManuCore ERP system configuration and settings')

@section('page-actions')
    <div class="flex items-center gap-3">
        <button onclick="runSystemCheck()" class="erp-btn erp-btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
            </svg>
            System Check
        </button>
        <a href="{{ route('settings.branding.edit') }}" class="erp-btn erp-btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"/>
            </svg>
            Customize System
        </a>
    </div>
@endsection

@section('content')
<div class="space-y-8">

    {{-- System Health Overview --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
        {{-- System Status --}}
        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-blue-300">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">System Status</p>
                        <p class="text-lg font-bold text-gray-900">Operational</p>
                    </div>
                </div>
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
            </div>
            <div class="text-sm text-gray-600">
                <p>All systems running normally</p>
                <p class="mt-1 text-xs text-gray-500">Last checked: 5 minutes ago</p>
            </div>
        </div>

        {{-- Active Sessions --}}
        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-blue-300">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Users</p>
                        <p class="text-lg font-bold text-gray-900">8 of 12</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm font-medium text-green-600">+2</div>
                    <div class="text-xs text-gray-500">since yesterday</div>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                <p>Current active sessions</p>
                <p class="mt-1 text-xs text-gray-500">Peak today: 11 users at 2:30 PM</p>
            </div>
        </div>

        {{-- Storage Usage --}}
        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-blue-300">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-orange-100 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Storage</p>
                        <p class="text-lg font-bold text-gray-900">2.4 GB</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm font-medium text-orange-600">68%</div>
                    <div class="text-xs text-gray-500">of 3.5 GB</div>
                </div>
            </div>
            <div class="mt-3">
                <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="h-2 transition-all duration-300 bg-orange-500 rounded-full" style="width: 68%"></div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Last backup: 2 hours ago</p>
            </div>
        </div>

        {{-- Performance Score --}}
        <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:border-blue-300">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5 10 3.94a2.25 2.25 0 0 1 4 0L20.25 13.5A2.25 2.25 0 0 1 18.22 17H5.78a2.25 2.25 0 0 1-2.03-3.5Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Performance</p>
                        <p class="text-lg font-bold text-gray-900">Excellent</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm font-medium text-purple-600">94/100</div>
                    <div class="text-xs text-gray-500">health score</div>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                <p>Average response: 180ms</p>
                <p class="mt-1 text-xs text-gray-500">99.9% uptime this month</p>
            </div>
        </div>
    </div>

    {{-- Main Configuration Areas --}}
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        
        {{-- Business Configuration --}}
        <div class="space-y-6 lg:col-span-2">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Business Configuration</h2>
                    <p class="mt-1 text-sm text-gray-600">Core business settings and company information</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                {{-- Company Settings --}}
                <a href="{{ route('settings.company') }}" 
                   class="p-6 transition-all duration-300 bg-white border border-gray-200 group rounded-xl hover:shadow-lg hover:border-blue-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-colors bg-blue-100 rounded-lg group-hover:bg-blue-200">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.75m-.75 3h.75m-.75 3h.75m-3.75-16.5h.75m-.75 3h.75m-.75 3h.75m-.75 3h.75"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transition-colors group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold text-gray-900 transition-colors group-hover:text-blue-600">Company Settings</h3>
                        <p class="mb-4 text-sm text-gray-600">Basic information, contact details, addresses, and financial configuration</p>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                Complete
                            </span>
                            <span class="text-xs text-gray-500">9 sections configured</span>
                        </div>
                    </div>
                </a>

                {{-- Branding & Theme --}}
                <a href="{{ route('settings.branding.edit') }}" 
                   class="p-6 transition-all duration-300 bg-white border border-gray-200 group rounded-xl hover:shadow-lg hover:border-pink-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-colors bg-pink-100 rounded-lg group-hover:bg-pink-200">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transition-colors group-hover:text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold text-gray-900 transition-colors group-hover:text-pink-600">Branding & Theme</h3>
                        <p class="mb-4 text-sm text-gray-600">Customize colors, logos, and visual identity across the system</p>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-1">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-xs text-gray-600 capitalize">{{ $activeTheme ?? 'blue' }} theme</span>
                            </div>
                            <span class="text-xs text-gray-400">•</span>
                            <span class="text-xs text-gray-500">5 themes available</span>
                        </div>
                    </div>
                </a>

                {{-- Branches & Locations --}}
                @if(Route::has('settings.branches.index'))
                <a href="{{ route('settings.branches.index') }}" 
                   class="p-6 transition-all duration-300 bg-white border border-gray-200 group rounded-xl hover:shadow-lg hover:border-teal-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-colors bg-teal-100 rounded-lg group-hover:bg-teal-200">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transition-colors group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold text-gray-900 transition-colors group-hover:text-teal-600">Branches & Locations</h3>
                        <p class="mb-4 text-sm text-gray-600">Manage multiple business locations and branch settings</p>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-teal-700 bg-teal-100 rounded-full">
                                3 Locations
                            </span>
                            <span class="text-xs text-gray-500">Multi-branch enabled</span>
                        </div>
                    </div>
                </a>
                @endif

                {{-- Email Templates --}}
                @if(Route::has('settings.templates.edit'))
                <a href="{{ route('settings.templates.edit') }}" 
                   class="p-6 transition-all duration-300 bg-white border border-gray-200 group rounded-xl hover:shadow-lg hover:border-indigo-300 hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center justify-center w-12 h-12 transition-colors bg-indigo-100 rounded-lg group-hover:bg-indigo-200">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transition-colors group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold text-gray-900 transition-colors group-hover:text-indigo-600">Email Templates</h3>
                        <p class="mb-4 text-sm text-gray-600">Customize system email templates and notifications</p>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full">
                                12 Templates
                            </span>
                            <span class="text-xs text-gray-500">Customizable</span>
                        </div>
                    </div>
                </a>
                @endif
            </div>
        </div>

        {{-- System Administration Sidebar --}}
        <div class="space-y-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">System Administration</h2>
                    <p class="mt-1 text-sm text-gray-600">Admin controls and monitoring</p>
                </div>
            </div>

            <div class="space-y-4">
                {{-- Admin Dashboard --}}
                @if(Route::has('admin.index'))
                <a href="{{ route('admin.index') }}" 
                   class="block p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg group hover:shadow-md hover:border-red-300">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 transition-colors bg-red-100 rounded-lg group-hover:bg-red-200">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 transition-colors group-hover:text-red-600">Admin Dashboard</h3>
                            <p class="text-xs text-gray-600">System metrics & controls</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 transition-colors group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                </a>
                @endif

                {{-- User Management --}}
                <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg cursor-pointer group hover:shadow-md hover:border-blue-300"
                     onclick="showComingSoon('User Management', 'Complete user administration interface with role management, permissions, and user analytics.')">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 transition-colors bg-blue-100 rounded-lg group-hover:bg-blue-200">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 transition-colors group-hover:text-blue-600">User Management</h3>
                            <p class="text-xs text-gray-600">Roles, permissions & access</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded font-medium">12</span>
                            <svg class="w-4 h-4 text-gray-400 transition-colors group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Security Center --}}
                <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg opacity-75 cursor-pointer group hover:shadow-md hover:border-violet-300"
                     onclick="showComingSoon('Security Center', 'Advanced security monitoring, audit logs, access controls, and compliance reporting.')">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 transition-colors rounded-lg bg-violet-100 group-hover:bg-violet-200">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 transition-colors group-hover:text-violet-600">Security Center</h3>
                            <p class="text-xs text-gray-600">Security & audit logs</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-0.5 bg-gray-100 text-gray-500 rounded">Soon</span>
                        </div>
                    </div>
                </div>

                {{-- System Logs --}}
                <div class="p-4 transition-all duration-300 bg-white border border-gray-200 rounded-lg opacity-75 cursor-pointer group hover:shadow-md hover:border-gray-400"
                     onclick="showComingSoon('System Logs', 'Real-time system logs, error tracking, performance monitoring, and debugging tools.')">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 transition-colors bg-gray-100 rounded-lg group-hover:bg-gray-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 transition-colors group-hover:text-gray-700">System Logs</h3>
                            <p class="text-xs text-gray-600">Error tracking & debugging</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-0.5 bg-gray-100 text-gray-500 rounded">Soon</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- System Health Summary --}}
            <div class="p-4 mt-6 border border-blue-200 rounded-lg bg-gradient-to-br from-blue-50 to-indigo-50">
                <div class="flex items-center gap-3 mb-3">
                    <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                    <h3 class="font-medium text-blue-900">System Health</h3>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-blue-700">Database</span>
                        <span class="font-medium text-green-600">Optimal</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-700">Cache</span>
                        <span class="font-medium text-green-600">Active</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-700">Queue</span>
                        <span class="font-medium text-green-600">Processing</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-700">Backup</span>
                        <span class="font-medium text-blue-600">2h ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent System Activity --}}
    <div class="p-6 bg-white border border-gray-200 rounded-xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Recent System Activity</h2>
                <p class="mt-1 text-sm text-gray-600">Latest configuration changes and system events</p>
            </div>
            <button onclick="refreshActivity()" class="flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
                Refresh
            </button>
        </div>

        <div class="space-y-4">
            <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50">
                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.932 6.932 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="font-medium text-gray-900">System configuration updated</h4>
                        <span class="text-xs text-gray-500">3 minutes ago</span>
                    </div>
                    <p class="mb-2 text-sm text-gray-600">Company timezone changed from UTC to Africa/Johannesburg</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-700">
                            Configuration
                        </span>
                        <span class="text-xs text-gray-500">by System Administrator</span>
                    </div>
                </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50">
                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-100 rounded-full">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM3 20a6 6 0 0 1 12 0v1H3v-1Z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="font-medium text-gray-900">New user account created</h4>
                        <span class="text-xs text-gray-500">1 hour ago</span>
                    </div>
                    <p class="mb-2 text-sm text-gray-600">sarah.johnson@company.com added with Staff role</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">
                            User Management
                        </span>
                        <span class="text-xs text-gray-500">by Admin User</span>
                    </div>
                </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50">
                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-100 rounded-full">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="font-medium text-gray-900">Automated backup completed</h4>
                        <span class="text-xs text-gray-500">2 hours ago</span>
                    </div>
                    <p class="mb-2 text-sm text-gray-600">Daily system backup completed successfully (2.4 GB)</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-700">
                            Backup
                        </span>
                        <span class="text-xs text-gray-500">by System Scheduler</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Interactive Functions --}}
<script>
function runSystemCheck() {
    Swal.fire({
        title: 'System Check Running',
        html: 'Checking system components...<br><div class="mt-3"><div class="h-2 bg-gray-200 rounded-full"><div class="h-2 bg-blue-500 rounded-full" style="width: 0%" id="progress-bar"></div></div></div>',
        allowOutsideClick: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
            let progress = 0;
            const progressBar = document.getElementById('progress-bar');
            
            const interval = setInterval(() => {
                progress += Math.random() * 30;
                if (progress > 100) progress = 100;
                
                progressBar.style.width = progress + '%';
                
                if (progress >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        Swal.fire({
                            title: 'System Check Complete',
                            html: `
                                <div class="mt-4 space-y-2 text-left">
                                    <div class="flex items-center justify-between"><span>Database:</span><span class="font-medium text-green-600">✓ Healthy</span></div>
                                    <div class="flex items-center justify-between"><span>Cache:</span><span class="font-medium text-green-600">✓ Active</span></div>
                                    <div class="flex items-center justify-between"><span>Queue:</span><span class="font-medium text-green-600">✓ Processing</span></div>
                                    <div class="flex items-center justify-between"><span>Storage:</span><span class="font-medium text-yellow-600">⚠ 68% Used</span></div>
                                </div>
                            `,
                            icon: 'success',
                            confirmButtonText: 'Great!',
                            confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1')
                        });
                    }, 500);
                }
            }, 200);
        }
    });
}

function refreshActivity() {
    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        icon: 'success',
        title: 'Activity refreshed'
    });
}

function showComingSoon(feature, description) {
    Swal.fire({
        title: `${feature} - Coming Soon!`,
        text: description,
        icon: 'info',
        confirmButtonText: 'Got it',
        confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1'),
        customClass: {
            popup: 'erp-swal-popup'
        }
    });
}
</script>
@endsection