ManuCore ERP — Build Tracker (Laravel 12, Breeze/Blade, Tailwind+Vite, Alpine, SweetAlert2, spatie/permission, spatie/medialibrary)

Legend: ✅ Done · 🚧 In progress · ⏭ Next · 🔜 Soon · 🧩 Blocked

PHASE 4 — Settings, Branding & Admin Surfaces
4.1 Front surfaces & base theme plumbing — ✅
• Public views (front/help/status/privacy) present and resolvable
• Base theme tokens in resources/css/theme.css + front.css
• Errors/logs cleaned; nginx/php-fpm rotated/truncated as needed

4.2 ApplyTheme + Branding Settings — ✅
• Middleware ApplyTheme registered in bootstrap/app.php (no Http\Kernel)
• BrandingController (edit/update + logo upload/remove via Media Library)
• Panel layout + partials (layouts/panel.blade.php, settings/partials/{header,sidebar}.blade.php)
• Default brand assets: public/brand/system/{favicon.ico,ManucoreIcon.png,ManucoreLogo.png,ManucoreLogoColour.png}
• Routes grouped in routes/settings.php under /system/settings + name "settings.\*"

4.3 Company Settings (Basics) — ✅
• CompanyController@index + company (GET) + update (POST)
• FormRequest: UpdateCompanyRequest
• Blade: settings/company/index.blade.php wired to layout/partials

4.4 Branch Management CRUD + Bin + Hours — ✅
• BranchController: index/create/store/edit/update/destroy/updateHours (+ soft delete bin and restore/force if enabled)
• Blade: settings/branches/{index,create,edit}.blade.php
• JSON “operating_hours” editor
• Sidebar highlights routes; SweetAlert2 confirms delete

4.5 Company: Banking & VAT (+ Address polish) — ⏭ NEXT
Deliver: - Migration (if fields missing on companies) - FormRequest: UpdateCompanyFinanceRequest - Controller: CompanyController@finance (GET), @financeUpdate (POST) - Views: settings/company/finance.blade.php (+ tabs between Overview & Finance) - Routes: GET/POST /system/settings/company/finance - SweetAlert2 flash on success/error

4.6 Email/Document Templates & Legal Pages — 🔜
Deliver: - DB store (templates table or JSON on companies/settings) - Blade editor with preview/reset and variable helper (e.g., {{company.name}}, {{branch.name}}) - Terms/Privacy/Help editors (Markdown), front pages already wired - Controller + FormRequests + routes under settings.\*

4.7 Polish & QA — 🔜
Deliver: - Global SweetAlert2 flash component (success/error/warning) - Empty states, loading states, consistent buttons - Accessibility sweep; focus states; keyboard nav - Final acceptance checklist & smoke tests

PHASE 5 — Admin & Users (high level outline)
5.1 Users & Roles UI — 🔜
• User CRUD, role assignment (spatie/permission)
5.2 Role/Permission Matrix — 🔜
• Readonly matrix + quick assigns; seed defaults
5.3 Audit & Activity — 🔜
• (Optional) add activity log, basic audit views

PHASE 6 — Sales Foundations (outline)
6.1 Customers/Contacts — 🔜
6.2 Quotes — 🔜
6.3 Orders — 🔜

PHASE 7 — Inventory Foundations (outline)
7.1 Products/SKUs — 🔜
7.2 Warehousing (ties to Branch.holds_inventory) — 🔜

CURRENT STATUS
• We are at: 4.5 — Company: Banking & VAT (+ Address polish)

ACCEPTANCE SNAPSHOT FOR 4.5 (to verify when delivered)
[ ] routes/settings.php has settings.company.finance (GET) & settings.company.finance.update (POST)
[ ] settings/company/finance.blade.php renders, saves, and flashes success
[ ] Migration (if needed) adds address/banking/VAT fields; Company::$fillable updated
[ ] Tinker check returns saved values from Company::getMain() ?? Company::first()
