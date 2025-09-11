@extends('layouts.panel')

@section('title', 'Audit Logs - ManuCore ERP')
@section('header', 'System Audit Logs')
@section('subheader', 'View and manage application logs')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Logs</h3>
        <div class="card-actions">
            <form method="GET" action="{{ route('admin.logs') }}" class="gap-2 d-flex">
                <select name="file" class="form-select">
                    @php
                        $active = $activeFile ?? 'laravel.log';
                    @endphp
                    @foreach($files as $f)
                        <option value="{{ $f['name'] }}" @selected($active === $f['name'])>
                            {{ $f['name'] }} ({{ number_format($f['size'] / 1024, 1) }} KB)
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-secondary btn-sm">Open</button>
            </form>
        </div>
    </div>

    <div class="space-y-4 card-body">
        <div class="gap-2 d-flex">
            <a class="btn btn-secondary btn-sm"
               href="{{ route('admin.logs.download', ['file' => $active]) }}">
               <x-lucide-download class="w-4 h-4" /> Download
            </a>

            <a class="btn btn-secondary btn-sm"
               target="_blank"
               href="{{ route('admin.logs.tail', ['file' => $active, 'lines' => 300]) }}">
               <x-lucide-terminal class="w-4 h-4" /> Tail (300)
            </a>

            <form method="POST" action="{{ route('admin.logs.rotate') }}" onsubmit="return confirm('Rotate this log now? A timestamped copy will be archived and a fresh file created.');">
                @csrf
                <input type="hidden" name="file" value="{{ $active }}">
                <button class="btn btn-secondary btn-sm" type="submit">
                    <x-lucide-rotate-ccw class="w-4 h-4" /> Rotate
                </button>
            </form>

            <form method="POST" action="{{ route('admin.logs.purge') }}" onsubmit="return confirm('Purge (truncate) this log? This cannot be undone.');">
                @csrf
                <input type="hidden" name="file" value="{{ $active }}">
                <button class="btn btn-danger btn-sm" type="submit">
                    <x-lucide-trash-2 class="w-4 h-4" /> Purge
                </button>
            </form>
        </div>

        <div class="p-3 border rounded bg-neutral-50" style="max-height: 420px; overflow:auto;">
            <pre style="margin:0; white-space:pre-wrap;" id="log-preview">Loading preview…</pre>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async () => {
    const preview = document.getElementById('log-preview');
    const url = @json(route('admin.logs.tail', ['file' => $active ?? 'laravel.log', 'lines' => 200]));
    try {
        const res = await fetch(url, { headers: { 'Accept': 'text/plain' } });
        preview.textContent = res.ok ? await res.text() : 'Failed to load log preview.';
    } catch (e) {
        preview.textContent = 'Failed to load log preview.';
    }
});
</script>
@endpush
