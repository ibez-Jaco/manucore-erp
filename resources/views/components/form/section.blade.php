@props([
    'title' => null,
    'description' => null,
])

<section class="form-card">
    @if($title || $description)
        <div class="form-card-header">
            @if($title)
                <h2 class="form-card-title">{{ $title }}</h2>
            @endif
            {{-- Optional actions slot --}}
            <div class="flex items-center gap-2">
                {{ $actions ?? '' }}
            </div>
        </div>
        @if($description)
            <p class="mb-3 text-muted">{{ $description }}</p>
        @endif
    @endif

    <div class="form-grid">
        {{ $slot }}
    </div>
</section>
