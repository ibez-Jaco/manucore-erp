@props([
    'icon' => 'file-question',
    'title' => 'Nothing here yet',
    'message' => 'There is no data to display.',
])

<div class="py-10 text-center erp-card">
    @php $iconComp = 'lucide-' . $icon; @endphp
    <x-dynamic-component :component="$iconComp" class="w-10 h-10 mx-auto mb-3 text-slate-400"/>
    <h3 class="text-lg font-semibold text-slate-800">{{ $title }}</h3>
    <p class="mt-1 text-slate-600">{{ $message }}</p>
    @if (trim($slot))
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
</div>
