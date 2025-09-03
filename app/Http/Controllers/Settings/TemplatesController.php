<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateTemplatesRequest;
use App\Models\Company;
use App\Models\Template;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TemplatesController extends Controller
{
    /** @var string[] Slugs managed by this screen */
    private array $managedSlugs = ['invoice_email', 'quote_email', 'statement_email', 'generic_email'];

    /** Render the editor and ensure the 4 templates exist (redirect if no company). */
    public function edit()
{
    $company = method_exists(Company::class, 'getMain') ? Company::getMain() : Company::query()->first();
    if (!$company) {
        return redirect()->route('settings.company.basic')
            ->with('error', 'Please complete your Company Basics before editing Email Templates.');
    }
    $companyId = (int) $company->getKey();

    // Ensure rows exist with defaults
    $defaults = $this->defaults();
    foreach ($this->managedSlugs as $slug) {
        Template::firstOrCreate(
            ['company_id' => $companyId, 'slug' => $slug],
            [
                'name'      => $defaults[$slug]['name'] ?? Str::headline($slug),
                'subject'   => $defaults[$slug]['subject'] ?? null,
                'body'      => $defaults[$slug]['body'] ?? '',
                'format'    => $defaults[$slug]['format'] ?? 'markdown',
                'is_system' => true,
                'is_active' => true,
            ]
        );
    }

    /** @var \Illuminate\Support\Collection $templates */
    $templates = Template::where('company_id', $companyId)
        ->whereIn('slug', $this->managedSlugs)
        ->orderByRaw("FIELD(slug, '".implode("','", $this->managedSlugs)."')")
        ->get()
        ->keyBy('slug');

    // Build a clean initial payload for Alpine (avoid complex Blade)
    $labels = [
        'invoice_email'   => 'Invoice',
        'quote_email'     => 'Quote',
        'statement_email' => 'Statement',
        'generic_email'   => 'Generic',
    ];

    $initial = [];
    foreach ($this->managedSlugs as $slug) {
        $tpl = $templates->get($slug);
        $initial[$slug] = [
            'label'   => $labels[$slug] ?? Str::headline($slug),
            'subject' => old("templates.$slug.subject", $tpl?->subject),
            'format'  => old("templates.$slug.format",  $tpl?->format ?? 'markdown'),
            'body'    => old("templates.$slug.body",    $tpl?->body ?? ''),
        ];
    }

    return view('settings.templates.edit', [
        'company'   => $company,
        'templates' => $templates,
        'initial'   => $initial,
    ]);
}


    /** Save posted templates. */
    public function update(UpdateTemplatesRequest $request): RedirectResponse
    {
        $company = method_exists(Company::class, 'getMain') ? Company::getMain() : Company::query()->first();
        if (!$company) {
            return redirect()->route('settings.company.basic')
                ->with('error', 'Please complete your Company Basics before editing Email Templates.');
        }
        $companyId = (int) $company->getKey();
        $userId    = Auth::id();
        $payload   = $request->input('templates', []);

        DB::transaction(function () use ($companyId, $userId, $payload) {
            foreach ($payload as $slug => $data) {
                if (!in_array($slug, $this->managedSlugs, true)) {
                    continue;
                }

                $defaults = $this->defaults();

                Template::updateOrCreate(
                    ['company_id' => $companyId, 'slug' => $slug],
                    [
                        'name'       => $defaults[$slug]['name'] ?? Str::headline($slug),
                        'subject'    => $data['subject'] ?? null,
                        'body'       => $data['body'] ?? '',
                        'format'     => $data['format'] ?? 'markdown',
                        'is_system'  => true,
                        'is_active'  => true,
                        'updated_by' => $userId,
                    ]
                );
            }
        });

        return back()->with('success', 'Templates saved successfully.');
    }

    /** Live preview endpoint. */
    public function preview(Request $request): JsonResponse
    {
        $body   = (string) $request->input('body', '');
        $format = (string) $request->input('format', 'markdown');

        try {
            $html = match ($format) {
                'markdown' => $this->renderMarkdown($body),
                'html'     => $this->renderHtml($body),
                'blade'    => $this->renderBladePreview($body),
                default    => e($body),
            };

            return response()->json(['html' => $html]);
        } catch (\Throwable $e) {
            Log::warning('Template preview error: ' . $e->getMessage());
            return response()->json([
                'html' => '<div class="alert alert-error">Preview error: ' . e($e->getMessage()) . '</div>'
            ]);
        }
    }

    /** Reset one template back to seeded defaults. */
    public function reset(string $slug): RedirectResponse
    {
        $company = method_exists(Company::class, 'getMain') ? Company::getMain() : Company::query()->first();
        if (!$company) {
            return redirect()->route('settings.company.basic')
                ->with('error', 'Please complete your Company Basics before editing Email Templates.');
        }
        $companyId = (int) $company->getKey();
        $userId    = Auth::id();

        if (!in_array($slug, $this->managedSlugs, true)) {
            return back()->with('error', 'Unknown template.');
        }

        $defaults = $this->defaults();

        Template::updateOrCreate(
            ['company_id' => $companyId, 'slug' => $slug],
            [
                'name'       => $defaults[$slug]['name'] ?? Str::headline($slug),
                'subject'    => $defaults[$slug]['subject'] ?? null,
                'body'       => $defaults[$slug]['body'] ?? '',
                'format'     => $defaults[$slug]['format'] ?? 'markdown',
                'is_system'  => true,
                'is_active'  => true,
                'updated_by' => $userId,
            ]
        );

        return back()->with('success', 'Template restored to defaults.');
    }

    /* ----------------------------- Helpers ----------------------------- */

    /** Default seeded templates (keep in sync with TemplatesSeeder). */
    private function defaults(): array
    {
        return [
            'invoice_email' => [
                'name'    => 'Invoice Email',
                'subject' => 'Invoice {{ document.number }} from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => "Hi {{ customer.name }},\n\nPlease find attached **Invoice {{ document.number }}** dated {{ document.date }}.\n\n**Totals**  \n- Subtotal: R {{ document.total_excl }}  \n- VAT ({{ document.vat_percent }}%): R {{ document.total_incl - document.total_excl }}  \n- Total Due: **R {{ document.total_incl }}**\n\nIf you have any questions, reply to this email or contact us at {{ company.email }} / {{ company.phone }}.\n\nKind regards,  \n**{{ company.name }}**  \n{{ branch.name }}\n\n> Banking: Please reference **{{ document.number }}** on payment. Standard VAT rate is **15%** in South Africa.\n",
            ],
            'quote_email' => [
                'name'    => 'Quote Email',
                'subject' => 'Quote {{ document.number }} from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => "Hi {{ customer.name }},\n\nHere is your **Quote {{ document.number }}** dated {{ document.date }}.\n\n**Totals**  \n- Subtotal: R {{ document.total_excl }}  \n- VAT ({{ document.vat_percent }}%): R {{ document.total_incl - document.total_excl }}  \n- Total: **R {{ document.total_incl }}**\n\nLet us know if you’d like to proceed. We’re happy to assist with any adjustments.\n\nBest,  \n**{{ company.name }}**  \n{{ branch.name }}\n",
            ],
            'statement_email' => [
                'name'    => 'Statement Email',
                'subject' => 'Monthly Statement from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => "Dear {{ customer.name }},\n\nPlease find attached your **monthly statement** for {{ document.date }}.\n\nIf any items need clarification, contact Accounts at {{ company.email }}.  \nTotals shown are VAT inclusive at **15%** where applicable.\n\nSincerely,  \n**{{ company.name }}**  \n{{ branch.name }}\n",
            ],
            'generic_email' => [
                'name'    => 'Generic Email',
                'subject' => 'Message from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => "Hi {{ customer.name }},\n\nThis is a message regarding **{{ document.number }}** dated {{ document.date }}.\n\nWe appreciate your business.  \nFor assistance, reach us at {{ company.email }} / {{ company.phone }}.\n\nRegards,  \n**{{ company.name }}**  \n{{ branch.name }}\n",
            ],
        ];
    }

    /** Render markdown safely (uses league/commonmark if available; else plain nl2br). */
    private function renderMarkdown(string $body): string
    {
        try {
            if (method_exists(Str::class, 'markdown') && class_exists(\League\CommonMark\CommonMarkConverter::class)) {
                return Str::markdown($body);
            }
        } catch (\Throwable $e) {
            Log::notice('Markdown converter unavailable, falling back: ' . $e->getMessage());
        }
        return nl2br(e($body));
    }

    /** Render HTML with a basic allow-list + attribute cleanup. */
    private function renderHtml(string $body): string
    {
        $allowed = '<a><p><br><strong><em><ul><ol><li><table><thead><tbody><tr><th><td><h1><h2><h3><h4><img>';
        $san = strip_tags($body, $allowed);
        $san = preg_replace('/\son\w+="[^"]*"/i', '', $san);
        $san = preg_replace("/\son\w+='[^']*'/i", '', $san);
        $san = preg_replace_callback('/<a\s+([^>]+)>/i', function ($m) {
            $attrs = $m[1];
            if (preg_match('/target\s*=\s*"_blank"/i', $attrs) && !preg_match('/rel\s*=\s*"/i', $attrs)) {
                $attrs .= ' rel="noopener noreferrer"';
            }
            return '<a '.$attrs.'>';
        }, $san);
        return $san;
    }

    /** Render Blade with a strict, whitelisted variable bag; block dangerous directives. */
    private function renderBladePreview(string $body): string
    {
        $allowBlade = (bool) (config('app.debug') || env('TEMPLATES_ALLOW_BLADE_PREVIEW', false));
        if (!$allowBlade) {
            return '<div class="alert alert-warning">Blade preview is disabled in production. Enable via <code>TEMPLATES_ALLOW_BLADE_PREVIEW=true</code> or APP_DEBUG=true.</div>';
        }

        $forbidden = ['@php', '@inject', '@include', '@includeIf', '@includeWhen', '@includeUnless', '@includeFirst', '@each', '@extends', '@section', '@yield', '@use'];
        foreach ($forbidden as $bad) {
            if (stripos($body, $bad) !== false) {
                return '<div class="alert alert-error">Preview blocked: disallowed Blade directive detected.</div>';
            }
        }

        $bag = [
            'company' => ['name' => 'Your Company (Preview)', 'email' => 'info@example.co.za', 'phone' => '+27 10 000 0000'],
            'branch'  => ['name' => 'Johannesburg Branch'],
            'customer'=> ['name' => 'Customer Name', 'email' => 'customer@example.com'],
            'document'=> ['number' => 'INV-23990', 'date' => now()->format('Y-m-d'), 'total_excl' => '1,000.00', 'vat_percent' => '15', 'total_incl' => '1,150.00'],
        ];

        return Blade::render($body, $bag);
    }
}
