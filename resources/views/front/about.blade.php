{{-- resources/views/front/about.blade.php --}}
@extends('layouts.front')
@section('title', 'About - ManuCore ERP')

@push('styles')
<style>
  .about-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
</style>
@endpush

@section('content')
  {{-- Hero --}}
  <section class="text-white about-hero">
    <div class="px-4 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-4 text-4xl font-bold md:text-5xl">About ManuCore ERP</h1>
        <p class="text-lg text-gray-100">
          Intelligent Manufacturing Resource Planning—built for modern manufacturers who value precision, agility, and growth.
        </p>
      </div>
    </div>
  </section>

  {{-- Company Intro / Mission --}}
  <section class="py-16 bg-gray-50">
    <div class="grid gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div class="p-8 bg-white shadow-lg rounded-2xl">
        <h2 class="mb-4 text-2xl font-semibold">Our Mission</h2>
        <p class="text-gray-600">
          We help manufacturers streamline operations—from inventory to production, sales to finance—so they can scale with confidence and outpace demand.
        </p>
        <p class="mt-4 text-gray-600">
          ManuCore combines robust ERP fundamentals with a clean, modern user experience and actionable analytics—without the legacy complexity.
        </p>
      </div>
      <div class="p-8 bg-white shadow-lg rounded-2xl">
        <h2 class="mb-4 text-2xl font-semibold">What We Do</h2>
        <ul class="space-y-3 text-gray-700">
          <li class="flex">
            <span class="mr-3 text-purple-600">•</span> Real-time visibility across your supply chain and shop floor
          </li>
          <li class="flex">
            <span class="mr-3 text-purple-600">•</span> Smart planning: MRP, capacity, BOMs, and work orders—done right
          </li>
          <li class="flex">
            <span class="mr-3 text-purple-600">•</span> Unified financials with VAT, multi-currency, and accurate costing
          </li>
          <li class="flex">
            <span class="mr-3 text-purple-600">•</span> Open integrations and API-first architecture
          </li>
        </ul>
        <div class="flex gap-3 mt-6">
          <a href="{{ route('features') }}" class="btn-primary">Explore Features</a>
          <a href="{{ route('contact') }}" class="btn-secondary">Talk to Sales</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Stats / Proof --}}
  <section class="py-12 bg-white">
    <div class="grid grid-cols-2 gap-8 px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8 md:grid-cols-4">
      <div class="p-6 bg-gray-50 rounded-xl">
        <div class="text-4xl font-bold gradient-text">500+</div>
        <div class="mt-2 text-gray-600">Active Companies</div>
      </div>
      <div class="p-6 bg-gray-50 rounded-xl">
        <div class="text-4xl font-bold gradient-text">50K+</div>
        <div class="mt-2 text-gray-600">Daily Transactions</div>
      </div>
      <div class="p-6 bg-gray-50 rounded-xl">
        <div class="text-4xl font-bold gradient-text">99.9%</div>
        <div class="mt-2 text-gray-600">Uptime SLA</div>
      </div>
      <div class="p-6 bg-gray-50 rounded-xl">
        <div class="text-4xl font-bold gradient-text">24/7</div>
        <div class="mt-2 text-gray-600">Global Support</div>
      </div>
    </div>
  </section>

  {{-- Values --}}
  <section class="py-16 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-12 text-center">
        <h2 class="text-3xl font-bold">Our Values</h2>
        <p class="mt-2 text-gray-600">How we build, partner, and support our customers</p>
      </div>
      <div class="grid gap-8 md:grid-cols-3">
        <div class="p-8 bg-white shadow-lg rounded-2xl">
          <h3 class="mb-3 text-xl font-semibold">Reliability First</h3>
          <p class="text-gray-600">Manufacturing never stops. Our platform delivers the stability and performance you need.</p>
        </div>
        <div class="p-8 bg-white shadow-lg rounded-2xl">
          <h3 class="mb-3 text-xl font-semibold">Pragmatic Innovation</h3>
          <p class="text-gray-600">We innovate where it matters—automation, usability, and insights that create measurable outcomes.</p>
        </div>
        <div class="p-8 bg-white shadow-lg rounded-2xl">
          <h3 class="mb-3 text-xl font-semibold">Customer Obsession</h3>
          <p class="text-gray-600">Every feature, integration, and workflow starts with real production floor needs.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Leadership (placeholders; swap images/roles as needed) --}}
  <section class="py-16 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-12 text-center">
        <h2 class="text-3xl font-bold">Leadership</h2>
        <p class="mt-2 text-gray-600">Experienced product, ops, and engineering leaders from manufacturing and SaaS</p>
      </div>
      <div class="grid gap-8 md:grid-cols-3">
        @php
          $leaders = [
            ['name' => 'Nomsa Dlamini', 'role' => 'Chief Executive Officer', 'initials' => 'ND'],
            ['name' => 'Kabelo Mokoena', 'role' => 'Chief Technology Officer', 'initials' => 'KM'],
            ['name' => 'Thandi Naidoo', 'role' => 'VP, Product', 'initials' => 'TN'],
          ];
        @endphp
        @foreach($leaders as $l)
          <div class="p-8 text-center shadow-lg bg-gray-50 rounded-2xl">
            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 text-2xl font-bold text-white bg-purple-600 rounded-full">
              {{ $l['initials'] }}
            </div>
            <div class="text-lg font-semibold">{{ $l['name'] }}</div>
            <div class="text-sm text-gray-600">{{ $l['role'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Timeline --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-12 text-3xl font-bold text-center">Our Journey</h2>
      <div class="relative">
        <div class="absolute w-1 h-full transform -translate-x-1/2 bg-purple-100 left-1/2"></div>
        @php
          $timeline = [
            ['year' => '2021', 'title' => 'ManuCore Founded', 'desc' => 'Set out to modernize ERP for manufacturers with a usability-first approach.'],
            ['year' => '2022', 'title' => 'First 100 Customers', 'desc' => 'Scaled core modules—Inventory, Production, CRM—and launched analytics.'],
            ['year' => '2023', 'title' => 'Global Expansion', 'desc' => 'Added multi-currency, regional tax support, and integrations ecosystem.'],
            ['year' => '2024', 'title' => 'Enterprise Readiness', 'desc' => 'Advanced security, SSO/SAML, audit logs, and performance at scale.'],
          ];
        @endphp
        <div class="space-y-10">
          @foreach($timeline as $i => $t)
            <div class="grid items-center gap-8 md:grid-cols-2">
              @if($i % 2 === 0)
                <div class="md:text-right md:pr-10">
                  <div class="inline-block p-6 bg-white shadow rounded-xl">
                    <div class="text-sm font-semibold text-purple-600">{{ $t['year'] }}</div>
                    <div class="mt-1 text-xl font-semibold">{{ $t['title'] }}</div>
                    <p class="mt-2 text-gray-600">{{ $t['desc'] }}</p>
                  </div>
                </div>
                <div class="hidden md:block">
                  <div class="w-4 h-4 mx-auto bg-purple-600 rounded-full"></div>
                </div>
              @else
                <div class="hidden md:block">
                  <div class="w-4 h-4 mx-auto bg-purple-600 rounded-full"></div>
                </div>
                <div class="md:pl-10">
                  <div class="inline-block p-6 bg-white shadow rounded-xl">
                    <div class="text-sm font-semibold text-purple-600">{{ $t['year'] }}</div>
                    <div class="mt-1 text-xl font-semibold">{{ $t['title'] }}</div>
                    <p class="mt-2 text-gray-600">{{ $t['desc'] }}</p>
                  </div>
                </div>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- Security & Compliance / Tech stack --}}
  <section class="py-16 bg-white">
    <div class="grid gap-8 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 md:grid-cols-2">
      <div class="p-8 bg-gray-50 rounded-2xl">
        <h3 class="mb-3 text-2xl font-semibold">Security & Compliance</h3>
        <ul class="space-y-2 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> TLS encryption in transit, at-rest encryption for sensitive data</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Role-based access control with SSO/SAML options</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Audit trails, granular permissions, and regional data residency options</li>
        </ul>
      </div>
      <div class="p-8 bg-gray-50 rounded-2xl">
        <h3 class="mb-3 text-2xl font-semibold">Technology</h3>
        <p class="text-gray-600">
          Built on Laravel 12 and modern web tech, designed for performance, extensibility, and developer happiness.
        </p>
        <ul class="mt-3 space-y-2 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> API-first architecture with webhooks</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Modular design for feature velocity and stability</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Observability baked in (logs, metrics, and alerts)</li>
        </ul>
      </div>
    </div>
  </section>

  {{-- Logos / Social proof (replace with real logos) --}}
  <section class="py-12 bg-gray-50">
    <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
      <h3 class="mb-6 text-xl font-semibold">Trusted by manufacturers across Africa & beyond</h3>
      <div class="grid items-center grid-cols-2 gap-6 md:grid-cols-5">
        @foreach (range(1,5) as $i)
          <div class="flex items-center justify-center h-12 text-gray-400 bg-white rounded-lg shadow">Logo</div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Careers CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-4 text-3xl font-bold md:text-4xl">Join the ManuCore Team</h2>
      <p class="mb-8 text-lg text-gray-100">
        Help us build the future of manufacturing software—reliable, intuitive, and beautifully engineered.
      </p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('careers') }}" class="btn-primary">See Open Roles</a>
        <a href="{{ route('contact') }}" class="btn-secondary">Talk to Us</a>
      </div>
    </div>
  </section>
@endsection
