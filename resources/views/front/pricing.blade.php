{{-- resources/views/front/pricing.blade.php --}}
@extends('layouts.front')
@section('title', 'Pricing - ManuCore ERP')

@push('styles')
<style>
  .pricing-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
  .price-amount[data-hidden="true"] { display: none; }
</style>
@endpush

@section('content')
  {{-- Hero --}}
  <section class="text-white pricing-hero">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-4 text-4xl font-bold md:text-5xl">Simple, Transparent Pricing</h1>
        <p class="text-lg text-gray-100">Choose the plan that fits your business. No hidden fees.</p>
      </div>

      {{-- Billing toggle --}}
      <div class="inline-flex items-center p-2 mt-8 border bg-white/10 border-white/20 rounded-2xl backdrop-blur">
        <button id="btn-monthly"
                class="px-4 py-2 text-sm font-semibold text-purple-700 bg-white rounded-xl">
          Monthly
        </button>
        <button id="btn-annual"
                class="px-4 py-2 text-sm font-semibold text-white rounded-xl hover:bg-white/10">
          Annual <span class="ml-1 font-normal text-yellow-300">(save ~15%)</span>
        </button>
      </div>

      <p class="mt-3 text-sm text-purple-100">Prices shown in ZAR. VAT excluded.</p>
    </div>
  </section>

  {{-- Plans --}}
  <section id="pricing" class="py-16 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="grid gap-8 md:grid-cols-3">
        {{-- Starter --}}
        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover-lift">
          <h3 class="mb-2 text-2xl font-bold">Starter</h3>
          <p class="mb-5 text-gray-600">Perfect for small manufacturers</p>

          <div class="mb-6">
            <div class="price-amount" data-plan="starter" data-period="monthly">
              <span class="text-4xl font-bold">R2,999</span>
              <span class="text-gray-600">/month</span>
            </div>
            <div class="price-amount" data-plan="starter" data-period="annual" data-hidden="true">
              <span class="text-4xl font-bold">R2,549</span>
              <span class="text-gray-600">/mo billed yearly</span>
              <div class="mt-1 text-xs text-gray-500">Total R30,588 /yr</div>
            </div>
          </div>

          <ul class="mb-8 space-y-3 text-sm">
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Up to 5 users
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Core modules included
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Email support
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Basic reporting
            </li>
          </ul>

          <a href="{{ route('register') }}"
             class="block w-full px-6 py-3 text-center text-purple-600 transition-all border-2 border-purple-600 rounded-full hover:bg-purple-600 hover:text-white">
            Start Free Trial
          </a>
        </div>

        {{-- Professional (Popular) --}}
        <div class="relative p-8 text-white shadow-xl bg-gradient-to-b from-purple-600 to-purple-700 rounded-2xl pricing-popular hover-lift">
          <div class="absolute top-0 right-0 px-4 py-1 font-semibold text-purple-900 bg-yellow-400 rounded-bl-lg rounded-tr-2xl">POPULAR</div>
          <h3 class="mb-2 text-2xl font-bold">Professional</h3>
          <p class="mb-5 text-purple-100">For growing manufacturers</p>

          <div class="mb-6">
            <div class="price-amount" data-plan="pro" data-period="monthly">
              <span class="text-4xl font-bold">R7,999</span>
              <span class="text-purple-200">/month</span>
            </div>
            <div class="price-amount" data-plan="pro" data-period="annual" data-hidden="true">
              <span class="text-4xl font-bold">R6,799</span>
              <span class="text-purple-200">/mo billed yearly</span>
              <div class="mt-1 text-xs text-purple-200/80">Total R81,588 /yr</div>
            </div>
          </div>

          <ul class="mb-8 space-y-3 text-sm">
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Up to 25 users
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              All modules included
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Priority support
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Advanced analytics
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              API access
            </li>
          </ul>

          <a href="{{ route('register') }}"
             class="block w-full px-6 py-3 font-semibold text-center text-purple-600 transition-all bg-white rounded-full hover:bg-gray-100">
            Start Free Trial
          </a>
        </div>

        {{-- Enterprise --}}
        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover-lift">
          <h3 class="mb-2 text-2xl font-bold">Enterprise</h3>
          <p class="mb-5 text-gray-600">For large-scale operations</p>

          <div class="mb-6">
            <span class="text-4xl font-bold">Custom</span>
          </div>

          <ul class="mb-8 space-y-3 text-sm">
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Unlimited users
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Custom modules & workflows
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Dedicated support
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              On-premise option
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Training included
            </li>
          </ul>

          <a href="{{ route('contact') }}"
             class="block w-full px-6 py-3 text-center text-purple-600 transition-all border-2 border-purple-600 rounded-full hover:bg-purple-600 hover:text-white">
            Contact Sales
          </a>
        </div>
      </div>

      <p class="mt-6 text-xs text-gray-500">
        * All prices exclude VAT. Usage-based add-ons (e.g., extra warehouses, advanced QC, EDI) billed separately.
      </p>
    </div>
  </section>

  {{-- Comparison Table (hard-coded to avoid PHP/Blade loops) --}}
  <section class="py-16 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <h2 class="mb-10 text-2xl font-bold text-center md:text-3xl">Compare Plans</h2>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-100 shadow rounded-2xl">
          <thead>
            <tr class="text-left">
              <th class="px-5 py-4 text-sm font-semibold text-gray-600">Capability</th>
              <th class="px-5 py-4 text-sm font-semibold text-gray-600">Starter</th>
              <th class="px-5 py-4 text-sm font-semibold text-gray-600">Professional</th>
              <th class="px-5 py-4 text-sm font-semibold text-gray-600">Enterprise</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            <tr>
              <td class="px-5 py-4 text-gray-800">Inventory (multi-warehouse, lots/serials)</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">Production Planning (MRP, capacity)</td>
              <td class="px-5 py-4">Lite</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">Analytics & Reporting</td>
              <td class="px-5 py-4">Basic</td>
              <td class="px-5 py-4">Advanced</td>
              <td class="px-5 py-4">Advanced + custom</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">CRM (leads, quotes, orders)</td>
              <td class="px-5 py-4">Lite</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">Financials (AP/AR, VAT, multi-currency)</td>
              <td class="px-5 py-4">Basic</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Advanced</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">API & Webhooks</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">Priority Support</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">Included</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">SSO / Advanced Security</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">Included</td>
            </tr>
            <tr>
              <td class="px-5 py-4 text-gray-800">On-premise / Private Cloud</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">—</td>
              <td class="px-5 py-4">Included</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mt-8 text-center">
        <a href="{{ route('contact') }}" class="btn-secondary">Need a detailed quote? Talk to sales</a>
      </div>
    </div>
  </section>

  {{-- FAQ --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">
      <h2 class="mb-10 text-3xl font-bold text-center">Pricing FAQs</h2>

      <div class="space-y-4">
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">Is there a free trial?</summary>
          <p class="mt-2 text-gray-700">Yes, a 14-day free trial on Starter and Professional. No credit card required.</p>
        </details>
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">What’s included in “Professional” vs “Starter”?</summary>
          <p class="mt-2 text-gray-700">Professional unlocks all modules, priority support, advanced analytics, API & Webhooks, and higher user limits.</p>
        </details>
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">Do you offer discounts?</summary>
          <p class="mt-2 text-gray-700">Annual billing saves ~15% compared to monthly. Volume and multi-site discounts available—<a href="{{ route('contact') }}" class="text-purple-600 underline">contact sales</a>.</p>
        </details>
        <details class="p-5 bg-white shadow-sm rounded-xl">
          <summary class="font-semibold cursor-pointer">Can I add modules later?</summary>
          <p class="mt-2 text-gray-700">Absolutely. ManuCore is modular—add capabilities as your needs grow.</p>
        </details>
      </div>
    </div>
  </section>

  {{-- CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-4 text-3xl font-bold md:text-4xl">Ready to get started?</h2>
      <p class="mb-8 text-lg text-gray-100">Join 500+ manufacturers who run on ManuCore ERP.</p>
      <div class="flex flex-col justify-center gap-4 sm:flex-row">
        <a href="{{ route('register') }}" class="btn-primary">Start Free Trial</a>
        <a href="{{ route('contact') }}" class="btn-secondary">Request a Quote</a>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  (function(){
    const btnMonthly = document.getElementById('btn-monthly');
    const btnAnnual  = document.getElementById('btn-annual');
    const prices = document.querySelectorAll('.price-amount');

    function setPeriod(period){
      prices.forEach(p => {
        p.dataset.hidden = (p.dataset.period === period) ? 'false' : 'true';
      });
      if(period === 'monthly'){
        btnMonthly.classList.add('bg-white','text-purple-700');
        btnAnnual.classList.remove('bg-white','text-purple-700');
        btnAnnual.classList.add('text-white');
      } else {
        btnAnnual.classList.add('bg-white','text-purple-700');
        btnMonthly.classList.remove('bg-white','text-purple-700');
        btnMonthly.classList.add('text-white');
      }
    }

    btnMonthly.addEventListener('click', () => setPeriod('monthly'));
    btnAnnual.addEventListener('click', () => setPeriod('annual'));
  })();
</script>
@endpush
