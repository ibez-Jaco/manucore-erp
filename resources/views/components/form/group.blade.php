@props([
    'for' => null,        // input id
    'label' => null,      // label text
    'help' => null,       // help text under field
    'error' => null,      // error message (optional override)
])

<div class="space-y-1">
    @if($label)
        <label for="{{ $for }}" class="erp-label">{{ $label }}</label>
    @endif

    <div {{ $attributes->merge(['class' => '']) }}>
        {{-- slot should contain the input/select/textarea --}}
        {{ $slot }}
    </div>

    @if($help)
        <p class="form-help">{{ $help }}</p>
    @endif

    @php
        $errMsg = $error ?? ($for ? $errors->first($for) : null);
    @endphp

    @if($errMsg)
        <p class="text-sm text-red-600" id="{{ $for }}-error">{{ $errMsg }}</p>
    @endif
</div>
