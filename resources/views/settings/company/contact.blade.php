{{-- resources/views/settings/company/contact.blade.php --}}
@extends('layouts.panel')

@section('title', 'Company Contact Information - ManuCore ERP')

@section('content')
@includeIf('components.flash')

<div class="space-y-8">
    
    {{-- Navigation Tabs --}}
    @include('settings.company.partials.tabs')

    {{-- Contact Information Form --}}
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
            <form method="POST" action="{{ route('settings.company.contact.update') }}" class="p-8">
                @csrf
                
                <div class="space-y-8">
                    {{-- Primary Contact Section --}}
                    <div>
                        <h2 class="flex items-center gap-2 mb-6 text-lg font-semibold text-gray-900">
                            <div class="w-2 h-6 bg-green-500 rounded-full"></div>
                            Primary Contact Details
                        </h2>
                        
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Email --}}
                            <div class="md:col-span-2">
                                <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Business Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="email" 
                                        name="email" 
                                        type="email" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors {{ $errors->has('email') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('email', $company->email) }}"
                                        placeholder="info@company.com"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Primary email for business communications and invoicing</p>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Main Phone Number
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="phone" 
                                        name="phone" 
                                        type="tel" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors {{ $errors->has('phone') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('phone', $company->phone) }}"
                                        placeholder="+27 11 123 4567"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Primary business phone number</p>
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div>
                                <label for="mobile" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Mobile Number
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="mobile" 
                                        name="mobile" 
                                        type="tel" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors {{ $errors->has('mobile') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('mobile', $company->mobile) }}"
                                        placeholder="+27 82 123 4567"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Alternative contact number</p>
                                @error('mobile')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Website --}}
                            <div class="md:col-span-2">
                                <label for="website" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Website URL
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3s-4.5 4.03-4.5 9 2.015 9 4.5 9Zm8.716-6.747a9.028 9.028 0 0 1-8.716 6.747m8.716-6.747L21 14.25m-8.716 6.747 1.716.003"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="website" 
                                        name="website" 
                                        type="url" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors {{ $errors->has('website') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('website', $company->website) }}"
                                        placeholder="https://www.company.com"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Company website or online presence</p>
                                @error('website')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Current Contact Status --}}
                    @if($company->email || $company->phone || $company->mobile || $company->website)
                    <div class="p-6 border border-green-200 rounded-lg bg-green-50">
                        <h3 class="flex items-center gap-2 mb-4 text-sm font-semibold text-green-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Current Contact Information
                        </h3>
                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-2 lg:grid-cols-4">
                            <div>
                                <p class="font-medium text-green-700">Email</p>
                                <p class="text-green-900 break-all">{{ $company->email ?: 'Not set' }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-green-700">Phone</p>
                                <p class="text-green-900">{{ $company->phone ?: 'Not set' }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-green-700">Mobile</p>
                                <p class="text-green-900">{{ $company->mobile ?: 'Not set' }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-green-700">Website</p>
                                <p class="text-green-900 break-all">{{ $company->website ?: 'Not set' }}</p>
                            </div>
                        </div>
                        
                        {{-- Contact Methods Summary --}}
                        <div class="pt-4 mt-4 border-t border-green-200">
                            <div class="flex items-center gap-4 text-sm">
                                <span class="font-medium text-green-700">Available contact methods:</span>
                                <div class="flex items-center gap-3">
                                    @if($company->email)
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-green-700 bg-green-100 rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                            </svg>
                                            Email
                                        </span>
                                    @endif
                                    @if($company->phone)
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-green-700 bg-green-100 rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                                            </svg>
                                            Phone
                                        </span>
                                    @endif
                                    @if($company->mobile)
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-green-700 bg-green-100 rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                                            </svg>
                                            Mobile
                                        </span>
                                    @endif
                                    @if($company->website)
                                        <span class="inline-flex items-center px-2 py-1 text-xs text-green-700 bg-green-100 rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3s-4.5 4.03-4.5 9 2.015 9 4.5 9Zm8.716-6.747a9.028 9.028 0 0 1-8.716 6.747m8.716-6.747L21 14.25m-8.716 6.747 1.716.003"/>
                                            </svg>
                                            Website
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    {{-- No contact info set --}}
                    <div class="p-6 border border-yellow-200 rounded-lg bg-yellow-50">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-6.75 0h13.5m-13.5 0a3 3 0 0 1 3-3h7.5a3 3 0 0 1 3 3m-13.5 0v.375c0 .621.504 1.125 1.125 1.125h12.25c.621 0 1.125-.504 1.125-1.125V12m-13.5 0a3 3 0 0 0 3 3h7.5a3 3 0 0 0 3-3m0 8.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <div>
                                <h3 class="mb-1 font-medium text-yellow-800">Contact Information Needed</h3>
                                <p class="text-sm text-yellow-700">Add contact details to help customers and partners reach your business. At minimum, provide an email address for professional communication.</p>
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
                        <span class="text-sm text-gray-600">Contact information is used for invoicing and communication</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('settings.company') }}" class="inline-flex items-center gap-2 px-6 py-3 text-gray-700 transition-colors bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Save Contact Information
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection