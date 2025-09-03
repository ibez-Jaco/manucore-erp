@php
    $active = $active ?? '';
    $tabs = [
        'overview'      => ['label' => 'Overview',         'route' => 'settings.company'],
        'basic'         => ['label' => 'Basic',            'route' => 'settings.company.basic'],
        'contact'       => ['label' => 'Contact',          'route' => 'settings.company.contact'],
        'address'       => ['label' => 'Address',          'route' => 'settings.company.address'],
        'financial'     => ['label' => 'Financial',        'route' => 'settings.company.financial'],
        'system'        => ['label' => 'System',           'route' => 'settings.company.system'],
        'finance'       => ['label' => 'Banking & VAT',    'route' => 'settings.company.finance'],
        'email'         => ['label' => 'Email & Templates','route' => 'settings.company.email'],
        'infrastructure'=> ['label' => 'Infrastructure',   'route' => 'settings.company.infrastructure'],
    ];
@endphp
<div class="flex flex-wrap gap-2 mb-4">
    @foreach ($tabs as $key => $tab)
        <a href="{{ route($tab['route']) }}"
           class="link-tab {{ $active === $key ? 'active' : '' }}">
            {{ $tab['label'] }}
        </a>
    @endforeach
</div>
