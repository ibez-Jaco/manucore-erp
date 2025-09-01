{{-- resources/views/front/status.blade.php --}}
@extends('layouts.front')
@section('title', 'System Status - ManuCore ERP')

@section('content')
  {{-- Hero / Overall Status --}}
  <section class="text-white hero-gradient">
    <div class="max-w-6xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
      <div class="flex flex-col items-start justify-between gap-6 md:flex-row">
        <div>
          <h1 class="mb-2 text-3xl font-bold md:text-4xl">System Status</h1>
          <p class="text-purple-100">Real-time information on the availability of ManuCore services.</p>
        </div>
        <div class="text-white erp-card bg-white/10 backdrop-blur">
          <div class="flex items-center gap-3 px-5 py-3">
            <span class="inline-block w-2.5 h-2.5 rounded-full bg-green-400"></span>
            <span class="font-semibold">All Systems Operational</span>
          </div>
        </div>
      </div>
      <p class="mt-3 text-sm text-purple-100">Last updated: {{ now()->format('M d, Y H:i') }} (SAST)</p>
    </div>
  </section>

  {{-- Components Grid --}}
  <section class="py-10 bg-white">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-4 text-xl font-semibold">Component Status</h2>

      <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        {{-- Component card --}}
        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">Web App</div>
            <div class="text-xs text-gray-500">app.manucore.com</div>
          </div>
          <span class="px-2 py-1 text-xs text-green-700 rounded-full bg-green-50">Operational</span>
        </div>

        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">API</div>
            <div class="text-xs text-gray-500">api.manucore.com</div>
          </div>
          <span class="px-2 py-1 text-xs text-green-700 rounded-full bg-green-50">Operational</span>
        </div>

        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">Database Cluster</div>
            <div class="text-xs text-gray-500">Primary + Replicas</div>
          </div>
          <span class="px-2 py-1 text-xs rounded-full bg-amber-50 text-amber-700">Degraded</span>
        </div>

        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">Job Queue</div>
            <div class="text-xs text-gray-500">Workers & Schedules</div>
          </div>
          <span class="px-2 py-1 text-xs text-green-700 rounded-full bg-green-50">Operational</span>
        </div>

        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">Email Delivery</div>
            <div class="text-xs text-gray-500">Notifications</div>
          </div>
          <span class="px-2 py-1 text-xs text-green-700 rounded-full bg-green-50">Operational</span>
        </div>

        <div class="flex items-center justify-between p-4 erp-card">
          <div>
            <div class="font-medium">Webhooks</div>
            <div class="text-xs text-gray-500">Outbound Events</div>
          </div>
          <span class="px-2 py-1 text-xs text-green-700 rounded-full bg-green-50">Operational</span>
        </div>
      </div>

      {{-- Quick note for degraded service --}}
      <div class="p-4 mt-4 text-sm border text-amber-700 bg-amber-50 border-amber-100 rounded-xl">
        We’re monitoring increased latency on the <strong>Database Cluster</strong>. No data loss observed. See incidents below for updates.
      </div>
    </div>
  </section>

  {{-- Uptime Summary (simple bars) --}}
  <section class="py-10 bg-gray-50">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-6 text-xl font-semibold">Uptime (Last 90 Days)</h2>

      <div class="space-y-5">
        <div>
          <div class="flex justify-between mb-1 text-sm">
            <span>Web App</span><span>99.98%</span>
          </div>
          <div class="w-full h-2 overflow-hidden bg-gray-200 rounded-full">
            <div class="h-2 bg-green-500" style="width: 99.98%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between mb-1 text-sm">
            <span>API</span><span>99.95%</span>
          </div>
          <div class="w-full h-2 overflow-hidden bg-gray-200 rounded-full">
            <div class="h-2 bg-green-500" style="width: 99.95%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between mb-1 text-sm">
            <span>Database Cluster</span><span>99.72%</span>
          </div>
          <div class="w-full h-2 overflow-hidden bg-gray-200 rounded-full">
            <div class="h-2 bg-amber-500" style="width: 99.72%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between mb-1 text-sm">
            <span>Webhooks</span><span>99.99%</span>
          </div>
          <div class="w-full h-2 overflow-hidden bg-gray-200 rounded-full">
            <div class="h-2 bg-green-500" style="width: 99.99%"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Incidents --}}
  <section class="py-12 bg-white">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-6 text-xl font-semibold">Recent Incidents</h2>

      <div class="space-y-4">
        {{-- Incident 1 --}}
        <details class="p-5 erp-card group">
          <summary class="flex items-start justify-between gap-4 list-none cursor-pointer">
            <div>
              <div class="font-medium">Elevated DB Latency (JHB region)</div>
              <div class="text-xs text-gray-500">Resolved • Aug 26, 2025 • 45m</div>
            </div>
            <span class="px-2 py-1 text-xs rounded-full bg-emerald-50 text-emerald-700">Resolved</span>
          </summary>
          <div class="mt-4 space-y-2 text-gray-700">
            <p><strong>Impact:</strong> Slower page loads & API responses for a subset of tenants.</p>
            <p><strong>Cause:</strong> Hot shard on replica set after traffic spike.</p>
            <p><strong>Mitigation:</strong> Rebalanced shards; increased read replicas.</p>
            <p><strong>Prevention:</strong> Additional autoscale rules and earlier shard warm-up.</p>
          </div>
        </details>

        {{-- Incident 2 --}}
        <details class="p-5 erp-card group">
          <summary class="flex items-start justify-between gap-4 list-none cursor-pointer">
            <div>
              <div class="font-medium">Webhook Delivery Retries Spiking</div>
              <div class="text-xs text-gray-500">Monitoring • Aug 18, 2025 • 30m</div>
            </div>
            <span class="px-2 py-1 text-xs rounded-full bg-amber-50 text-amber-700">Monitoring</span>
          </summary>
          <div class="mt-4 space-y-2 text-gray-700">
            <p><strong>Impact:</strong> Some webhooks delayed; all messages delivered after retry.</p>
            <p><strong>Cause:</strong> Downstream partner timeouts.</p>
            <p><strong>Action:</strong> Added jitter to retry policy and vendor-specific backoff.</p>
          </div>
        </details>
      </div>

      {{-- Historical link --}}
      <div class="mt-6">
        <a href="#" class="text-purple-600 hover:underline">View incident history</a>
      </div>
    </div>
  </section>

  {{-- Subscribe / Contact --}}
  <section class="py-12 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h3 class="mb-2 text-2xl font-bold">Subscribe to Status Updates</h3>
      <p class="mb-6 text-purple-100">Get email notifications when we create, update, or resolve incidents.</p>
      <form action="#" method="POST" class="max-w-xl mx-auto">
        <div class="flex flex-col gap-3 sm:flex-row">
          <input type="email" class="w-full erp-input" placeholder="you@company.com">
          <button type="submit" class="btn-primary">Subscribe</button>
        </div>
        <p class="mt-3 text-xs text-purple-100">You can unsubscribe at any time.</p>
      </form>

      <p class="mt-6 text-purple-100">
        Need help? <a href="{{ route('contact') }}" class="underline">Contact Support</a>
      </p>
    </div>
  </section>
@endsection
