{{-- resources/views/front/partials/navigation.blade.php --}}
<nav
  id="navbar"
  data-transparent="{{ request()->routeIs('home') ? 'true' : 'false' }}"
  class="fixed top-0 z-50 w-full transition-all duration-300 shadow-sm bg-white/90 backdrop-blur"
  role="navigation"
  aria-label="Primary"
>
  {{-- Skip to content --}}
  <a href="#main" class="px-3 py-2 text-white bg-purple-600 rounded sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2">
    Skip to content
  </a>

  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      {{-- Logo --}}
      <div class="flex items-center">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
          <img
            src="{{ asset('brand/front/ManucoreLogoColour.png') }}"
            alt="{{ config('app.name', 'ManuCore ERP') }}"
            class="w-auto transition-transform duration-200 h-9 nav-logo hover:scale-105"
            id="navLogo"
          >
        </a>
      </div>

      {{-- Desktop nav --}}
      <div class="items-center hidden md:flex">
        <ul class="flex items-center gap-1">
          {{-- Home (anchors) --}}
          <li>
            <a href="{{ route('home') }}#home"
               class="px-3 py-2 rounded-md text-sm font-medium transition-colors
                      {{ request()->routeIs('home') ? 'text-purple-600' : 'text-gray-700 hover:text-purple-600' }}">
              Home
            </a>
          </li>

          {{-- Product dropdown --}}
          <li class="relative">
            <details class="group">
              <summary
                class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-gray-700 list-none rounded-md cursor-pointer hover:text-purple-600"
                aria-haspopup="menu"
              >
                Product
                <svg class="w-4 h-4 transition-transform group-open:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.177l3.71-3.946a.75.75 0 111.08 1.04l-4.24 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </summary>
              <div
                class="absolute right-0 w-64 p-2 mt-2 translate-y-2 bg-white border border-gray-100 shadow-lg opacity-0 pointer-events-none rounded-xl group-open:opacity-100 group-open:translate-y-0 group-open:pointer-events-auto"
                role="menu"
              >
                <a href="{{ route('home') }}#features" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded">🧩</div>
                  <div>
                    <div class="font-medium">Features</div>
                    <p class="text-xs text-gray-500">Inventory, MRP, CRM, Finance</p>
                  </div>
                </a>
                <a href="{{ route('home') }}#solutions" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-indigo-100 rounded">🏭</div>
                  <div>
                    <div class="font-medium">Solutions</div>
                    <p class="text-xs text-gray-500">Industry-specific workflows</p>
                  </div>
                </a>
                <a href="{{ route('integrations') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-pink-100 rounded">🔌</div>
                  <div>
                    <div class="font-medium">Integrations</div>
                    <p class="text-xs text-gray-500">APIs & third-party apps</p>
                  </div>
                </a>
                <a href="{{ route('pricing') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 rounded bg-emerald-100">💳</div>
                  <div>
                    <div class="font-medium">Pricing</div>
                    <p class="text-xs text-gray-500">Simple plans for every team</p>
                  </div>
                </a>
              </div>
            </details>
          </li>

          {{-- Resources dropdown --}}
          <li class="relative">
            <details class="group">
              <summary class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-gray-700 list-none rounded-md cursor-pointer hover:text-purple-600">
                Resources
                <svg class="w-4 h-4 transition-transform group-open:rotate-180" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.177l3.71-3.946a.75.75 0 111.08 1.04l-4.24 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
              </summary>
              <div class="absolute right-0 w-64 p-2 mt-2 translate-y-2 bg-white border border-gray-100 shadow-lg opacity-0 pointer-events-none rounded-xl group-open:opacity-100 group-open:translate-y-0 group-open:pointer-events-auto">
                <a href="{{ route('api-docs') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded">📘</div>
                  <div><div class="font-medium">API Docs</div><p class="text-xs text-gray-500">Auth, endpoints, webhooks</p></div>
                </a>
                <a href="{{ route('help') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-yellow-100 rounded">❓</div>
                  <div><div class="font-medium">Help Center</div><p class="text-xs text-gray-500">Guides & FAQs</p></div>
                </a>
                <a href="{{ route('status') }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50">
                  <div class="flex items-center justify-center w-8 h-8 bg-green-100 rounded">📈</div>
                  <div><div class="font-medium">System Status</div><p class="text-xs text-gray-500">Uptime & incidents</p></div>
                </a>
              </div>
            </details>
          </li>

          {{-- Company dropdown --}}
          <li class="relative">
            <details class="group">
              <summary class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-gray-700 list-none rounded-md cursor-pointer hover:text-purple-600">
                Company
                <svg class="w-4 h-4 transition-transform group-open:rotate-180" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.177l3.71-3.946a.75.75 0 111.08 1.04l-4.24 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
              </summary>
              <div class="absolute right-0 w-56 p-2 mt-2 translate-y-2 bg-white border border-gray-100 shadow-lg opacity-0 pointer-events-none rounded-xl group-open:opacity-100 group-open:translate-y-0 group-open:pointer-events-auto">
                <a href="{{ route('about') }}" class="block p-3 rounded-lg hover:bg-gray-50">About</a>
                <a href="{{ route('careers') }}" class="block p-3 rounded-lg hover:bg-gray-50">Careers</a>
                <a href="{{ route('blog') }}" class="block p-3 rounded-lg hover:bg-gray-50">Blog</a>
                <a href="{{ route('contact') }}" class="block p-3 rounded-lg hover:bg-gray-50">Contact</a>
              </div>
            </details>
          </li>

          {{-- CTA(s) --}}
          @guest
            <li class="pl-2">
              <a href="{{ route('login') }}" class="px-4 py-2 text-sm text-white transition-all bg-purple-600 rounded-full shadow-sm hover:bg-purple-700 hover:shadow">
                Login
              </a>
            </li>
            <li>
              <a href="{{ route('register') }}" class="px-4 py-2 text-sm text-purple-600 transition-all border-2 border-purple-600 rounded-full hover:bg-purple-600 hover:text-white">
                Get Started
              </a>
            </li>
          @else
            <li class="pl-2">
              <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm text-white transition-all bg-purple-600 rounded-full shadow-sm hover:bg-purple-700 hover:shadow">
                Dashboard
              </a>
            </li>
          @endguest
        </ul>
      </div>

      {{-- Mobile button --}}
      <div class="flex items-center md:hidden">
        <button
          onclick="toggleMobileMenu()"
          aria-controls="mobileMenu"
          aria-expanded="false"
          class="p-2 text-gray-700 rounded-md hover:text-purple-600 focus:outline-none hover:bg-gray-100"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="sr-only">Toggle navigation</span>
        </button>
      </div>
    </div>
  </div>

  {{-- Mobile menu --}}
  <div id="mobileMenu" class="hidden border-t md:hidden bg-white/95 backdrop-blur">
    <div class="px-4 py-3 space-y-1">
      <a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Home</a>

      {{-- Groups as <details> for a11y --}}
      <details>
        <summary class="px-3 py-2 rounded cursor-pointer hover:bg-gray-50">Product</summary>
        <div class="pb-2 pl-4">
          <a href="{{ route('home') }}#features" class="block px-3 py-2 rounded hover:bg-gray-50">Features</a>
          <a href="{{ route('home') }}#solutions" class="block px-3 py-2 rounded hover:bg-gray-50">Solutions</a>
          <a href="{{ route('integrations') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Integrations</a>
          <a href="{{ route('pricing') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Pricing</a>
        </div>
      </details>

      <details>
        <summary class="px-3 py-2 rounded cursor-pointer hover:bg-gray-50">Resources</summary>
        <div class="pb-2 pl-4">
          <a href="{{ route('api-docs') }}" class="block px-3 py-2 rounded hover:bg-gray-50">API Docs</a>
          <a href="{{ route('help') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Help Center</a>
          <a href="{{ route('status') }}" class="block px-3 py-2 rounded hover:bg-gray-50">System Status</a>
        </div>
      </details>

      <details>
        <summary class="px-3 py-2 rounded cursor-pointer hover:bg-gray-50">Company</summary>
        <div class="pb-2 pl-4">
          <a href="{{ route('about') }}" class="block px-3 py-2 rounded hover:bg-gray-50">About</a>
          <a href="{{ route('careers') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Careers</a>
          <a href="{{ route('blog') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Blog</a>
          <a href="{{ route('contact') }}" class="block px-3 py-2 rounded hover:bg-gray-50">Contact</a>
        </div>
      </details>

      @guest
        <a href="{{ route('login') }}" class="block px-3 py-2 text-center text-white bg-purple-600 rounded-lg">Login</a>
        <a href="{{ route('register') }}" class="block px-3 py-2 text-center text-purple-600 border-2 border-purple-600 rounded-lg">Get Started</a>
      @else
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-center text-white bg-purple-600 rounded-lg">Dashboard</a>
      @endguest
    </div>
  </div>
</nav>
