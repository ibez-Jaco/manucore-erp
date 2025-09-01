{{-- resources/views/front/features.blade.php --}}
@extends('layouts.front')
@section('title', 'Features - ManuCore ERP')

@push('styles')
<style>
  .features-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
  .subnav-blur { backdrop-filter: blur(8px); }
</style>
@endpush

@section('content')
  {{-- Hero --}}
  <section class="text-white features-hero">
    <div class="px-4 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-4 text-4xl font-bold md:text-5xl">Powerful Features for Modern Manufacturing</h1>
        <p class="text-lg text-gray-100">
          Everything you need—from inventory to production, CRM to financials—built for precision, visibility, and scale.
        </p>
        <div class="flex flex-wrap gap-3 mt-8">
          <a href="{{ route('pricing') }}" class="btn-primary">View Pricing</a>
          <a href="{{ route('contact') }}" class="btn-secondary">Talk to Sales</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Sticky sub-navigation (anchors) --}}
  <div class="sticky z-40 w-full border-b border-gray-100 bg-white/80 subnav-blur top-16">
    <div class="px-4 py-3 mx-auto overflow-x-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex gap-6 text-sm whitespace-nowrap">
        <a href="#overview"   class="text-gray-700 hover:text-purple-600">Overview</a>
        <a href="#inventory"  class="text-gray-700 hover:text-purple-600">Inventory</a>
        <a href="#planning"   class="text-gray-700 hover:text-purple-600">Production Planning</a>
        <a href="#analytics"  class="text-gray-700 hover:text-purple-600">Analytics</a>
        <a href="#financials" class="text-gray-700 hover:text-purple-600">Financials</a>
        <a href="#crm"        class="text-gray-700 hover:text-purple-600">CRM & Sales</a>
        <a href="#integrations" class="text-gray-700 hover:text-purple-600">Integrations</a>
        <a href="#faq"        class="text-gray-700 hover:text-purple-600">FAQ</a>
      </div>
    </div>
  </div>

  {{-- Overview (your original feature grid) --}}
  <section id="overview" class="py-20 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-16 text-center">
        <h2 class="mb-4 text-3xl font-bold md:text-4xl">Everything to run your manufacturing business</h2>
        <p class="text-xl text-gray-600">Modular when you want it, unified when you need it</p>
      </div>

      <div class="grid gap-8 md:grid-cols-3">
        {{-- Feature 1 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">Inventory Management</h3>
          <p class="mb-4 text-gray-600">Real-time tracking of raw materials, WIP, and finished goods with automated reorder points.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Multi-warehouse support
            </li>
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Barcode scanning
            </li>
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Batch tracking
            </li>
          </ul>
          <a href="#inventory" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>

        {{-- Feature 2 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">Production Planning</h3>
          <p class="mb-4 text-gray-600">Optimize schedules, manage BOMs, and track work orders end-to-end.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              MRP calculations
            </li>
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Capacity planning
            </li>
            <li class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Resource allocation
            </li>
          </ul>
          <a href="#planning" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>

        {{-- Feature 3 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-green-500 to-teal-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">Analytics & Reporting</h3>
          <p class="mb-4 text-gray-600">Real-time dashboards and customizable reports for fast, confident decisions.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>KPI dashboards</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Custom reports</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Data exports</li>
          </ul>
          <a href="#analytics" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>

        {{-- Feature 4 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-yellow-500 to-orange-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">Financial Management</h3>
          <p class="mb-4 text-gray-600">Integrated invoicing, purchasing, costing—VAT and multi-currency ready.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>VAT compliant</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Multi-currency</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Cost analysis</li>
          </ul>
          <a href="#financials" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>

        {{-- Feature 5 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-red-500 to-pink-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">CRM & Sales</h3>
          <p class="mb-4 text-gray-600">Manage leads, quotes, and orders in one streamlined flow.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Lead management</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Quote generation</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Order tracking</li>
          </ul>
          <a href="#crm" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>

        {{-- Feature 6 --}}
        <div class="p-8 bg-white shadow-lg rounded-xl hover-lift feature-card">
          <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-500 feature-icon">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1 1 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h3 class="mb-4 text-2xl font-semibold">Integration Hub</h3>
          <p class="mb-4 text-gray-600">Connect your stack and automate cross-platform workflows.</p>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>API access</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Webhook support</li>
            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>3rd-party apps</li>
          </ul>
          <a href="#integrations" class="inline-block mt-6 text-purple-600 hover:underline">Learn more →</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Detailed Sections --}}
  <section id="inventory" class="py-16 bg-white">
    <div class="grid items-center gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div>
        <h2 class="mb-3 text-3xl font-bold">Inventory Management</h2>
        <p class="mb-6 text-gray-600">Eliminate stockouts and excess inventory with real-time visibility and rules-based automation.</p>
        <ul class="space-y-3 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Multi-warehouse, locations, lots & batches</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Reorder points, min/max, safety stock</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Mobile barcode scanning & labels</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Serial tracking & full traceability</li>
        </ul>
      </div>
      <div class="p-8 shadow-inner bg-gray-50 rounded-2xl">
        <div class="flex items-center justify-center h-64 text-gray-400 bg-white shadow rounded-xl">
          Inventory mockup
        </div>
      </div>
    </div>
  </section>

  <section id="planning" class="py-16 bg-gray-50">
    <div class="grid items-center gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div class="order-2 p-8 bg-white shadow-inner lg:order-1 rounded-2xl">
        <div class="flex items-center justify-center h-64 text-gray-400 rounded-xl bg-gray-50">
          Planning mockup
        </div>
      </div>
      <div class="order-1 lg:order-2">
        <h2 class="mb-3 text-3xl font-bold">Production Planning</h2>
        <p class="mb-6 text-gray-600">Plan with confidence—accurate MRP, capacity-aware schedules, and live work order tracking.</p>
        <ul class="space-y-3 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> BOMs, routings, operations, and labor</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Finite capacity, constraints, and priorities</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Shop-floor execution & WIP visibility</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Scrap & yield analysis</li>
        </ul>
      </div>
    </div>
  </section>

  <section id="analytics" class="py-16 bg-white">
    <div class="grid items-center gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div>
        <h2 class="mb-3 text-3xl font-bold">Analytics & Reporting</h2>
        <p class="mb-6 text-gray-600">Stay ahead with live KPIs, drill-downs, and exportable reports that your team actually uses.</p>
        <ul class="space-y-3 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Dashboards for inventory, production, and sales</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Custom dimensions & saved views</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> CSV/Excel exports & scheduled emails</li>
        </ul>
      </div>
      <div class="p-8 shadow-inner bg-gray-50 rounded-2xl">
        <div class="flex items-center justify-center h-64 text-gray-400 bg-white shadow rounded-xl">
          Analytics mockup
        </div>
      </div>
    </div>
  </section>

  <section id="financials" class="py-16 bg-gray-50">
    <div class="grid items-center gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div class="order-2 p-8 bg-white shadow-inner lg:order-1 rounded-2xl">
        <div class="flex items-center justify-center h-64 text-gray-400 rounded-xl bg-gray-50">
          Financials mockup
        </div>
      </div>
      <div class="order-1 lg:order-2">
        <h2 class="mb-3 text-3xl font-bold">Financial Management</h2>
        <p class="mb-6 text-gray-600">Tightly integrated financials for precise costing and faster close.</p>
        <ul class="space-y-3 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Purchases, AP/AR, and invoicing</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> VAT, multi-currency, exchange rates</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Standard/actual costing & landed cost</li>
        </ul>
      </div>
    </div>
  </section>

  <section id="crm" class="py-16 bg-white">
    <div class="grid items-center gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-2">
      <div>
        <h2 class="mb-3 text-3xl font-bold">CRM & Sales</h2>
        <p class="mb-6 text-gray-600">From lead to order—win more with quotes that reflect your inventory and capacity in real time.</p>
        <ul class="space-y-3 text-gray-700">
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Lead & opportunity pipelines</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Quotes, orders, and fulfillment</li>
          <li class="flex"><span class="mr-3 text-purple-600">•</span> Customer pricing & discounts</li>
        </ul>
      </div>
      <div class="p-8 shadow-inner bg-gray-50 rounded-2xl">
        <div class="flex items-center justify-center h-64 text-gray-400 bg-white shadow rounded-xl">
          CRM mockup
        </div>
      </div>
    </div>
  </section>

  {{-- Integrations --}}
  <section id="integrations" class="py-16 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="mb-12 text-center">
        <h2 class="text-3xl font-bold">Integration Hub</h2>
        <p class="mt-2 text-gray-600">Connect ManuCore with your finance tools, storefronts, WMS, BI, and more.</p>
      </div>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-6">
        @foreach (['API','Webhooks','Accounting','eCommerce','WMS','BI'] as $label)
          <div class="p-6 text-center text-gray-700 bg-white shadow rounded-xl">{{ $label }}</div>
        @endforeach
      </div>
      <div class="mt-8 text-center">
        <a href="{{ route('api-docs') }}" class="btn-secondary">API Documentation</a>
      </div>
    </div>
  </section>

  {{-- FAQ --}}
  <section id="faq" class="py-16 bg-white">
    <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-10 text-3xl font-bold text-center">Frequently Asked Questions</h2>
      <div class="space-y-4">
        @php
          $faq = [
            ['q' => 'Can I start with a single module?', 'a' => 'Yes. ManuCore is modular—begin with Inventory or Planning and add others as you grow.'],
            ['q' => 'Do you support multi-currency and VAT?', 'a' => 'Absolutely. Financials include VAT handling and multi-currency with exchange rate support.'],
            ['q' => 'Is there an API?', 'a' => 'Yes—REST API and webhooks let you integrate storefronts, WMS, BI tools, and more.'],
            ['q' => 'How long does onboarding take?', 'a' => 'Typical SMB deployments are a few weeks; larger rollouts vary with scope and data migration needs.'],
          ];
        @endphp

        @foreach($faq as $i => $item)
          <details class="p-5 bg-gray-50 rounded-xl">
            <summary class="font-semibold cursor-pointer">{{ $item['q'] }}</summary>
            <p class="mt-2 text-gray-700">{{ $item['a'] }}</p>
          </details>
        @endforeach
      </div>

      <div class="mt-10 text-center">
        <a href="{{ route('contact') }}" class="btn-primary">Still have questions? Contact us</a>
      </div>
    </div>
  </section>

  {{-- CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-4 text-3xl font-bold md:text-4xl">See ManuCore in Action</h2>
      <p class="mb-8 text-lg text-gray-100">Join 500+ manufacturers who plan, produce, and deliver with confidence.</p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('pricing') }}" class="btn-primary">Compare Plans</a>
        <a href="{{ route('contact') }}" class="btn-secondary">Schedule a Demo</a>
      </div>
    </div>
  </section>
@endsection
