<div class="form-card">
    <h3 class="mb-2 font-semibold">Supported Variables</h3>
    <p class="mb-3 text-sm text-slate-600">
        You can reference these variables in your templates. For literal display here, Blade is escaped with <code>&#64;</code>.
    </p>

    <ul class="pl-5 space-y-1 text-sm list-disc">
        <li><code>&#123;&#123; company.name &#125;&#125;</code>, <code>&#123;&#123; company.email &#125;&#125;</code>, <code>&#123;&#123; company.phone &#125;&#125;</code></li>
        <li><code>&#123;&#123; branch.name &#125;&#125;</code></li>
        <li><code>&#123;&#123; customer.name &#125;&#125;</code>, <code>&#123;&#123; customer.email &#125;&#125;</code></li>
        <li><code>&#123;&#123; document.number &#125;&#125;</code>, <code>&#123;&#123; document.date &#125;&#125;</code></li>
        <li><code>&#123;&#123; document.total_excl &#125;&#125;</code>, <code>&#123;&#123; document.vat_percent &#125;&#125;</code>, <code>&#123;&#123; document.total_incl &#125;&#125;</code></li>
    </ul>

    <div class="mt-4 space-y-2 text-sm">
        <p class="font-medium">Markdown example</p>
        <pre class="p-3 text-xs whitespace-pre-wrap border rounded bg-slate-50">Hi &#123;&#123; customer.name &#125;&#125;,

Please find attached **Invoice &#123;&#123; document.number &#125;&#125;** dated &#123;&#123; document.date &#125;&#125;.

Subtotal: R &#123;&#123; document.total_excl &#125;&#125;
VAT (&#123;&#123; document.vat_percent &#125;&#125;%)
Total: **R &#123;&#123; document.total_incl &#125;&#125;**</pre>

        <p class="font-medium">Blade tokens (advanced / sandboxed)</p>
        <p>Dangerous directives are blocked. Avoid writing <code>&#64;php</code>, <code>&#64;include</code>, <code>&#64;inject</code>, etc.</p>
    </div>
</div>
