{{-- resources/views/settings/company/address.blade.php --}}
@extends('layouts.panel')

@section('title', 'Company Address Information - ManuCore ERP')

@section('content')
@includeIf('components.flash')

<div class="space-y-8" x-data="{ 
    usePostal: {{ json_encode((bool) old('use_postal_address', (bool) ($company->use_postal_address ?? false))) }}
}">
    
    {{-- Navigation Tabs --}}
    @include('settings.company.partials.tabs')

    {{-- Address Information Form --}}
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
            <form method="POST" action="{{ route('settings.company.address.update') }}" class="p-8">
                @csrf
                
                <div class="space-y-8">
                    {{-- Physical Address Section --}}
                    <div>
                        <h2 class="flex items-center gap-2 mb-6 text-lg font-semibold text-gray-900">
                            <div class="w-2 h-6 bg-blue-500 rounded-full"></div>
                            Physical Address
                        </h2>
                        
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Address Line 1 --}}
                            <div class="md:col-span-2">
                                <label for="address_line_1" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Street Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="address_line_1" 
                                        name="address_line_1" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('address_line_1') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('address_line_1', $company->address_line_1) }}"
                                        placeholder="123 Business Street"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Primary street address or physical location</p>
                                @error('address_line_1')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Address Line 2 --}}
                            <div class="md:col-span-2">
                                <label for="address_line_2" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Address Line 2 <span class="font-normal text-gray-500">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="address_line_2" 
                                        name="address_line_2" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('address_line_2') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('address_line_2', $company->address_line_2) }}"
                                        placeholder="Suite 100, Building B"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">Suite, unit, building, or floor details</p>
                                @error('address_line_2')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div>
                                <label for="city" class="block mb-2 text-sm font-semibold text-gray-700">
                                    City
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15l-.75 18H5.25L4.5 3Z"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="city" 
                                        name="city" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('city') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('city', $company->city) }}"
                                        placeholder="Johannesburg"
                                    >
                                </div>
                                @error('city')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Province --}}
                            <div>
                                <label for="state_province" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Province
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.158.69-.158 1.006 0l4.994 2.497c.317.158.69.158 1.007 0Z"/>
                                        </svg>
                                    </div>
                                    <select 
                                        id="state_province" 
                                        name="state_province" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('state_province') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                    >
                                        <option value="">Select Province</option>
                                        <option value="Eastern Cape" {{ old('state_province', $company->state_province) == 'Eastern Cape' ? 'selected' : '' }}>Eastern Cape</option>
                                        <option value="Free State" {{ old('state_province', $company->state_province) == 'Free State' ? 'selected' : '' }}>Free State</option>
                                        <option value="Gauteng" {{ old('state_province', $company->state_province) == 'Gauteng' ? 'selected' : '' }}>Gauteng</option>
                                        <option value="KwaZulu-Natal" {{ old('state_province', $company->state_province) == 'KwaZulu-Natal' ? 'selected' : '' }}>KwaZulu-Natal</option>
                                        <option value="Limpopo" {{ old('state_province', $company->state_province) == 'Limpopo' ? 'selected' : '' }}>Limpopo</option>
                                        <option value="Mpumalanga" {{ old('state_province', $company->state_province) == 'Mpumalanga' ? 'selected' : '' }}>Mpumalanga</option>
                                        <option value="Northern Cape" {{ old('state_province', $company->state_province) == 'Northern Cape' ? 'selected' : '' }}>Northern Cape</option>
                                        <option value="North West" {{ old('state_province', $company->state_province) == 'North West' ? 'selected' : '' }}>North West</option>
                                        <option value="Western Cape" {{ old('state_province', $company->state_province) == 'Western Cape' ? 'selected' : '' }}>Western Cape</option>
                                    </select>
                                </div>
                                @error('state_province')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Postal Code --}}
                            <div>
                                <label for="postal_code" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Postal Code
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="postal_code" 
                                        name="postal_code" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('postal_code') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('postal_code', $company->postal_code) }}"
                                        placeholder="2000"
                                        maxlength="4"
                                        pattern="[0-9]{4}"
                                    >
                                </div>
                                <p class="mt-2 text-sm text-gray-600">4-digit South African postal code</p>
                                @error('postal_code')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Country --}}
                            <div>
                                <label for="country" class="block mb-2 text-sm font-semibold text-gray-700">
                                    Country
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3s-4.5 4.03-4.5 9 2.015 9 4.5 9Zm8.716-6.747a9.028 9.028 0 0 1-8.716 6.747m8.716-6.747L21 14.25m-8.716 6.747 1.716.003"/>
                                        </svg>
                                    </div>
                                    <input 
                                        id="country" 
                                        name="country" 
                                        type="text" 
                                        class="block w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('country') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : '' }}"
                                        value="{{ old('country', $company->country ?? 'South Africa') }}"
                                        placeholder="South Africa"
                                    >
                                </div>
                                @error('country')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Postal Address Section --}}
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="flex items-center gap-2 text-lg font-semibold text-gray-900">
                                <div class="w-2 h-6 bg-purple-500 rounded-full"></div>
                                Postal Address
                            </h2>
                            <div class="flex items-center gap-2">
                                <input type="hidden" name="use_postal_address" value="0">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="use_postal_address" value="1" x-model="usePostal" class="w-4 h-4 text-blue-600 border-2 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm font-medium text-gray-700">Use different postal address</span>
                                </label>
                            </div>
                        </div>

                        <div x-show="usePostal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                {{-- Postal Address Line 1 --}}
                                <div class="md:col-span-2">
                                    <label for="postal_address_line_1" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal Street Address
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="postal_address_line_1" 
                                            name="postal_address_line_1" 
                                            type="text" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('postal_address_line_1', $company->postal_address_line_1) }}"
                                            placeholder="P.O. Box 123"
                                            :disabled="!usePostal"
                                        >
                                    </div>
                                </div>

                                {{-- Postal Address Line 2 --}}
                                <div class="md:col-span-2">
                                    <label for="postal_address_line_2" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal Address Line 2 <span class="font-normal text-gray-500">(Optional)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="postal_address_line_2" 
                                            name="postal_address_line_2" 
                                            type="text" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('postal_address_line_2', $company->postal_address_line_2) }}"
                                            placeholder="Additional postal details"
                                            :disabled="!usePostal"
                                        >
                                    </div>
                                </div>

                                {{-- Postal City --}}
                                <div>
                                    <label for="postal_city" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal City
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15l-.75 18H5.25L4.5 3Z"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="postal_city" 
                                            name="postal_city" 
                                            type="text" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('postal_city', $company->postal_city) }}"
                                            placeholder="Johannesburg"
                                            :disabled="!usePostal"
                                        >
                                    </div>
                                </div>

                                {{-- Postal Province --}}
                                <div>
                                    <label for="postal_state_province" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal Province
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.158.69-.158 1.006 0l4.994 2.497c.317.158.69.158 1.007 0Z"/>
                                            </svg>
                                        </div>
                                        <select 
                                            id="postal_state_province" 
                                            name="postal_state_province" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            :disabled="!usePostal"
                                        >
                                            <option value="">Select Province</option>
                                            <option value="Eastern Cape" {{ old('postal_state_province', $company->postal_state_province) == 'Eastern Cape' ? 'selected' : '' }}>Eastern Cape</option>
                                            <option value="Free State" {{ old('postal_state_province', $company->postal_state_province) == 'Free State' ? 'selected' : '' }}>Free State</option>
                                            <option value="Gauteng" {{ old('postal_state_province', $company->postal_state_province) == 'Gauteng' ? 'selected' : '' }}>Gauteng</option>
                                            <option value="KwaZulu-Natal" {{ old('postal_state_province', $company->postal_state_province) == 'KwaZulu-Natal' ? 'selected' : '' }}>KwaZulu-Natal</option>
                                            <option value="Limpopo" {{ old('postal_state_province', $company->postal_state_province) == 'Limpopo' ? 'selected' : '' }}>Limpopo</option>
                                            <option value="Mpumalanga" {{ old('postal_state_province', $company->postal_state_province) == 'Mpumalanga' ? 'selected' : '' }}>Mpumalanga</option>
                                            <option value="Northern Cape" {{ old('postal_state_province', $company->postal_state_province) == 'Northern Cape' ? 'selected' : '' }}>Northern Cape</option>
                                            <option value="North West" {{ old('postal_state_province', $company->postal_state_province) == 'North West' ? 'selected' : '' }}>North West</option>
                                            <option value="Western Cape" {{ old('postal_state_province', $company->postal_state_province) == 'Western Cape' ? 'selected' : '' }}>Western Cape</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Postal Code --}}
                                <div>
                                    <label for="postal_postal_code" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal Code
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="postal_postal_code" 
                                            name="postal_postal_code" 
                                            type="text" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('postal_postal_code', $company->postal_postal_code) }}"
                                            placeholder="2000"
                                            maxlength="4"
                                            pattern="[0-9]{4}"
                                            :disabled="!usePostal"
                                        >
                                    </div>
                                </div>

                                {{-- Postal Country --}}
                                <div>
                                    <label for="postal_country" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Postal Country
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3s-4.5 4.03-4.5 9 2.015 9 4.5 9Zm8.716-6.747a9.028 9.028 0 0 1-8.716 6.747m8.716-6.747L21 14.25m-8.716 6.747 1.716.003"/>
                                            </svg>
                                        </div>
                                        <input 
                                            id="postal_country" 
                                            name="postal_country" 
                                            type="text" 
                                            class="block w-full py-3 pl-10 pr-4 transition-colors border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('postal_country', $company->postal_country ?? 'South Africa') }}"
                                            placeholder="South Africa"
                                            :disabled="!usePostal"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="!usePostal" class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                            <p class="text-sm text-gray-600">Postal address will be the same as physical address above</p>
                        </div>
                    </div>

                    {{-- Current Address Status --}}
                    @if($company->address_line_1 || $company->city || $company->state_province)
                    <div class="p-6 border border-blue-200 rounded-lg bg-blue-50">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-blue-900">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                Current Address Information
                            </h3>
                            @if($company->address_line_1 && $company->city)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($company->full_address) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center gap-1 px-3 py-1 text-xs text-blue-700 transition-colors bg-blue-100 rounded-full hover:bg-blue-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                    </svg>
                                    View on Google Maps
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                        
                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-2">
                            <div>
                                <p class="font-medium text-blue-700">Physical Address</p>
                                <p class="text-blue-900">{{ $company->full_address ?: 'Not set' }}</p>
                            </div>
                            @if($company->use_postal_address && $company->hasPostalAddress())
                                <div>
                                    <p class="font-medium text-blue-700">Postal Address</p>
                                    <p class="text-blue-900">{{ $company->full_postal_address }}</p>
                                </div>
                            @else
                                <div>
                                    <p class="font-medium text-blue-700">Postal Address</p>
                                    <p class="text-blue-900">Same as physical address</p>
                                </div>
                            @endif
                        </div>

                        {{-- Quick Actions --}}
                        @if($company->address_line_1 && $company->city)
                            <div class="pt-4 mt-4 border-t border-blue-200">
                                <div class="flex items-center gap-4 text-sm">
                                    <span class="font-medium text-blue-700">Quick actions:</span>
                                    <div class="flex items-center gap-3">
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($company->full_address) }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="inline-flex items-center px-2 py-1 text-xs text-blue-700 transition-colors bg-blue-100 rounded-full hover:bg-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                            </svg>
                                            View Location
                                        </a>
                                        <a href="https://www.google.com/maps/dir//{{ urlencode($company->full_address) }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="inline-flex items-center px-2 py-1 text-xs text-blue-700 transition-colors bg-blue-100 rounded-full hover:bg-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                            </svg>
                                            Get Directions
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @else
                    {{-- No address set --}}
                    <div class="p-6 border border-yellow-200 rounded-lg bg-yellow-50">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                            </svg>
                            <div>
                                <h3 class="mb-1 font-medium text-yellow-800">Address Information Needed</h3>
                                <p class="text-sm text-yellow-700">Add your business address for professional documentation, invoicing, and to help customers locate your business.</p>
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
                        <span class="text-sm text-gray-600">Address information is used for invoicing and business documentation</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('settings.company') }}" class="inline-flex items-center gap-2 px-6 py-3 text-gray-700 transition-colors bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Save Address Information
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection