@extends('layouts.front')
@section('title', 'Contact - ManuCore ERP')

@push('styles')
<style>
    .contact-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
</style>
@endpush

@section('content')
    {{-- Hero / Page Header --}}
    <section class="text-white contact-hero">
        <div class="px-4 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="mb-3 text-4xl font-bold md:text-5xl">Contact Us</h1>
                <p class="text-lg text-gray-100">
                    Questions, demos, partnerships—let’s talk. We usually reply within one business day.
                </p>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-16 bg-gray-50">
        <div class="grid gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-5">
            {{-- Left: Info Cards --}}
            <div class="space-y-6 lg:col-span-2">
                {{-- Sales --}}
                <div class="p-6 bg-white shadow-lg rounded-2xl">
                    <h2 class="mb-2 text-xl font-semibold">Sales & Demos</h2>
                    <p class="text-gray-600">Looking to implement ManuCore ERP? We’ll help you scope the best fit.</p>
                    <div class="mt-4 space-y-2 text-sm text-gray-700">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            sales@manucore.example
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V21a1 1 0 01-1 1C11.4 22 2 12.6 2 1a1 1 0 011-1h3.49a1 1 0 011 1c0 1.24.2 2.45.57 3.57a1 1 0 01-.24 1.02l-2.2 2.2z"/>
                            </svg>
                            +27 10 123 4567
                        </div>
                    </div>
                </div>

                {{-- Support --}}
                <div class="p-6 bg-white shadow-lg rounded-2xl">
                    <h2 class="mb-2 text-xl font-semibold">Support</h2>
                    <p class="text-gray-600">Need help? Check our docs or reach out to our 24/7 team.</p>
                    <div class="flex flex-wrap gap-3 mt-4">
                        <a href="{{ route('help') }}" class="btn-secondary">Help Center</a>
                        <a href="{{ route('status') }}" class="btn-secondary">System Status</a>
                    </div>
                </div>

                {{-- Head Office Map --}}
                <div class="p-6 bg-white shadow-lg rounded-2xl">
                    <h2 class="mb-2 text-xl font-semibold">Head Office</h2>
                    <p class="text-gray-600">Johannesburg, South Africa</p>
                    <div class="mt-4 overflow-hidden rounded-lg">
                        <iframe
                            title="Johannesburg Office Map"
                            class="w-full h-56"
                            style="border:0;"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28654.064!2d28.0473!3d-26.2041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950c6b6f7b!2sJohannesburg!5e0!3m2!1sen!2sza!4v0000">
                        </iframe>
                    </div>
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="lg:col-span-3">
                @if (session('success'))
                    <div class="px-4 py-3 mb-6 text-green-800 border border-green-200 rounded-xl bg-green-50">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="p-8 bg-white shadow-xl rounded-2xl">
                    <h2 class="mb-6 text-2xl font-semibold">Send us a message</h2>

                    <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                        @csrf

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                                <input id="name" name="name" type="text"
                                       class="w-full px-4 py-3 border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500"
                                       value="{{ old('name') }}" placeholder="Your name" required>
                                @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                <input id="email" name="email" type="email"
                                       class="w-full px-4 py-3 border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500"
                                       value="{{ old('email') }}" placeholder="you@example.com" required>
                                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">Subject</label>
                            <input id="subject" name="subject" type="text"
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500"
                                   value="{{ old('subject') }}" placeholder="How can we help?" required>
                            @error('subject') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="5"
                                      class="w-full px-4 py-3 border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500"
                                      placeholder="Your message" required>{{ old('message') }}</textarea>
                            @error('message') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit" class="btn-primary">Send Message</button>
                            <a href="{{ route('home') }}#home" class="btn-secondary">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
