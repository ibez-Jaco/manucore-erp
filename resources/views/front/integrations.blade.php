{{-- resources/views/front/integrations.blade.php --}}
@extends('layouts.front')
@section('title', 'Integrations - ManuCore ERP')

@push('styles')
<style>
  .integrations-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
  .badge { @apply inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold; }
  .badge-native { @apply bg-green-100 text-green-700; }
  .badge-zapier { @apply bg-yellow-100 text-yellow-700; }
  .badge-beta { @apply bg-blue-100 text-blue-700; }
  .badge-soon { @apply bg-gray-100 text-gray-600; }
  .filter-btn.active { @apply bg-purple-600 text-white; }
</style>
@endpush

@section('content')
  {{-- Hero --}}
  <section class="text-white integrations-hero">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-4 text-4xl font-bold md:text-5xl">Integrate ManuCore with your stack</h1>
        <p class="text-lg text-gray-100">
          Connect accounting, commerce, analytics, storage, communications, and identity—move data, not files.
        </p>
      </div>

      {{-- Search + Filters --}}
      <div class="p-4 mt-8 border bg-white/10 border-white/20 rounded-2xl backdrop-blur">
        <div class="flex flex-col items-stretch gap-3 md:flex-row md:items-center">
          <div class="flex-1">
            <input id="int-search" type="text" placeholder="Search integrations (e.g., Xero, Shopify, SSO)"
                   class="w-full px-4 py-3 text-gray-800 placeholder-gray-500 bg-white rounded-xl focus:outline-none">
          </div>
          <div class="flex flex-wrap gap-2">
            <button class="px-4 py-2 text-purple-700 bg-white filter-btn rounded-xl" data-filter="all">All</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="accounting">Accounting</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="commerce">Commerce</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="analytics">Analytics</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="storage">Storage</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="comm">Comms</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="security">Identity & SSO</button>
            <button class="px-4 py-2 filter-btn rounded-xl text-white/90 hover:bg-white/10" data-filter="payments">Payments</button>
          </div>
        </div>
        <p class="mt-2 text-sm text-purple-100">
          Native = first-party connector. Zapier = automate via Zapier. Beta = actively rolling out.
        </p>
      </div>
    </div>
  </section>

  {{-- Integrations Grid --}}
  <section class="py-16 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" id="integrations-grid">
        {{-- Xero --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="accounting">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=X" alt="Xero" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Xero</h3>
                <p class="text-sm text-gray-500">Accounting</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">
            Sync invoices, POs, bills, customers, and inventory valuation seamlessly with your Xero ledger.
          </p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Two-way AR/AP sync</li>
            <li>• Tax (VAT) mappings</li>
            <li>• Multi-currency</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- QuickBooks Online --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="accounting">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=Q" alt="QuickBooks" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">QuickBooks Online</h3>
                <p class="text-sm text-gray-500">Accounting</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Map SKUs, sync invoices and bills, and keep GL tidy automatically.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• AR/AP sync</li>
            <li>• Payment status</li>
            <li>• COA mappings</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- Shopify --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="commerce">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=S" alt="Shopify" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Shopify</h3>
                <p class="text-sm text-gray-500">Commerce</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Sync orders, inventory, and fulfillment from shop to shop floor.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Order import</li>
            <li>• Stock updates</li>
            <li>• Fulfillment events</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- WooCommerce (Zapier) --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="commerce">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=W" alt="WooCommerce" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">WooCommerce</h3>
                <p class="text-sm text-gray-500">Commerce</p>
              </div>
            </div>
            <span class="badge badge-zapier">Via Zapier</span>
          </div>
          <p class="mb-4 text-gray-600">Bring orders into ManuCore and push stock back via Zapier recipes.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Order trigger</li>
            <li>• Inventory sync</li>
            <li>• Customer import</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Set up</a>
          </div>
        </div>

        {{-- Power BI --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="analytics">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=BI" alt="Power BI" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Microsoft Power BI</h3>
                <p class="text-sm text-gray-500">Analytics</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Live datasets and templates for operations, finance, and quality.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Direct query</li>
            <li>• KPI templates</li>
            <li>• Row-level security</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- Google Looker Studio --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="analytics">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=L" alt="Looker Studio" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Looker Studio</h3>
                <p class="text-sm text-gray-500">Analytics</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Prebuilt dashboards for throughput, OTIF, waste, and OEE.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Managed connector</li>
            <li>• Dash templates</li>
            <li>• Refresh schedules</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- AWS S3 --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="storage">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=S3" alt="AWS S3" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Amazon S3</h3>
                <p class="text-sm text-gray-500">Storage</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Archive documents, batch certificates, and drawings securely.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Signed URLs</li>
            <li>• Lifecycle policies</li>
            <li>• AES-256 encryption</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- Google Drive --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="storage">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=G" alt="Google Drive" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Google Drive</h3>
                <p class="text-sm text-gray-500">Storage</p>
              </div>
            </div>
            <span class="badge badge-zapier">Via Zapier</span>
          </div>
          <p class="mb-4 text-gray-600">Auto-file POs, invoices, and QC docs into Drive folders.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Folder routing</li>
            <li>• File naming rules</li>
            <li>• Share controls</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Set up</a>
          </div>
        </div>

        {{-- Slack --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="comm">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=Sl" alt="Slack" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Slack</h3>
                <p class="text-sm text-gray-500">Communications</p>
              </div>
            </div>
            <span class="badge badge-beta">Beta</span>
          </div>
          <p class="mb-4 text-gray-600">Send alerts for low stock, late WOs, QC failures, and shipments.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Channel routing</li>
            <li>• Mention rules</li>
            <li>• Rich payloads</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Join beta</a>
          </div>
        </div>

        {{-- Azure AD (SSO) --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="security">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=A" alt="Azure AD" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Microsoft Entra ID (Azure AD)</h3>
                <p class="text-sm text-gray-500">Identity & SSO</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Centralize access with SSO, SCIM provisioning, and MFA policies.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• SAML / OIDC SSO</li>
            <li>• SCIM user sync</li>
            <li>• RBAC mapping</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>

        {{-- Stripe (Payments) --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="payments">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=$" alt="Stripe" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Stripe</h3>
                <p class="text-sm text-gray-500">Payments</p>
              </div>
            </div>
            <span class="badge badge-soon">Coming Soon</span>
          </div>
          <p class="mb-4 text-gray-600">Collect invoice payments and reconcile against AR—no spreadsheets.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Hosted payment links</li>
            <li>• Auto reconciliation</li>
            <li>• Refund flows</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('contact') }}" class="btn-secondary">Get notified</a>
            <a href="{{ route('api-docs') }}" class="btn-primary">API</a>
          </div>
        </div>

        {{-- Zapier --}}
        <div class="p-6 bg-white shadow rounded-xl hover-lift int-card" data-cats="comm analytics storage commerce accounting">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <img src="https://dummyimage.com/48x48/edf2f7/000&text=Z" alt="Zapier" class="w-12 h-12 rounded-lg">
              <div>
                <h3 class="text-lg font-semibold">Zapier</h3>
                <p class="text-sm text-gray-500">Automation Hub</p>
              </div>
            </div>
            <span class="badge badge-native">Native</span>
          </div>
          <p class="mb-4 text-gray-600">Connect 5,000+ apps—trigger flows on events across ManuCore.</p>
          <ul class="mb-5 space-y-1 text-sm text-gray-600">
            <li>• Triggers & actions</li>
            <li>• Filters & delays</li>
            <li>• Multi-step zaps</li>
          </ul>
          <div class="flex gap-3">
            <a href="{{ route('api-docs') }}" class="btn-secondary">Docs</a>
            <a href="{{ route('contact') }}" class="btn-primary">Enable</a>
          </div>
        </div>
      </div>

      {{-- Note --}}
      <p class="mt-6 text-xs text-gray-500">
        Availability may vary by region. Need a specific connector? <a href="{{ route('contact') }}" class="text-purple-600 underline">Tell us</a>.
      </p>
    </div>
  </section>

  {{-- API & Webhooks --}}
  <section class="py-16 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="grid items-center gap-10 md:grid-cols-2">
        <div>
          <h2 class="mb-3 text-3xl font-bold">Build on ManuCore</h2>
          <p class="mb-5 text-gray-700">
            Use our REST API and Webhooks to integrate custom systems—MES, PLM, quality rigs, or in-house portals.
          </p>
          <ul class="space-y-2 text-gray-700">
            <li>• OAuth2 / API keys</li>
            <li>• Rate limits for stability</li>
            <li>• Sandbox environment</li>
            <li>• Example Postman collections</li>
          </ul>
          <div class="flex gap-3 mt-6">
            <a href="{{ route('api-docs') }}" class="btn-primary">Read API Docs</a>
            <a href="{{ route('contact') }}" class="btn-secondary">Talk to an engineer</a>
          </div>
        </div>
        <div class="p-6 border border-gray-100 shadow rounded-2xl">
          <pre class="overflow-x-auto text-sm"><code>// Example: Create a Work Order
POST /api/v1/work-orders
Authorization: Bearer &lt;token&gt;

{
  "sku": "WIDGET-1000",
  "quantity": 250,
  "due_date": "2025-10-15",
  "bom_version": "v3.2",
  "routing": "R-ALPHA"
}

// Webhook: Inventory below min
POST https://yourapp.example/webhooks/inventory.low
{
  "sku": "AL01-BAR",
  "warehouse": "CPT-01",
  "on_hand": 34,
  "min_level": 50
}</code></pre>
        </div>
      </div>
    </div>
  </section>

  {{-- FAQs --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-10 text-3xl font-bold text-center">Integration FAQs</h2>
      <div class="space-y-4">
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">How long does a typical integration take?</summary>
          <p class="mt-2 text-gray-700">Native connectors can be enabled in hours. SSO and accounting usually go live within a few days.</p>
        </details>
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">Do you support on-premise systems?</summary>
          <p class="mt-2 text-gray-700">Yes. Our Enterprise plan supports secure agents, VPN, and private connectivity.</p>
        </details>
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">Is there an extra cost?</summary>
          <p class="mt-2 text-gray-700">Most native connectors are included in Professional. Some advanced/industry connectors are add-ons.</p>
        </details>
      </div>
    </div>
  </section>

  {{-- CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-4 text-3xl font-bold md:text-4xl">Don’t see your tool?</h2>
      <p class="mb-8 text-lg text-gray-100">We add connectors constantly. Tell us what you need and we’ll scope it fast.</p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('contact') }}" class="btn-primary">Request an Integration</a>
        <a href="{{ route('api-docs') }}" class="btn-secondary">Explore the API</a>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  (function(){
    const grid = document.getElementById('integrations-grid');
    const cards = Array.from(grid.querySelectorAll('.int-card'));
    const search = document.getElementById('int-search');
    const buttons = Array.from(document.querySelectorAll('.filter-btn'));

    function applyFilters(){
      const term = (search.value || '').toLowerCase().trim();
      const activeBtn = buttons.find(b => b.classList.contains('active')) || buttons[0];
      const filter = activeBtn ? activeBtn.dataset.filter : 'all';

      cards.forEach(card => {
        const cats = (card.dataset.cats || '').toLowerCase();
        const text = card.innerText.toLowerCase();
        const matchCat = (filter === 'all') ? true : cats.includes(filter);
        const matchText = term ? text.includes(term) : true;
        card.style.display = (matchCat && matchText) ? '' : 'none';
      });
    }

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        applyFilters();
      });
    });

    search.addEventListener('input', applyFilters);

    // Set default active
    buttons[0].classList.add('active');
    applyFilters();
  })();
</script>
@endpush
