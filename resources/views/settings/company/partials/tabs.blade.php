{{-- resources/views/settings/company/partials/tabs.blade.php --}}
@php
    // Tab definitions with page-specific content
    $tabs = [
        'overview' => [
            'label' => 'Overview', 
            'route' => 'settings.company',
            'title' => 'Company Settings',
            'description' => 'Configure your organization information',
            'icon' => 'building-2',
            'show_back' => false
        ],
        'basic' => [
            'label' => 'Basic Info', 
            'route' => 'settings.company.basic',
            'title' => 'Basic Information',
            'description' => 'Core company identifiers and registration details',
            'icon' => 'info',
            'show_back' => true
        ],
        'contact' => [
            'label' => 'Contact', 
            'route' => 'settings.company.contact',
            'title' => 'Contact Information',
            'description' => 'Communication details and online presence',
            'icon' => 'phone',
            'show_back' => true
        ],
        'address' => [
            'label' => 'Address', 
            'route' => 'settings.company.address',
            'title' => 'Business Address',
            'description' => 'Physical and postal address information',
            'icon' => 'map-pin',
            'show_back' => true
        ],
        'financial' => [
            'label' => 'Financial', 
            'route' => 'settings.company.financial',
            'title' => 'Financial Settings',
            'description' => 'Currency, tax rates, and accounting preferences',
            'icon' => 'calculator',
            'show_back' => true
        ],
        'finance' => [
            'label' => 'Banking & VAT', 
            'route' => 'settings.company.finance',
            'title' => 'Banking & VAT',
            'description' => 'Bank details and tax registration settings',
            'icon' => 'banknote',
            'show_back' => true
        ],
        'system' => [
            'label' => 'System', 
            'route' => 'settings.company.system',
            'title' => 'System Settings',
            'description' => 'Timezone, date formats, and system preferences',
            'icon' => 'settings',
            'show_back' => true
        ],
        'email' => [
            'label' => 'Email', 
            'route' => 'settings.company.email',
            'title' => 'Email Configuration',
            'description' => 'Email templates and SMTP settings',
            'icon' => 'mail',
            'show_back' => true
        ],
        'infrastructure' => [
            'label' => 'Infrastructure', 
            'route' => 'settings.company.infrastructure',
            'title' => 'Infrastructure Settings',
            'description' => 'Technical configuration and system integration',
            'icon' => 'server',
            'show_back' => true
        ]
    ];

    // Get current active tab from route name
    $currentRoute = Route::currentRouteName();
    $activeTab = 'overview'; // default
    
    foreach ($tabs as $key => $tab) {
        if ($currentRoute === $tab['route']) {
            $activeTab = $key;
            break;
        }
    }
    
    $currentTabData = $tabs[$activeTab];
@endphp

{{-- Clean Professional Header --}}
<div class="mb-8 bg-white border-b border-gray-200">
    {{-- Tab Navigation --}}
    <div class="px-6 pt-6">
        <nav class="flex space-x-1 overflow-x-auto scrollbar-hide">
            @foreach($tabs as $key => $tab)
                @if(Route::has($tab['route']))
                    <a href="{{ route($tab['route']) }}" 
                       class="px-6 py-3 text-sm font-medium whitespace-nowrap rounded-lg transition-all duration-200
                              {{ $activeTab === $key 
                                  ? 'bg-blue-100 text-blue-700 shadow-sm' 
                                  : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                        {{ $tab['label'] }}
                    </a>
                @endif
            @endforeach
        </nav>
    </div>
    
    {{-- Page Header --}}
    <div class="px-6 py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center shadow-lg w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                    @if($currentTabData['icon'] === 'building-2')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.75m-.75 3h.75m-.75 3h.75m-3.75-16.5h.75m-.75 3h.75m-.75 3h.75m-.75 3h.75"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'info')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'phone')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'map-pin')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'calculator')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'banknote')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H3.75m0 0h-.375M21 10.5h.75c.621 0 1.125.504 1.125 1.125v.375m0 0c0 .621-.504 1.125-1.125 1.125H21m0 0h.375m0 0v-.375c0-.621.504-1.125 1.125-1.125m0 1.125h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.157 3.216 0 1.584-.233 2.707-1.627 2.707-3.227 0-1.6-1.123-2.994-2.707-3.227a15.72 15.72 0 0 0-3.216 0c-1.584.233-2.707 1.627-2.707 3.227Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'settings')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.932 6.932 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'mail')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                    @elseif($currentTabData['icon'] === 'server')
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 17.25v-.228a4.5 4.5 0 0 0-.12-1.03l-2.268-9.64a3.375 3.375 0 0 0-3.285-2.602H7.923a3.375 3.375 0 0 0-3.285 2.602l-2.268 9.64a4.5 4.5 0 0 0-.12 1.03v.228a4.5 4.5 0 0 0 4.5 4.5h9a4.5 4.5 0 0 0 4.5-4.5Z"/>
                        </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">{{ $currentTabData['title'] }}</h1>
                    <p class="mt-2 text-lg leading-relaxed text-gray-600">{{ $currentTabData['description'] }}</p>
                </div>
            </div>
            
            @if($currentTabData['show_back'])
                <a href="{{ route('settings.company') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-gray-700 bg-white border-2 border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    <span class="font-medium">Back to Overview</span>
                </a>
            @endif
        </div>
    </div>
</div>