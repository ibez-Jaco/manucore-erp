@php
    use Illuminate\Support\Facades\Route as _Route;

    $active = $active ?? '';
    $tabs = [
        'overview'       => ['label' => 'Overview',          'route' => 'settings.company'],
        'basic'          => ['label' => 'Basic',             'route' => 'settings.company.basic'],
        'contact'        => ['label' => 'Contact',           'route' => 'settings.company.contact'],
        'address'        => ['label' => 'Address',           'route' => 'settings.company.address'],
        'financial'      => ['label' => 'Financial',         'route' => 'settings.company.financial'],
        'system'         => ['label' => 'System',            'route' => 'settings.company.system'],
        'finance'        => ['label' => 'Banking & VAT',     'route' => 'settings.company.finance'],
        'email'          => ['label' => 'Email & Templates', 'route' => 'settings.company.email'],
        'infrastructure' => ['label' => 'Infrastructure',    'route' => 'settings.company.infrastructure'],
    ];
@endphp

<div class="flex flex-wrap gap-2 mb-4">
    @foreach ($tabs as $key => $tab)
        @php
            $name    = $tab['route'];
            $exists  = _Route::has($name);
            $href    = $exists ? route($name) : (_Route::has('settings.company') ? route('settings.company') : '#');
            $isActive= $active === $key || ($exists && request()->routeIs($name));
        @endphp

        @if($exists)
            <a href="{{ $href }}" class="link-tab {{ $isActive ? 'active' : '' }}">{{ $tab['label'] }}</a>
        @else
            <span class="cursor-not-allowed link-tab opacity-60" title="Unavailable">{{ $tab['label'] }}</span>
        @endif
    @endforeach
</div>
