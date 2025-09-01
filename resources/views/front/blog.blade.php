{{-- resources/views/front/blog.blade.php --}}
@extends('layouts.front')
@section('title', 'Blog - ManuCore ERP')

@section('content')
  {{-- Hero --}}
  <section class="text-white hero-gradient">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h1 class="mb-3 text-4xl font-bold md:text-5xl">Insights for Modern Manufacturers</h1>
        <p class="text-lg text-purple-100">
          Practical guides, product updates, and thought leadership from the ManuCore team.
        </p>
      </div>
    </div>
  </section>

  {{-- Filters + Search --}}
  <section class="py-8 bg-white border-b border-gray-100">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-wrap gap-2">
          <a href="{{ route('blog') }}" class="px-3 py-1 text-sm border rounded-full hover:bg-gray-50">All</a>
          <a href="{{ route('blog') }}" class="px-3 py-1 text-sm border rounded-full hover:bg-gray-50">Product</a>
          <a href="{{ route('blog') }}" class="px-3 py-1 text-sm border rounded-full hover:bg-gray-50">Manufacturing</a>
          <a href="{{ route('blog') }}" class="px-3 py-1 text-sm border rounded-full hover:bg-gray-50">Guides</a>
          <a href="{{ route('blog') }}" class="px-3 py-1 text-sm border rounded-full hover:bg-gray-50">Engineering</a>
        </div>
        <form action="{{ route('blog') }}" method="GET" class="w-full lg:w-80">
          <div class="relative">
            <input
              type="text"
              name="q"
              placeholder="Search articles…"
              class="pl-10 erp-input"
              value="{{ request('q') }}"
            />
            <svg class="absolute w-5 h-5 text-gray-400 -translate-y-1/2 left-3 top-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <circle cx="11" cy="11" r="8" stroke-width="2"></circle>
              <path d="M21 21l-4.3-4.3" stroke-width="2"></path>
            </svg>
          </div>
        </form>
      </div>
    </div>
  </section>

  {{-- Featured Post --}}
  <section class="bg-white py-14">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="p-0 overflow-hidden erp-card">
        <div class="grid md:grid-cols-2">
          <div class="h-64 bg-gray-200 md:h-auto">
            {{-- Replace with real image --}}
            <img src="https://images.unsplash.com/photo-1581090124701-86c6b0f0d2f0?q=80&w=1600&auto=format&fit=crop"
                 alt="Featured"
                 class="object-cover w-full h-full">
          </div>
          <div class="p-8 md:p-10">
            <div class="flex items-center gap-3 mb-3 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">Product</span>
              <span>Aug 22, 2025</span>
              <span>•</span>
              <span>7 min read</span>
            </div>
            <h2 class="mb-3 text-2xl font-bold md:text-3xl">
              Introducing ManuCore Work Orders v2 — Faster Planning, Clearer Execution
            </h2>
            <p class="mb-6 text-gray-700">
              A deep dive into our overhauled work order engine, with improved routing,
              capacity checks, and real-time floor updates.
            </p>
            <a href="#" class="btn-primary">Read Article</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Posts Grid --}}
  <section class="py-12 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        {{-- Post Card --}}
        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-700">Engineering</span>
              <span>Aug 12, 2025</span>
              <span>•</span>
              <span>6 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">Scaling MRP Calculations with Queues & Caching</h3>
            <p class="mb-4 text-gray-700">How we reduced planning runs from minutes to seconds in Laravel.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>

        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1581093588401-16b942bf09be?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-green-50 text-green-700">Guides</span>
              <span>Jul 30, 2025</span>
              <span>•</span>
              <span>10 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">A Practical Guide to Batch & Traceability in Food Manufacturing</h3>
            <p class="mb-4 text-gray-700">Set up batch tracking, expiries, and recalls with confidence.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>

        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1580894894513-541e068a1162?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Manufacturing</span>
              <span>Jul 10, 2025</span>
              <span>•</span>
              <span>8 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">5 Common Capacity Planning Pitfalls (and How to Avoid Them)</h3>
            <p class="mb-4 text-gray-700">Lessons learned across dozens of factory implementations.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>

        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">Product</span>
              <span>Jun 28, 2025</span>
              <span>•</span>
              <span>5 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">New: Multi-Warehouse Inventory Views</h3>
            <p class="mb-4 text-gray-700">See on-hand, allocated, and available across sites at a glance.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>

        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1565799554913-c77a5f3f53d0?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-rose-50 text-rose-700">Customer Story</span>
              <span>Jun 08, 2025</span>
              <span>•</span>
              <span>9 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">How AutoParts JHB Cut Lead Times by 22%</h3>
            <p class="mb-4 text-gray-700">A behind-the-scenes look at their ManuCore rollout.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>

        <article class="p-0 overflow-hidden erp-card hover-lift">
          <img src="https://images.unsplash.com/photo-1573496799652-408c2ac9fe98?q=80&w=1600&auto=format&fit=crop" class="object-cover w-full h-44" alt="">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-2 text-xs text-gray-500">
              <span class="px-2 py-0.5 rounded-full bg-cyan-50 text-cyan-700">Company</span>
              <span>May 22, 2025</span>
              <span>•</span>
              <span>4 min read</span>
            </div>
            <h3 class="mb-2 text-lg font-semibold">We’re Hiring Across Engineering, Product, and CS</h3>
            <p class="mb-4 text-gray-700">Come build with us — remote friendly, growth-oriented culture.</p>
            <a href="#" class="font-medium text-purple-600 hover:underline">Read more</a>
          </div>
        </article>
      </div>

      {{-- Pagination (static placeholder) --}}
      <div class="flex justify-center mt-10">
        <nav class="inline-flex overflow-hidden border rounded-full shadow-sm">
          <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">Previous</a>
          <span class="px-4 py-2 text-sm text-white bg-purple-600">1</span>
          <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">2</a>
          <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">3</a>
          <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">Next</a>
        </nav>
      </div>
    </div>
  </section>

  {{-- Newsletter CTA --}}
  <section class="py-16 text-white cta-gradient">
    <div class="max-w-3xl px-4 mx-auto text-center sm:px-6 lg:px-8">
      <h2 class="mb-3 text-3xl font-bold md:text-4xl">Get the latest in your inbox</h2>
      <p class="mb-6 text-purple-100">Monthly updates on product, guides, and manufacturing best practices.</p>
      <form action="#" method="POST" class="max-w-xl mx-auto">
        <div class="flex flex-col gap-3 sm:flex-row">
          <input type="email" class="w-full erp-input" placeholder="you@company.com" />
          <button type="submit" class="btn-primary">Subscribe</button>
        </div>
        <p class="mt-3 text-xs text-purple-100">We respect your privacy. Unsubscribe anytime.</p>
      </form>
    </div>
  </section>
@endsection
