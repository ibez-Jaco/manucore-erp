@extends('layouts.panel')

@section('content')
    <h1 class="mb-4 text-xl font-semibold">Email Templates</h1>
    @include('settings.partials._flash')
    @include('settings.partials._errors')

    {{-- Provide initial data to Alpine as JSON, not via complex Blade expressions --}}
    <script type="application/json" id="tpl-initial">@json($initial)</script>

    <div x-data="templatesEditor()" x-init="init()" class="grid grid-cols-1 gap-6 lg:grid-cols-12">

        {{-- Left: form --}}
        <div class="space-y-4 lg:col-span-7">
            <div class="flex flex-wrap gap-2">
                <template x-for="(cfg, slug) in items" :key="slug">
                    <button type="button"
                            class="link-tab"
                            :class="tab===slug ? 'active' : ''"
                            x-text="cfg.label"
                            @click="setTab(slug)"></button>
                </template>
            </div>

            <form method="POST" action="{{ route('settings.templates.update') }}" class="space-y-6 form-card">
                @csrf

                <div class="form-group">
                    <label class="label">Subject</label>
                    <input type="text" class="input"
                           :name="`templates[${tab}][subject]`"
                           x-model="items[tab].subject"
                           @input="onChange()" maxlength="255" />
                </div>

                <div class="form-group">
                    <label class="label">Format</label>
                    <select class="select"
                            :name="`templates[${tab}][format]`"
                            x-model="items[tab].format"
                            @change="onChange()">
                        <option value="markdown">Markdown</option>
                        <option value="blade">Blade (sandboxed)</option>
                        <option value="html">HTML (sanitized)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="label">Body</label>
                    <textarea class="textarea min-h-[260px]"
                              :name="`templates[${tab}][body]`"
                              x-model="items[tab].body"
                              @input="onChange()"></textarea>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="btn erp-btn">Save Templates</button>

                    {{-- Reset forms (built once; posted for current tab) --}}
                    <template x-for="(cfg, s) in items" :key="'reset-'+s">
                        <form :id="`reset-form-${s}`" method="POST"
                              action="{{ route('settings.templates.reset', ':slug') }}"
                              x-init="$el.action = $el.action.replace(':slug', s)">
                            @csrf
                        </form>
                    </template>

                    <button type="button" class="btn danger" @click="resetTemplate(tab)">
                        Reset this template
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: preview + helper --}}
        <div class="space-y-4 lg:col-span-5">
            <div class="form-card">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-semibold">Live Preview</h3>
                    <span class="text-xs text-slate-500" x-text="tab"></span>
                </div>
                <div class="p-4 prose bg-white border rounded-lg max-w-none" x-html="previewHtml"></div>
            </div>

            @include('settings.templates._variables')
        </div>
    </div>

    <script>
        function templatesEditor() {
            return {
                tab: 'invoice_email',
                items: {},
                previewHtml: '',
                previewTimer: null,

                init() {
                    try { this.items = JSON.parse(document.getElementById('tpl-initial').textContent); }
                    catch (e) { this.items = {}; }
                    if (!this.items[this.tab]) {
                        this.tab = Object.keys(this.items)[0] || 'invoice_email';
                    }
                    this.refreshPreview();
                },

                setTab(slug) {
                    this.tab = slug;
                    this.refreshPreview();
                },

                onChange() {
                    clearTimeout(this.previewTimer);
                    this.previewTimer = setTimeout(() => this.refreshPreview(), 400);
                },

                refreshPreview() {
                    const cur = this.items[this.tab] || { body: '', format: 'markdown' };
                    fetch('{{ route('settings.templates.preview') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ body: cur.body || '', format: cur.format || 'markdown' })
                    }).then(r => r.json())
                     .then(d => { this.previewHtml = d.html || ''; })
                     .catch(() => { this.previewHtml = '<div class="alert alert-error">Preview failed</div>'; });
                },

                resetTemplate(slug) {
                    if (!window.Swal) { document.getElementById('reset-form-' + slug).submit(); return; }
                    Swal.fire({
                        title: 'Reset to defaults?',
                        text: 'This will restore the seeded content for this template.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Reset',
                        confirmButtonColor: '#2171B5',
                        cancelButtonColor: '#dc2626'
                    }).then((res) => {
                        if (res.isConfirmed) {
                            document.getElementById('reset-form-' + slug).submit();
                        }
                    });
                }
            }
        }
    </script>
@endsection
