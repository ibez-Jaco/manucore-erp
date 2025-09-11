# ManuCore ERP — Admin System (Fresh Plan & Tracker)
**Updated:** 2025-09-11 10:03 UTC

**Stack:** Laravel 12 · PHP 8.3 · MySQL 8 · Redis · Nginx + PHP-FPM · Tailwind + Vite · Alpine · Breeze (Blade) · SweetAlert2  
**RBAC:** spatie/permission — Roles: `Admin`, `SettingsManager`, `Manager`, `Staff`, `Viewer`  
**Theme:** Uxintace Blue (primary) + Dark Mode  
**Ops:** Horizon, Spatie Health, Spatie Backup, Telescope (dev only)

---


## 0) Guardrails (what / why / how)

**Why** — Finish the Admin side without breaking UX or security.  
**How** — Ship in small phases with explicit DoD, route/RBAC checks, and rollback.  
**Not changing now** — Business modules behavior, customer/quote flows, public surface.

### Always run before/after each phase
```bash
# Environment validation (once per session)
php --version && composer --version && mysql --version && redis-server --version
node --version && npm --version && php artisan --version
composer check-platform-reqs

# Build & caches
npm run build
php artisan optimize:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache

# Quick quality gates
php artisan permission:show
grep -R "middleware.*auth" routes/
grep -R "@csrf" resources/views/ | wc -l

# Services
php artisan horizon:status
tail -n 200 storage/logs/laravel.log
```

### Rollback (global)
```bash
git restore .
php artisan optimize:clear
sudo systemctl restart php8.3-fpm && sudo systemctl reload nginx
```

---

## 1) Architecture & Files (target end‑state)

### Routes
- `routes/admin.php` → Admin surface at `/system/admin` (RBAC: role:Admin)
- `routes/settings.php` → Business settings (Admin | SettingsManager)
- **Developer gallery** under `/system/admin/templates/*` (gated)

### Controllers (intended final set)
- `Admin\DashboardController`  
- `Admin\UsersController` (Users CRUD, role assignment)  
- `Admin\RolesController` (Role CRUD, permission matrix)  
- `Admin\HealthController` (Spatie Health UI + run-now)  
- `Admin\BackupsController` (list/run/download/delete)  
- `Admin\LogsController` (safe viewer & download today)  
- `Admin\QueuesController` (Horizon summary + link/restart)  
- `Admin\AuditController` (unified audit viewer)  
- `Admin\OpsController` (cache clear, horizon terminate, prune helpers)  
- `Admin\TemplatesController` (gallery, gated)

### Views (Blade; extend `layouts.panel`)
- `resources/views/admin/index.blade.php` (dashboard)  
- `resources/views/admin/users/index.blade.php`  
- `resources/views/admin/roles/index.blade.php`  
- `resources/views/admin/health/index.blade.php`  
- `resources/views/admin/backups/index.blade.php`  
- `resources/views/admin/logs/index.blade.php`  
- `resources/views/admin/queues/index.blade.php`  
- `resources/views/admin/audit/index.blade.php`  
- `resources/views/admin/templates/*` (gallery)

### Policies, Requests, Jobs
- **Policies:** `UserPolicy`, `RolePolicy`, `LogPolicy`, `BackupPolicy`  
- **Requests:** `Admin/StoreUserRequest`, `Admin/UpdateUserRequest`, `Admin/StoreRoleRequest`, `Admin/UpdateRoleRequest`  
- **Jobs:** `RunBackupJob`, `RunHealthChecksJob`, `ClearCachesJob`

### Config & Ops
- `config/horizon.php` path `/system/horizon`, middleware `['web','auth','verified','role:Admin']`  
- Telescope: **dev-only**  
- Spatie Health: scheduled; allow manual run from Admin

### Components (DRY helpers)
`<x-admin.card/>`, `<x-admin.table/>`, `<x-admin.button/>`, `<x-admin.badge/>`, `<x-admin.alert/>`  
+ SweetAlert2 patterns: success, error, confirm, loading

---

## 2) Phase Plan (6.0 → 6.9)

Each phase has DoD, affected files, commands, and verification.

### ✅ 6.0 Baseline & Lockdown (Complete)
**Goals**
- `/system/admin` → `DashboardController@index`
- Gate developer templates under Admin
- Secure Horizon path & middleware

**DoD**
- `/system/admin` renders (no 500s)
- `/system/admin/templates/*` requires Admin (403 for non‑Admin)
- Horizon available only to Admin at `/system/horizon`

---

### ⏳ 6.1 Admin Dashboard (cards & quick links)
**Goals**
- Landing with cards: Users, Roles, Health, Backups, Queues/Horizon, Logs, Audit
- Each card shows small stat/indicator; links correctly

**DoD**
- Responsive, themed, zero console errors
- All links resolve to protected routes

---

### ✅ 6.2 Admin Scaffolding (A) & Health Wiring (B) — Complete
**6.2A (routes/views scaffolding)**
- Nested admin views in place (Users, Roles)
- Sidebar updated, routes aligned, legacy flat blades removed

**6.2B (Spatie Health)**
- `App\Providers\HealthServiceProvider` registers checks: Database, Cache, Redis, Queue, Schedule, Horizon
- `config/health.php` added (Eloquent history, notifications scaffold)
- View `admin/health/index.blade.php` renders status
- **Scheduler / Cron** wired (see Runbook below)

**DoD**
- `php artisan health:check` OK
- Scheduler heartbeats listed; cron present
- Health page loads; manual run works (via console now; UI trigger can follow)

---

### 🟢 6.6 Logs & Diagnostics (MVP delivered; polish later)
**Goals (MVP met)**
- Tail today’s log (last N lines)
- Download today’s log
- Purge (truncate) and Rotate (archive + truncate)
- Safe allow‑list; CSRF on POST

**Pending polish**
- Filters (level/date/user/module), file selector allow‑list UI
- Rate limit tail endpoint

**DoD (MVP)**
- Viewer loads without timeouts
- No arbitrary file access; storage perms hardened

---

### 6.3 Users (CRUD + role assignment)
**To‑Do**
- Index/search/sort, create/edit, activate/deactivate
- Role assignment (`syncRoles`)
- FormRequests + Policies + CSRF + SweetAlert confirms

**DoD**
- Non‑Admin gets 403 on Users routes
- Roles persist; activation toggles persist; tests green

---

### 6.4 Roles & Permissions (matrix editor)
**To‑Do**
- Role CRUD
- Permission matrix with `syncPermissions`
- Seed safe defaults; prevent lock‑out of Admin

**DoD**
- Matrix saves correctly
- `php artisan permission:show` reflects changes

---

### 6.5 Backups (Spatie Backup)
**To‑Do**
- List backups (disk/size/date), run, download, delete
- SweetAlert confirmation for destructive actions

**DoD**
- `backup:run` via UI; entries appear
- Download & delete work

---

### 6.7 Queues & Horizon
**To‑Do**
- Summary (processed/failed/throughput, workers)
- Link to Horizon; “Restart Horizon” (terminate)

**DoD**
- Summary renders; restart shows success
- Horizon path secured

---

### 6.8 Audit Logs (unified)
**To‑Do**
- Read‑only viewer with filters (model/type/date), expandable change details
- Pagination; empty state

**DoD**
- Filters work; no 500s

---

### 6.9 Developer Templates (DX area)
**To‑Do**
- Keep gallery; gate under Admin (or local‑only)
- Link from Admin dashboard; ensure theme & dark mode

**DoD**
- Only Admin (or local) can access examples
- Consistent styling with panel theme

---

## 3) What’s Done (detailed)

- **Routing & RBAC**
  - Admin routes consolidated under `/system/admin` with `auth|verified|role:Admin`
  - Developer templates gated
- **Health center**
  - Provider + config + view added
  - Scheduler updated to supported Spatie commands (`health:check`, `health:*heartbeat`); **removed** non‑existent `health:run`
  - Cron installed: `/etc/cron.d/manucore-scheduler`
- **Logs (MVP)**
  - `LogsController`: `index`, `tail`, `download`, `purge`, `rotate`
  - Safe allow‑list; CSRF; permission hardening
  - Fixed Lucide icon (`trash-2` instead of `trash2`)
- **Build & Caches**
  - Vite hashes present; caches warmed
- **Permissions**
  - `storage` and `bootstrap/cache` ownership to `www-data`; dirs 775 / files 664

---

## 4) Remaining Work (priority order)

1) 6.3 Users CRUD + Requests (scaffold, wire, test)  
2) 6.4 Roles + Permission matrix (with seeds and safeguards)  
3) 6.5 Backups UI (list/run/download/delete + confirms)  
4) 6.7 Queues/Horizon summary + restart  
5) 6.8 Audit Logs viewer (filters + expand)  
6) 6.6 Logs polish (filters, selector, throttle)  
7) 6.9 Templates polish (gate + theme)

---

## 5) Ops Runbook (Health, Backups, Horizon)

### Scheduler (in `bootstrap/app.php`)
```php
$schedule->command('horizon:snapshot')->everyFiveMinutes();
$schedule->command('queue:prune-batches --hours=48')->daily();
$schedule->command('queue:prune-failed --hours=240')->daily();

$schedule->command('backup:run')->dailyAt('02:00');
$schedule->command('backup:monitor')->dailyAt('08:00');

$schedule->command('model:prune')->daily();
if (class_exists(\Laravel\Telescope\Console\PruneCommand::class)) {
    $schedule->command('telescope:prune --hours=48')->daily();
}

// Spatie Health
$schedule->command('health:check')->everyMinute();
$schedule->command('health:queue-check-heartbeat')->everyMinute();
$schedule->command('health:schedule-check-heartbeat')->everyMinute();
```

### System cron
`/etc/cron.d/manucore-scheduler`
```
* * * * * www-data /usr/bin/php8.3 /var/www/manucore-erp/artisan schedule:run >> /dev/null 2>&1
```

### .env notes
```ini
APP_URL=https://rockruff.ibez.co.za
QUEUE_CONNECTION=redis
CACHE_DRIVER=redis
# Health notifications:
MAIL_FROM_ADDRESS=...
MAIL_FROM_NAME=...
HEALTH_SLACK_WEBHOOK_URL=
# Optional
PMA_URL=/phpmyadmin
```

---

## 6) Acceptance Tests (per phase)

- **6.0** Routes protected; Horizon locked
- **6.1** Dashboard loads; cards link correctly
- **6.2** Health page renders; heartbeats scheduled; `health:check` OK
- **6.5** Backups run/list/download/delete with confirms
- **6.6** Logs viewer safe & performant
- **6.7** Horizon summary OK; restart works
- **6.8** Audit filters + expand; pagination OK
- **6.9** Templates gated

---

## 7) Commands per phase (apply as we implement)
```bash
# Build & warm caches
npm run build
php artisan optimize:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache

# Permissions & seeding (6.3–6.4)
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder
php artisan permission:show

# Health & backup checks (6.4–6.5)
php artisan health:check
php artisan backup:run && php artisan backup:monitor

# Horizon (6.7)
php artisan horizon:status

# Logs
tail -n 200 storage/logs/laravel.log
```

### Git workflow (end of each sub‑phase)
```bash
git add .
git commit -m "[Admin 6.x] <summary: e.g., dashboard shell, gated templates>"
git push
```

---

## 8) Security & Safety Notes

- All Admin routes under `auth|verified|role:Admin`  
- CSRF on all POST actions (`@csrf`)  
- Logs endpoints restricted to allow‑listed files (no path traversal)  
- Storage & compiled views directories are writable by FPM user  
- Health commands use supported Spatie tasks; **no** `health:run`

---

## 9) Continue From Here (paste into a new chat if needed)
```text
We’re on ManuCore ERP Phase 6 — Admin System. Context: Laravel 12, Breeze/Blade, Tailwind+Vite, Spatie Permission, Spatie Health/Backup, Horizon, Telescope (dev). 
Completed: 6.0 baseline/lockdown, 6.2A scaffolding, 6.2B health wiring, Logs MVP.
Pick up at **6.3 Users CRUD + Requests**. Ask me for the current files you need and then provide copy‑paste‑ready controllers, requests, routes, and blades, wired to RBAC (role:Admin) with CSRF and SweetAlert confirms. Also include minimal feature tests.
```
