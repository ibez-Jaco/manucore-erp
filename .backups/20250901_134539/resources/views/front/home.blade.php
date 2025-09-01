@extends('layouts.front')

@section('title', 'ManuCore ERP – Modern ERP for Manufacturing')

@section('content')
    <!-- HERO -->
    <section class="front-hero text-white relative overflow-hidden">
        <div class="container mx-auto px-4 py-24 md:py-28 text-center">
            <div class="mx-auto max-w-3xl erp-fade-in">
                <img src="{{ asset('images/Logo.png') }}" alt="ManuCore ERP" class="mx-auto h-14 mb-6 opacity-95">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                    Run Your Manufacturing on One Modern ERP
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-10">
                    Quotes, customers, documents and operations—designed for speed, accuracy, and scale.
                </p>
                <div class="flex items-center justify-center gap-4">
                    <a href="{{ route('dashboard') }}"
                       class="erp-btn erp-btn-primary">
                        Get Started
                    </a>
                    <a href="#features"
                       class="erp-btn erp-btn-secondary">
                        Explore Features
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative slanted divider -->
        <div class="absolute bottom-0 left-0 right-0 h-24 md:h-28 bg-white"
             style="clip-path: polygon(0 30%, 100% 0, 100% 100%, 0% 100%);"></div>
    </section>

    <!-- HIGHLIGHTS -->
    <section class="bg-white">
        <div class="container mx-auto px-4 pt-8 md:pt-12">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 -mt-16 md:-mt-20">
                <div class="erp-card text-center">
                    <div class="text-sm uppercase tracking-wide text-gray-500 mb-1">Implementation</div>
                    <div class="text-2xl font-bold text-[color:var(--primary-1)]">Fast & Guided</div>
                </div>
                <div class="erp-card text-center">
                    <div class="text-sm uppercase tracking-wide text-gray-500 mb-1">Security</div>
                    <div class="text-2xl font-bold text-[color:var(--primary-1)]">Role-based Access</div>
                </div>
                <div class="erp-card text-center">
                    <div class="text-sm uppercase tracking-wide text-gray-500 mb-1">Scalability</div>
                    <div class="text-2xl font-bold text-[color:var(--primary-1)]">From 1 → 100+ Users</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="container mx-auto px-4 py-16 md:py-20">
        <div class="text-center mb-12">
            <h2 class="erp-header">What You Can Do with ManuCore</h2>
            <p class="text-gray-600 mt-2">Everything essential for a modern manufacturing workflow—clean, fast, reliable.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">Customer Management</h3>
                <p class="text-gray-600">A focused CRM with contacts, addresses, and activity audit trails.</p>
            </div>
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">Quote Builder</h3>
                <p class="text-gray-600">CPQ-style quoting for Wrap & Melamine with accurate SQM & totals.</p>
            </div>
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">Document Management</h3>
                <p class="text-gray-600">Upload, version, tag, and secure documents across quotes & customers.</p>
            </div>
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">Audit & Change History</h3>
                <p class="text-gray-600">Every change tracked—who, what, and when—filtered by module.</p>
            </div>
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">Printing & PDFs</h3>
                <p class="text-gray-600">Pixel-perfect A4 outputs (wkhtmltopdf) for Quotes, Invoices, Job Cards.</p>
            </div>
            <div class="erp-card">
                <h3 class="text-xl font-semibold text-[color:var(--primary-1)] mb-2">RBAC Security</h3>
                <p class="text-gray-600">Roles & permissions (spatie) keep data clean and responsibilities clear.</p>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="bg-[color:var(--primary-5)]/70 py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="erp-header">How It Works</h2>
                <p class="text-gray-600 mt-2">Simple setup. Clear workflow. Real-world speed.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="erp-card">
                    <div class="text-sm font-semibold text-[color:var(--primary-2)] mb-2">Step 1</div>
                    <h3 class="text-xl font-semibold mb-2">Bootstrap & Theme</h3>
                    <p class="text-gray-600">Install, set branding, and connect your branches & company info.</p>
                </div>
                <div class="erp-card">
                    <div class="text-sm font-semibold text-[color:var(--primary-2)] mb-2">Step 2</div>
                    <h3 class="text-xl font-semibold mb-2">Load Master Data</h3>
                    <p class="text-gray-600">Add customers, contacts, price logic, and standard docs.</p>
                </div>
                <div class="erp-card">
                    <div class="text-sm font-semibold text-[color:var(--primary-2)] mb-2">Step 3</div>
                    <h3 class="text-xl font-semibold mb-2">Operate Daily</h3>
                    <p class="text-gray-600">Quote, track, upload, print—everything flows in one place.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MODULES QUICK GRID -->
    <section class="container mx-auto px-4 py-16 md:py-20">
        <div class="text-center mb-12">
            <h2 class="erp-header">Core Modules</h2>
            <p class="text-gray-600 mt-2">Built to expand—start small, grow confidently.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">CRM</div>
                <div class="font-semibold">Customers</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">CPQ</div>
                <div class="font-semibold">Quotes</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Docs</div>
                <div class="font-semibold">Documents</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Logs</div>
                <div class="font-semibold">Audit</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Security</div>
                <div class="font-semibold">RBAC</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Print</div>
                <div class="font-semibold">PDF Engine</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Ops</div>
                <div class="font-semibold">Branches</div>
            </div>
            <div class="erp-card text-center">
                <div class="text-sm text-gray-500 mb-1">Settings</div>
                <div class="font-semibold">Company</div>
            </div>
        </div>
    </section>

    <!-- STATS STRIP -->
    <section class="py-12 md:py-14 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <div class="dashboard-stat rounded-xl p-6 text-center">
                    <div class="text-3xl font-extrabold">3x</div>
                    <div class="text-sm mt-1 opacity-90">Faster quoting</div>
                </div>
                <div class="dashboard-stat rounded-xl p-6 text-center">
                    <div class="text-3xl font-extrabold">100%</div>
                    <div class="text-sm mt-1 opacity-90">Tracked changes</div>
                </div>
                <div class="dashboard-stat rounded-xl p-6 text-center">
                    <div class="text-3xl font-extrabold">A4</div>
                    <div class="text-sm mt-1 opacity-90">Perfect PDFs</div>
                </div>
                <div class="dashboard-stat rounded-xl p-6 text-center">
                    <div class="text-3xl font-extrabold">RBAC</div>
                    <div class="text-sm mt-1 opacity-90">Granular roles</div>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGO STRIP (optional) -->
    <section class="bg-[color:var(--gray-50)] py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-6 gap-6 md:gap-10 items-center grayscale opacity-70 hover:opacity-100 transition">
                <img src="{{ asset('images/logos/partner1.svg') }}" class="h-8 mx-auto" alt="Partner 1">
                <img src="{{ asset('images/logos/partner2.svg') }}" class="h-8 mx-auto" alt="Partner 2">
                <img src="{{ asset('images/logos/partner3.svg') }}" class="h-8 mx-auto" alt="Partner 3">
                <img src="{{ asset('images/logos/partner4.svg') }}" class="h-8 mx-auto" alt="Partner 4">
                <img src="{{ asset('images/logos/partner5.svg') }}" class="h-8 mx-auto" alt="Partner 5">
                <img src="{{ asset('images/logos/partner6.svg') }}" class="h-8 mx-auto" alt="Partner 6">
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS (lightweight) -->
    <section class="container mx-auto px-4 py-16 md:py-20">
        <div class="text-center mb-12">
            <h2 class="erp-header">What Teams Say</h2>
            <p class="text-gray-600 mt-2">Less admin. More production.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <div class="erp-card">
                <p class="text-gray-700 italic">“Quoting wrap jobs went from 30 minutes to under 10—accuracy improved, too.”</p>
                <div class="mt-4 text-sm text-gray-500">— Production Manager</div>
            </div>
            <div class="erp-card">
                <p class="text-gray-700 italic">“Audit logs gave us total confidence during training and rollout.”</p>
                <div class="mt-4 text-sm text-gray-500">— Operations Lead</div>
            </div>
            <div class="erp-card">
                <p class="text-gray-700 italic">“The PDFs look professional and clients actually compliment them.”</p>
                <div class="mt-4 text-sm text-gray-500">— Sales Coordinator</div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-[color:var(--primary-5)]/70 py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="erp-header">FAQ</h2>
                <p class="text-gray-600 mt-2">Quick answers to common questions.</p>
            </div>

            <div x-data="{ open: null }" class="mx-auto max-w-3xl space-y-4">
                @php
                    $faqs = [
                        ['q' => 'How quickly can we implement ManuCore?', 'a' => 'Most teams start quoting within days. We bootstrap, brand, and load master data in a guided sequence.'],
                        ['q' => 'Can we print professional quotes and job cards?', 'a' => 'Yes—wkhtmltopdf outputs A4-portrait PDFs with your logo, branch address, totals, and terms.'],
                        ['q' => 'Does it handle different quote types (Wrap/Melamine)?', 'a' => 'Yes. The CPQ flow supports both, with guarded switching and accurate SQM or per-item totals.'],
                        ['q' => 'Is access permissioned by role?', 'a' => 'Yes—spatie/permission powers granular roles & permissions across modules.'],
                        ['q' => 'Do you track all changes?', 'a' => 'Every create, update, and delete is logged with who/what/when. Filter by module and timeframe.'],
                    ];
                @endphp

                @foreach ($faqs as $i => $item)
                    <div class="erp-card">
                        <button class="w-full text-left flex justify-between items-center"
                                @click="open === {{ $i }} ? open = null : open = {{ $i }}">
                            <span class="font-semibold text-[color:var(--primary-1)]">{{ $item['q'] }}</span>
                            <span x-show="open !== {{ $i }}">＋</span>
                            <span x-show="open === {{ $i }}">—</span>
                        </button>
                        <div x-show="open === {{ $i }}" x-collapse class="mt-3 text-gray-700">
                            {{ $item['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="erp-card erp-gradient text-white text-center p-10">
                <h3 class="text-2xl md:text-3xl font-bold mb-3">Ready to streamline your manufacturing?</h3>
                <p class="text-white/90 mb-8">Spin up quotes, track changes, and ship professional PDFs—today.</p>
                <a href="{{ route('dashboard') }}" class="erp-btn erp-btn-primary">Open Dashboard</a>
            </div>
        </div>
    </section>
@endsection
