{{-- resources/views/front/careers.blade.php --}}
@extends('layouts.front')
@section('title', 'Careers - ManuCore ERP')

@section('content')
  {{-- Hero --}}
  <section class="text-white hero-gradient">
    <div class="px-4 py-20 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
      <h1 class="mb-4 text-4xl font-bold md:text-5xl">Join the ManuCore Team</h1>
      <p class="max-w-2xl mx-auto text-lg text-purple-100">
        Help us build the next generation of intelligent manufacturing software.  
        We’re growing fast and looking for passionate, curious people to join us.
      </p>
    </div>
  </section>

  {{-- Our Culture --}}
  <section class="py-16 bg-white">
    <div class="max-w-5xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-6 text-3xl font-bold">Our Culture</h2>
      <p class="max-w-3xl mx-auto leading-relaxed text-gray-700">
        At ManuCore, we believe in solving hard problems, learning continuously, and putting people first.  
        We combine deep manufacturing expertise with modern technology to deliver real impact for our customers.
      </p>
    </div>
    <div class="grid max-w-6xl gap-8 px-4 mx-auto mt-12 md:grid-cols-3">
      <div class="p-6 text-center erp-card">
        <h3 class="mb-3 text-lg font-semibold">Innovation</h3>
        <p class="text-gray-600">We embrace new ideas, experiment boldly, and always aim for better solutions.</p>
      </div>
      <div class="p-6 text-center erp-card">
        <h3 class="mb-3 text-lg font-semibold">Collaboration</h3>
        <p class="text-gray-600">We work as one team across disciplines, valuing every perspective.</p>
      </div>
      <div class="p-6 text-center erp-card">
        <h3 class="mb-3 text-lg font-semibold">Growth</h3>
        <p class="text-gray-600">We support personal and professional growth with learning budgets and mentorship.</p>
      </div>
    </div>
  </section>

  {{-- Open Roles --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-12 text-3xl font-bold text-center">Open Roles</h2>

      <div class="space-y-6">
        {{-- Role 1 --}}
        <div class="flex flex-col p-6 erp-card md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-semibold">Full-Stack Laravel Engineer</h3>
            <p class="text-gray-600">Cape Town · Engineering · Full-time</p>
          </div>
          <div class="mt-4 md:mt-0">
            <a href="{{ route('contact') }}" class="btn-primary">Apply Now</a>
          </div>
        </div>

        {{-- Role 2 --}}
        <div class="flex flex-col p-6 erp-card md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-semibold">UI/UX Designer</h3>
            <p class="text-gray-600">Remote · Product · Contract / Full-time</p>
          </div>
          <div class="mt-4 md:mt-0">
            <a href="{{ route('contact') }}" class="btn-primary">Apply Now</a>
          </div>
        </div>

        {{-- Role 3 --}}
        <div class="flex flex-col p-6 erp-card md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-semibold">Implementation Consultant</h3>
            <p class="text-gray-600">Johannesburg · Customer Success · Full-time</p>
          </div>
          <div class="mt-4 md:mt-0">
            <a href="{{ route('contact') }}" class="btn-primary">Apply Now</a>
          </div>
        </div>

        {{-- Role 4 --}}
        <div class="flex flex-col p-6 erp-card md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-semibold">Sales Development Representative</h3>
            <p class="text-gray-600">Remote · Sales · Full-time</p>
          </div>
          <div class="mt-4 md:mt-0">
            <a href="{{ route('contact') }}" class="btn-primary">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Perks --}}
  <section class="py-16 bg-white">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-12 text-3xl font-bold text-center">Perks & Benefits</h2>
      <div class="grid gap-8 md:grid-cols-3">
        <div class="p-6 text-center erp-card">
          <h3 class="mb-2 font-semibold">Flexible Work</h3>
          <p class="text-gray-600">Hybrid & remote-friendly culture with flexible hours.</p>
        </div>
        <div class="p-6 text-center erp-card">
          <h3 class="mb-2 font-semibold">Learning Budget</h3>
          <p class="text-gray-600">Annual allowance for courses, books, and conferences.</p>
        </div>
        <div class="p-6 text-center erp-card">
          <h3 class="mb-2 font-semibold">Wellness</h3>
          <p class="text-gray-600">Medical aid contributions, wellness days, and team retreats.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-4 text-3xl font-bold md:text-4xl">Don’t see the right role?</h2>
      <p class="mb-6 text-lg text-purple-100">
        We’re always keen to meet talented people. Drop us your CV and we’ll be in touch.
      </p>
      <a href="{{ route('contact') }}" class="btn-secondary">Send us your CV</a>
    </div>
  </section>
@endsection
