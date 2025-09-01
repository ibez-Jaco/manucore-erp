{{-- resources/views/front/help.blade.php --}}
@extends('layouts.front')
@section('title', 'Help Center - ManuCore ERP')

@section('content')
  {{-- Hero + Search --}}
  <section class="text-white hero-gradient">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-3 text-4xl font-bold md:text-5xl">Help Center</h1>
        <p class="text-lg text-purple-100">Guides, FAQs, and resources to get the most out of ManuCore ERP.</p>
      </div>

      <form action="{{ route('help') }}" method="GET" class="max-w-2xl mt-8">
        <div class="relative">
          <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="Search help articles, e.g. “create BOM”, “invite users”…"
            class="w-full erp-input pl-11"
          />
          <svg class="absolute w-5 h-5 text-gray-400 -translate-y-1/2 left-3 top-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="8" stroke-width="2"></circle>
            <path d="M21 21l-4.3-4.3" stroke-width="2"></path>
          </svg>
        </div>
      </form>
    </div>
  </section>

  {{-- Popular Topics --}}
  <section class="py-12 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <h2 class="mb-6 text-2xl font-bold">Popular Topics</h2>
      <div class="grid gap-6 md:grid-cols-3">
        <a href="{{ route('api-docs') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">API & Integrations</h3>
          <p class="text-sm text-gray-600">Authenticate, call endpoints, and connect third-party tools.</p>
        </a>
        <a href="{{ route('features') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Production Planning</h3>
          <p class="text-sm text-gray-600">MRP runs, work orders, routings, and capacity planning.</p>
        </a>
        <a href="{{ route('features') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Inventory Management</h3>
          <p class="text-sm text-gray-600">Multi-warehouse, lot/batch tracking, and cycle counts.</p>
        </a>
        <a href="{{ route('features') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Financials</h3>
          <p class="text-sm text-gray-600">Invoicing, purchasing, VAT settings, and exports.</p>
        </a>
        <a href="{{ route('features') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">CRM & Sales</h3>
          <p class="text-sm text-gray-600">Leads, quotes, orders, and pipeline basics.</p>
        </a>
        <a href="{{ route('status') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">System Status</h3>
          <p class="text-sm text-gray-600">Check uptime, incidents, and maintenance windows.</p>
        </a>
      </div>
    </div>
  </section>

  {{-- Get Started --}}
  <section class="py-12 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-2">
        <div class="p-6 erp-card">
          <h2 class="mb-4 text-xl font-semibold">Quick Start</h2>
          <ol class="ml-6 space-y-2 text-gray-700 list-decimal">
            <li>Create your sites & warehouses in <em>Settings → Locations</em>.</li>
            <li>Import items & BOMs (CSV) from <em>Inventory → Imports</em>.</li>
            <li>Set reorder points & units of measure for key SKUs.</li>
            <li>Define routings, resources, and calendars for capacity.</li>
            <li>Create a test Sales Order and run MRP.</li>
          </ol>
          <div class="mt-5">
            <a href="{{ route('features') }}" class="btn-secondary">Explore Features</a>
          </div>
        </div>

        <div class="p-6 erp-card">
          <h2 class="mb-4 text-xl font-semibold">Account & Billing</h2>
          <ul class="ml-6 space-y-2 text-gray-700 list-disc">
            <li>Manage plan & invoices in <em>Settings → Billing</em>.</li>
            <li>Add teammates from <em>Settings → Users & Roles</em>.</li>
            <li>Update company profile & tax details under <em>Settings</em>.</li>
          </ul>
          <div class="mt-5">
            <a href="{{ route('pricing') }}" class="btn-secondary">View Plans</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- FAQs --}}
  <section class="py-12 bg-white">
    <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-6 text-2xl font-bold">Frequently Asked Questions</h2>
      <div class="space-y-4">
        <details class="p-5 erp-card">
          <summary class="font-semibold list-none cursor-pointer">How do I invite users and set permissions?</summary>
          <div class="mt-3 text-gray-700">
            Go to <em>Settings → Users & Roles</em>, click <strong>Invite</strong>, assign a role (Viewer, Operator, Manager, Admin),
            and send the invitation. Permissions can be customised per module.
          </div>
        </details>

        <details class="p-5 erp-card">
          <summary class="font-semibold list-none cursor-pointer">Can I import my existing inventory and BOMs?</summary>
          <div class="mt-3 text-gray-700">
            Yes. Use the CSV templates in <em>Inventory → Imports</em>. Supported: Items, Warehouses, Stock Levels, BOMs, and Vendors.
          </div>
        </details>

        <details class="p-5 erp-card">
          <summary class="font-semibold list-none cursor-pointer">How is MRP scheduled?</summary>
          <div class="mt-3 text-gray-700">
            MRP considers demand (SO/Forecast), supply (PO/WO), lead times, and capacity calendars.  
            You can run it manually or schedule it (hourly/daily) under <em>Production → MRP</em>.
          </div>
        </details>

        <details class="p-5 erp-card">
          <summary class="font-semibold list-none cursor-pointer">Do you support multi-currency and VAT?</summary>
          <div class="mt-3 text-gray-700">
            Yes, set base currency and tax rules in <em>Settings → Finance</em>. Exchange rates can be synced or entered manually.
          </div>
        </details>

        <details class="p-5 erp-card">
          <summary class="font-semibold list-none cursor-pointer">Is there an API?</summary>
          <div class="mt-3 text-gray-700">
            Absolutely. See <a href="{{ route('api-docs') }}" class="text-purple-600 hover:underline">API Documentation</a> for auth, endpoints, examples, and webhooks.
          </div>
        </details>
      </div>
    </div>
  </section>

  {{-- Resources --}}
  <section class="py-12 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <h2 class="mb-6 text-2xl font-bold">Resources</h2>
      <div class="grid gap-6 md:grid-cols-3">
        <a href="{{ route('api-docs') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Developer Docs</h3>
          <p class="text-sm text-gray-600">Auth, endpoints, webhooks, and SDKs.</p>
        </a>
        <a href="{{ route('blog') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Blog</h3>
          <p class="text-sm text-gray-600">Guides, product updates, and best practices.</p>
        </a>
        <a href="{{ route('status') }}" class="block p-6 erp-card hover-lift">
          <h3 class="mb-2 font-semibold">Status Page</h3>
          <p class="text-sm text-gray-600">Uptime, incidents, and maintenance.</p>
        </a>
      </div>
    </div>
  </section>

  {{-- Contact Support --}}
  <section class="py-12 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h3 class="mb-2 text-2xl font-bold">Still need help?</h3>
      <p class="mb-6 text-purple-100">Our support team is here 24/7. We usually reply within a few hours.</p>
      <a href="{{ route('contact') }}" class="btn-primary">Contact Support</a>
      <p class="mt-3 text-xs text-purple-100">Or email us at support@manucore.com</p>
    </div>
  </section>
@endsection
