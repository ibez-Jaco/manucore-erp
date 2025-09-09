Got it—here’s your **updated tracker** with **4.6 marked done** (and **Legal Pages removed**). You can paste this straight over the old one.

---

# ManuCore ERP — Build Tracker (Laravel 12, Breeze/Blade, Tailwind+Vite, Alpine, SweetAlert2, spatie/permission, spatie/medialibrary)

**Legend:** ✅ Done · 🚧 In progress · ⏭ Next · 🔜 Soon · 🧩 Blocked

## PHASE 4 — Settings, Branding & Admin Surfaces

**4.1 Front surfaces & base theme plumbing — ✅**
• Public views (front/help/status/privacy) present and resolvable
• Base theme tokens in `resources/css/theme.css` + `front.css`
• Errors/logs cleaned; nginx/php-fpm rotated/truncated as needed

**4.2 ApplyTheme + Branding Settings — ✅**
• Middleware `ApplyTheme` registered in `bootstrap/app.php` (no Http\Kernel)
• `BrandingController` (edit/update + logo upload/remove via Media Library)
• Panel layout + partials (`layouts/panel.blade.php`, `settings/partials/{header,sidebar}.blade.php`)
• Default brand assets: `public/brand/system/{favicon.ico,ManucoreIcon.png,ManucoreLogo.png,ManucoreLogoColour.png}`
• Routes grouped in `routes/settings.php` under `/system/settings` + name `settings.*`

**4.3 Company Settings (Basics) — ✅**
• `CompanyController@index` + `company` (GET) + `update` (POST)
• FormRequest: `UpdateCompanyRequest`
• Blade: `settings/company/index.blade.php` wired to layout/partials

**4.4 Branch Management CRUD + Bin + Hours — ✅**
• `BranchController`: index/create/store/edit/update/destroy/updateHours (+ soft delete bin and restore/force if enabled)
• Blade: `settings/branches/{index,create,edit}.blade.php`
• JSON “operating_hours” editor
• Sidebar highlights routes; SweetAlert2 confirms delete

**4.5 Company: Banking & VAT (+ Address polish) — ✅**
**Deliver:** migration for finance fields; `Company::$fillable` updated;
FormRequest `UpdateCompanyFinanceRequest`; Controller `finance/financeUpdate`;
View `settings/company/finance.blade.php`; routes `GET/POST /system/settings/company/finance`; flash on success.

---

### 4.6 Email/Document Templates — ✅ (Legal Pages excluded)

**Deliver (implemented):**

-   **DB:** `templates` table (FK `company_id`→companies, `updated_by`→users nullable, unique `(company_id, slug)`, softDeletes).
-   **Seeder:** `TemplatesSeeder` seeding 4 slugs for main company:
    `invoice_email`, `quote_email`, `statement_email`, `generic_email` — professional ZAR copy, **15% VAT** notes, placeholders:
    `{{ company.name }}, {{ company.email }}, {{ company.phone }}, {{ branch.name }}, {{ customer.name }}, {{ customer.email }}, {{ document.number }}, {{ document.date }}, {{ document.total_excl }}, {{ document.vat_percent }}, {{ document.total_incl }}`.
-   **Model:** `App\Models\Template` (fillable, boolean casts, `belongsTo Company`). `Company` has `templates()` relation.
-   **Validation:** `UpdateTemplatesRequest` (`templates.*.subject` nullable|max:255, `templates.*.body` required, `templates.*.format` in `markdown,blade,html`).
-   **Controller:** `Settings\TemplatesController`

    -   `edit()` ensures 4 rows exist for current company (seed defaults on-the-fly).
    -   `update()` upserts per slug for company; sets `updated_by = Auth::id()`; SweetAlert2 success.
    -   `preview()` returns JSON `{html: ...}` with sandboxed rendering:

        -   markdown → `Str::markdown()` (CommonMark)
        -   html → allow-list sanitize (a/p/br/strong/em/ul/ol/li/table/thead/tbody/tr/th/td/h1-h4/img)
        -   blade → **disabled by default** unless `APP_DEBUG=true` or `TEMPLATES_ALLOW_BLADE_PREVIEW=true`; blocks includes/@php; whitelisted variable bag only.

    -   `reset($slug)` restores seeded default for that template.

-   **Routes:** under `routes/settings.php` within `['auth','verified','role:Admin|SettingsManager']` group:
    `settings.templates.edit`, `.update`, `.preview`, `.reset`.
-   **Views:**

    -   `resources/views/settings/templates/edit.blade.php` — panel layout, 4 tabs (Invoice/Quote/Statement/Generic); Subject/Format/Body; right-side **live preview** (Alpine + debounce → `/templates/preview`); **Reset to defaults** per tab with SweetAlert2 confirm; flash blocks.
    -   `resources/views/settings/templates/_variables.blade.php` — supported variables & examples (Markdown + Blade, with sandbox warning).

-   **Navigation:** Settings sidebar entry **“Email Templates”** → `settings.templates.edit`.
-   **Security:** Company-scoped data only; no filesystem includes; no external libraries added.

**Acceptance (met):**

-   `php artisan route:list | grep settings.templates` shows 4 routes.
-   Tinker sanity:

    ```php
    $c=\App\Models\Company::getMain() ?? \App\Models\Company::first();
    [$c->id, \App\Models\Template::where('company_id',$c->id)
        ->whereIn('slug',['invoice_email','quote_email','statement_email','generic_email'])->count()];
    // => [<id>, 4]
    ```

-   UI: System → Settings → **Email Templates**

    -   Edit & Save shows SweetAlert2 success.
    -   Typing updates **live preview** without save.
    -   **Reset to defaults** restores seeded copy and flashes success.

-   RBAC enforced on all routes; no Legal Pages models/routes/views were introduced.

**(Optional 4.6.1 later):** “Send test email” button to mail a rendered template to the current user (skipped for now).

---

**4.7 Polish & QA — ⏭ Next**
**Deliver:** Global SweetAlert2 flash component; empty/loading states; consistent buttons; accessibility sweep (focus states, keyboard nav); final acceptance checklist & smoke tests.

## PHASE 5 — Admin & Users (high level outline)

**5.1 Users & Roles UI — 🔜**
• User CRUD, role assignment (spatie/permission)
**5.2 Role/Permission Matrix — 🔜**
• Readonly matrix + quick assigns; seed defaults
**5.3 Audit & Activity — 🔜**
• (Optional) add activity log, basic audit views

## PHASE 6 — Sales Foundations (outline)

**6.1 Customers/Contacts — 🔜**
**6.2 Quotes — 🔜**
**6.3 Orders — 🔜**

## PHASE 7 — Inventory Foundations (outline)

**7.1 Products/SKUs — 🔜**
**7.2 Warehousing (ties to Branch.holds_inventory) — 🔜**

---

## CURRENT STATUS

**Phase 4.6 complete** — Email/Document Templates delivered (Legal Pages intentionally excluded).
**Next:** **4.7 Polish & QA**.
