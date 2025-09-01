{{-- resources/views/front/api-docs.blade.php --}}
@extends('layouts.front')
@section('title', 'API Documentation - ManuCore ERP')

@push('styles')
<style>
  .api-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
  .toc a.active { @apply text-purple-700 font-semibold; }
  .code { @apply text-sm bg-gray-900 text-gray-100 rounded-xl p-4 overflow-x-auto; }
  .kbd { @apply px-2 py-0.5 rounded border text-xs bg-gray-50 text-gray-700; }
  .anchor { scroll-margin-top: 120px; }
</style>
@endpush

@section('content')
  {{-- Hero --}}
  <section class="text-white api-hero">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-3 text-4xl font-bold md:text-5xl">ManuCore API</h1>
        <p class="text-lg text-gray-100">RESTful API for integrating ManuCore with your apps, services, and data pipelines.</p>
        <div class="flex flex-wrap gap-3 mt-6">
          <a href="#auth" class="btn-primary">Get started</a>
          <a href="{{ route('status') }}" class="btn-secondary">System Status</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Content --}}
  <section class="py-16 bg-white">
    <div class="grid grid-cols-1 gap-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid-cols-12">
      {{-- TOC --}}
      <aside class="lg:col-span-3">
        <div class="sticky p-6 border border-gray-100 shadow top-24 rounded-2xl">
          <h3 class="mb-4 text-sm font-semibold text-gray-700">On this page</h3>
          <nav class="space-y-2 text-sm toc">
            <a href="#auth" class="block text-gray-600 hover:text-purple-700">Authentication</a>
            <a href="#base" class="block text-gray-600 hover:text-purple-700">Base URL & Versioning</a>
            <a href="#sdk" class="block text-gray-600 hover:text-purple-700">SDKs</a>
            <a href="#endpoints" class="block text-gray-600 hover:text-purple-700">Core Endpoints</a>
            <a href="#pagination" class="block text-gray-600 hover:text-purple-700">Pagination</a>
            <a href="#rates" class="block text-gray-600 hover:text-purple-700">Rate Limits</a>
            <a href="#webhooks" class="block text-gray-600 hover:text-purple-700">Webhooks</a>
            <a href="#errors" class="block text-gray-600 hover:text-purple-700">Errors</a>
            <a href="#changelog" class="block text-gray-600 hover:text-purple-700">Changelog</a>
          </nav>
        </div>
      </aside>

      {{-- Main --}}
      <article class="space-y-12 lg:col-span-9">

        {{-- Authentication --}}
        <section id="auth" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Authentication</h2>
          <p class="mb-4 text-gray-700">
            Authenticate using a Bearer token. Create/manage tokens in <span class="kbd">Settings → API</span>.
            Send the token via the <span class="kbd">Authorization: Bearer &lt;token&gt;</span> header.
          </p>
          <div class="grid gap-6 md:grid-cols-2">
            <div>
              <h4 class="mb-2 font-semibold">cURL</h4>
              <pre class="code"><code>curl -X GET "https://api.manucore.app/v1/products" \
  -H "Authorization: Bearer &lt;token&gt;" \
  -H "Accept: application/json"</code></pre>
            </div>
            <div>
              <h4 class="mb-2 font-semibold">PHP (Guzzle)</h4>
              <pre class="code"><code>$client = new \GuzzleHttp\Client(['base_uri' =&gt; 'https://api.manucore.app/v1/']);
$res = $client-&gt;get('products', [
  'headers' =&gt; ['Authorization' =&gt; 'Bearer &lt;token&gt;']
]);
$products = json_decode($res-&gt;getBody(), true);</code></pre>
            </div>
          </div>
        </section>

        {{-- Base URL --}}
        <section id="base" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Base URL & Versioning</h2>
          <div class="p-5 border border-gray-200 bg-gray-50 rounded-xl">
            <p class="text-gray-700"><span class="kbd">Base</span> <code class="ml-2">https://api.manucore.app</code></p>
            <p class="text-gray-700"><span class="kbd">Version</span> <code class="ml-2">v1</code> (semantic versioning via path)</p>
            <p class="text-gray-700"><span class="kbd">Content-Type</span> <code class="ml-2">application/json</code></p>
          </div>
        </section>

        {{-- SDKs --}}
        <section id="sdk" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">SDKs</h2>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="p-5 border border-gray-100 rounded-xl">
              <h4 class="mb-2 font-semibold">JavaScript / TypeScript</h4>
              <pre class="code"><code># install
npm i @manucore/sdk

// usage
import { ManuCore } from "@manucore/sdk";
const mc = new ManuCore({ token: process.env.MANUCORE_TOKEN });
const products = await mc.products.list({ limit: 25 });</code></pre>
            </div>
            <div class="p-5 border border-gray-100 rounded-xl">
              <h4 class="mb-2 font-semibold">PHP (Laravel)</h4>
              <pre class="code"><code>composer require manucore/laravel

// .env
MANUCORE_TOKEN=&lt;token&gt;

// usage
use ManuCore\Laravel\ManuCore;

$products = ManuCore::products()->list(['limit' =&gt; 25]);</code></pre>
            </div>
          </div>
        </section>

        {{-- Endpoints --}}
        <section id="endpoints" class="anchor">
          <h2 class="mb-6 text-3xl font-bold">Core Endpoints</h2>

          {{-- Products --}}
          <div class="mb-10">
            <h3 class="mb-2 text-xl font-semibold">Products</h3>
            <p class="mb-3 text-gray-700">Create and manage SKUs with BOM linkage and costing.</p>

            <div class="p-5 mb-4 border border-gray-100 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <span class="kbd">GET</span>
                <code>/v1/products</code>
              </div>
              <p class="mb-2 text-gray-700">List products.</p>
              <pre class="code"><code>curl "https://api.manucore.app/v1/products?limit=25&amp;cursor=eyJ..." \
  -H "Authorization: Bearer &lt;token&gt;"</code></pre>
              <pre class="code"><code>{
  "data": [
    { "sku": "WIDGET-1000", "name": "Widget", "uom": "EA" }
  ],
  "next_cursor": "eyJwYWdlIjoyfQ=="
}</code></pre>
            </div>

            <div class="p-5 border border-gray-100 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <span class="kbd">POST</span>
                <code>/v1/products</code>
              </div>
              <p class="mb-2 text-gray-700">Create a product.</p>
              <pre class="code"><code>curl -X POST "https://api.manucore.app/v1/products" \
  -H "Authorization: Bearer &lt;token&gt;" \
  -H "Content-Type: application/json" \
  -d '{
    "sku": "GADGET-2000",
    "name": "Gadget",
    "uom": "EA",
    "cost": 12.45
  }'</code></pre>
            </div>
          </div>

          {{-- Work Orders --}}
          <div class="mb-10">
            <h3 class="mb-2 text-xl font-semibold">Work Orders</h3>
            <p class="mb-3 text-gray-700">Plan and track production with routings and BOMs.</p>

            <div class="p-5 mb-4 border border-gray-100 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <span class="kbd">POST</span>
                <code>/v1/work-orders</code>
              </div>
              <pre class="code"><code>curl -X POST "https://api.manucore.app/v1/work-orders" \
  -H "Authorization: Bearer &lt;token&gt;" \
  -H "Content-Type: application/json" \
  -d '{
    "sku": "WIDGET-1000",
    "quantity": 250,
    "due_date": "2025-10-15",
    "bom_version": "v3.2",
    "routing": "R-ALPHA"
  }'</code></pre>
            </div>

            <div class="p-5 border border-gray-100 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <span class="kbd">GET</span>
                <code>/v1/work-orders/{id}</code>
              </div>
              <pre class="code"><code>{
  "id": "wo_01J8ABCDXYZ",
  "sku": "WIDGET-1000",
  "status": "released",
  "operations": [
    { "code": "CUT", "start": "2025-09-10T08:00:00Z", "end": null }
  ]
}</code></pre>
            </div>
          </div>

          {{-- Inventory --}}
          <div>
            <h3 class="mb-2 text-xl font-semibold">Inventory</h3>
            <p class="mb-3 text-gray-700">Check on-hand, allocations, and movements by warehouse/bin.</p>

            <div class="p-5 border border-gray-100 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <span class="kbd">GET</span>
                <code>/v1/inventory?sku=AL01-BAR&amp;warehouse=CPT-01</code>
              </div>
              <pre class="code"><code>{
  "sku": "AL01-BAR",
  "warehouse": "CPT-01",
  "on_hand": 34,
  "allocated": 10,
  "available": 24,
  "uom": "KG"
}</code></pre>
            </div>
          </div>
        </section>

        {{-- Pagination --}}
        <section id="pagination" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Pagination</h2>
          <p class="mb-3 text-gray-700">Cursor-based pagination with <span class="kbd">limit</span> and <span class="kbd">next_cursor</span>.</p>
          <pre class="code"><code>GET /v1/products?limit=50
200 OK
{
  "data": [...],
  "next_cursor": "eyJvZmZzZXQiOiIxNTAifQ=="
}</code></pre>
          <pre class="code"><code>GET /v1/products?limit=50&amp;cursor=eyJvZmZzZXQiOiIxNTAifQ==
200 OK
{ "data": [...] }</code></pre>
        </section>

        {{-- Rate limits --}}
        <section id="rates" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Rate Limits</h2>
          <p class="mb-3 text-gray-700">Default limits are generous and reset every minute.</p>
          <div class="p-5 border border-gray-200 bg-gray-50 rounded-xl">
            <p class="text-gray-700">Headers returned:</p>
            <ul class="mt-2 ml-6 text-gray-700 list-disc">
              <li><code>X-RateLimit-Limit</code> – requests allowed</li>
              <li><code>X-RateLimit-Remaining</code> – remaining in window</li>
              <li><code>Retry-After</code> – seconds to wait (on 429)</li>
            </ul>
          </div>
        </section>

        {{-- Webhooks --}}
        <section id="webhooks" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Webhooks</h2>
          <p class="mb-3 text-gray-700">
            Receive real-time events. Configure endpoints and secrets in <span class="kbd">Settings → Webhooks</span>.
            Verify signatures from the <span class="kbd">X-ManuCore-Signature</span> header (HMAC-SHA256).
          </p>

          <div class="p-5 mb-4 border border-gray-100 rounded-xl">
            <h4 class="mb-2 font-semibold">Sample payload: <span class="text-gray-500">inventory.low</span></h4>
            <pre class="code"><code>POST https://yourapp.example/webhooks/inventory.low
{
  "event": "inventory.low",
  "created_at": "2025-09-01T10:21:33Z",
  "data": {
    "sku": "AL01-BAR",
    "warehouse": "CPT-01",
    "on_hand": 34,
    "min_level": 50
  }
}</code></pre>
          </div>

          <div class="p-5 border border-gray-100 rounded-xl">
            <h4 class="mb-2 font-semibold">Verify signature (PHP)</h4>
            <pre class="code"><code>$payload = file_get_contents('php://input');
$sig = $_SERVER['HTTP_X_MANUCORE_SIGNATURE'] ?? '';
$secret = env('MANUCORE_WEBHOOK_SECRET');

$expected = base64_encode(hash_hmac('sha256', $payload, $secret, true));
if (!hash_equals($expected, $sig)) {
  http_response_code(400);
  exit('Invalid signature');
}</code></pre>
          </div>
        </section>

        {{-- Errors --}}
        <section id="errors" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Errors</h2>
          <p class="mb-3 text-gray-700">Standard HTTP status codes with structured error bodies.</p>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="p-5 border border-gray-100 rounded-xl">
              <h4 class="mb-2 font-semibold">Validation (422)</h4>
              <pre class="code"><code>{
  "error": {
    "code": "validation_error",
    "message": "The given data was invalid.",
    "details": {
      "sku": ["The sku has already been taken."]
    }
  }
}</code></pre>
            </div>
            <div class="p-5 border border-gray-100 rounded-xl">
              <h4 class="mb-2 font-semibold">Rate limited (429)</h4>
              <pre class="code"><code>{
  "error": {
    "code": "rate_limited",
    "message": "Too many requests. Try again later."
  }
}</code></pre>
            </div>
          </div>
        </section>

        {{-- Changelog --}}
        <section id="changelog" class="anchor">
          <h2 class="mb-3 text-3xl font-bold">Changelog</h2>
          <div class="space-y-4">
            <div class="p-5 border border-gray-100 rounded-xl">
              <div class="flex items-center justify-between">
                <h4 class="font-semibold">v1.3</h4>
                <span class="text-sm text-gray-500">2025-08-21</span>
              </div>
              <ul class="mt-2 ml-6 text-gray-700 list-disc">
                <li>Added <code>inventory.transfers</code> endpoints</li>
                <li>Webhooks: <code>wo.completed</code></li>
              </ul>
            </div>
            <div class="p-5 border border-gray-100 rounded-xl">
              <div class="flex items-center justify-between">
                <h4 class="font-semibold">v1.2</h4>
                <span class="text-sm text-gray-500">2025-06-05</span>
              </div>
              <ul class="mt-2 ml-6 text-gray-700 list-disc">
                <li>Products: cost field now supports 4 decimals</li>
                <li>Improved error response consistency</li>
              </ul>
            </div>
          </div>
        </section>

        {{-- CTA --}}
        <section class="anchor">
          <div class="p-10 text-white cta-gradient rounded-2xl">
            <h3 class="mb-2 text-2xl font-bold md:text-3xl">Ready to build?</h3>
            <p class="mb-5 text-gray-100">Get a sandbox token and start integrating in minutes.</p>
            <div class="flex flex-wrap gap-3">
              <a href="{{ route('contact') }}" class="btn-secondary">Request Sandbox</a>
              <a href="{{ route('integrations') }}" class="btn-primary">Explore Integrations</a>
            </div>
          </div>
        </section>

      </article>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  // Simple TOC highlighter
  (function() {
    const links = Array.from(document.querySelectorAll('.toc a'));
    const targets = links.map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);

    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          const id = '#' + e.target.id;
          links.forEach(l => l.classList.toggle('active', l.getAttribute('href') === id));
        }
      });
    }, { rootMargin: '0px 0px -70% 0px', threshold: 0.1 });

    targets.forEach(t => obs.observe(t));
  })();
</script>
@endpush
