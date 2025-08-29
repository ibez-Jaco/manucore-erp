# ManuCore ERP — Developer & Operations Manual

> **Scope:** End-to-end guide for development, operations, theming, deployment, runbooks, QA, and security.  
> **Source of Truth:** See `/docs/Project_Tracker.md` for phase status, DoD, and assistant protocol. If anything conflicts, **Project_Tracker.md wins**.

**Last Updated:** 2025-08-29  
**App:** ManuCore ERP (Laravel **12.26.2**)  
**Domain:** https://rockruff.ibez.co.za  
**Server:** Ubuntu 24.04 LTS (`rockruff`)  
**Project Path:** `/var/www/manucore-erp`

---

## 0) How to Use this Manual

-   Start every session by scanning **Project_Tracker.md** (phase + DoD).
-   Use this manual to:
    -   set up local/dev/prod,
    -   follow architecture and code conventions,
    -   run theme system correctly (Tailwind **v4**),
    -   execute runbooks (deploy, backup, restore, debug),
    -   keep security and QA standards tight.

---

## 1) Quick Start

### 1.1 Local Development (Linux/macOS/WSL)

**Prereqs**

-   PHP 8.3, Composer
-   Node.js 20 LTS, npm
-   MySQL 8, Redis
-   OpenSSL, Git

**Setup**

```bash
git clone <your-repo-url> manucore-erp
cd manucore-erp

cp .env.example .env   # Fill values (see §5)
composer install
php artisan key:generate

npm install
npm run build          # or: npm run dev (watch)
php artisan migrate    # when DB ready

php artisan serve      # http://127.0.0.1:8000
Tailwind v4: Do not run tailwindcss init -p. We use the PostCSS plugin (see §6).

1.2 Production (Reference)
Nginx + PHP-FPM 8.3 (OPCache)

MySQL 8, Redis

Supervisor (queues)

UFW + Fail2Ban

Let’s Encrypt SSL

Core actions:

bash
Copy code
# Build and cache
npm ci && npm run build
php artisan optimize:clear
php artisan config:cache && php artisan route:cache && php artisan view:cache

# Restart services
sudo systemctl restart php8.3-fpm nginx
2) Architecture
2.1 Surfaces (Multi-Surface UI)
bash
Copy code
Front (Public)
└─ routes/front.php
└─ App\Http\Controllers\Front\*
└─ resources/views/front/*
└─ public/brand/front/{logo.svg,favicon.svg}

App (ERP – Authenticated)
└─ routes/app.php
└─ App\Http\Controllers\App\*
└─ resources/views/app/*
└─ public/brand/app/{logo.svg,favicon.svg}

System (Settings + Admin)
└─ routes/settings.php
└─ routes/admin.php
└─ App\Http\Controllers\Settings\*
└─ App\Http\Controllers\Admin\*
└─ resources/views/{settings,admin}/*
└─ public/brand/system/{logo.svg,favicon.svg}
Route names (canonical):

home, about, contact

dashboard, dashboard.analytics

settings.index, settings.company, settings.branches

admin.index, admin.users, admin.roles

Keep route naming direct (avoid nested prefixes that collide).

2.2 Bundles & Layouts
resources/css/theme.css — shared ERP utilities + theme vars

resources/css/front.css — Front

resources/css/app.css — App

resources/css/panel.css — System

Blade layouts:

bash
Copy code
resources/views/layouts/{front,app,panel}.blade.php
3) Phase Flow & Responsibilities
Order: 0 → 1 → 4 → 2 → 3 → 5

Phase 0 (Bootstrap): multi-surface, layouts, theme system, utilities — ✅ complete

Phase 1 (Auth/RBAC/Mail) [CURRENT]: Breeze, verification, roles/permissions, mail branding/logging, Horizon

Phase 4 (System Panel): business settings + admin ops

Phase 2 (Core): customers, addresses, documents

Phase 3 (Quotes/Livewire): reactive CPQ

Phase 5 (Ops/CI/CD/Security): pipelines, Sentry, backups, hardening

Accept/advance a phase only when all DoD items in Project_Tracker.md are checked.

4) Coding Standards
4.1 PHP/Laravel
Controllers thin; push business logic to Services/Actions.

Requests validate input (FormRequest).

Policies + Gates for authorization; use spatie/permission roles/permissions.

Eloquent: prefer explicit casts, factories, observers for audit hooks.

4.2 Blade
Each surface uses its own base layout; slot sections: title, header, content.

Use components for repeated patterns (cards, tables, badges).

Never inline secrets or instance-specific URLs.

4.3 JS
Alpine.js for light interactivity in Phases 0–2.

Livewire only for Quotes (Phase 3).

Store theme in localStorage (later: user profile).

4.4 Commit & PR
Conventional commits (at minimum for docs):
feat:, fix:, chore:, docs:, refactor:, test:, build:, ci:

Keep PRs small, linked to the phase task.

5) Environment & Configuration
5.1 .env Template (mask secrets when committing docs)
env
Copy code
APP_NAME="ManuCore ERP"
APP_ENV=local
APP_KEY=base64:********
APP_DEBUG=true
APP_URL=https://rockruff.ibez.co.za
TIMEZONE=Africa/Johannesburg

LOG_CHANNEL=stack
LOG_LEVEL=info

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manucore
DB_USERNAME=manucore_user
DB_PASSWORD=********

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=********
MAIL_PORT=587
MAIL_USERNAME=********
MAIL_PASSWORD=********
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@manucore.co.za
MAIL_FROM_NAME="${APP_NAME}"
5.2 Service Versions (prod)
PHP 8.3.24 (FPM + OPCache)

Nginx 1.24.x

MySQL 8.0

Redis Server

Node.js 20 LTS / npm 10.x

6) Frontend Build (Tailwind v4)
Install (already done in project):

bash
Copy code
npm install -D tailwindcss @tailwindcss/postcss postcss autoprefixer
npm install -D @tailwindcss/forms @tailwindcss/typography
npm install alpinejs sweetalert2
postcss.config.js

js
Copy code
export default {
  plugins: {
    '@tailwindcss/postcss': {},
  },
};
In each CSS entry (e.g., resources/css/theme.css)

css
Copy code
@import "tailwindcss";
@source "../views/**/*.blade.php";
@source "../js/**/*.js";
@plugin "@tailwindcss/forms";
@plugin "@tailwindcss/typography";

/* Your variables + components (see §7) */
Vite (vite.config.js)

js
Copy code
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/front.css',
        'resources/css/app.css',
        'resources/css/panel.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
});
Blade layout include

blade
Copy code
@vite(['resources/css/app.css','resources/js/app.js'])
Build

bash
Copy code
npm run build   # or: npm run dev
Do not run npx tailwindcss init -p in v4.

7) Theme System (5 Themes)
Switch via data-theme attribute on <html>: blue | teal | purple | coral | slate.

Variables (example excerpt)
(full set lives in resources/css/theme.css)

css
Copy code
:root {
  --primary-1:#2171B5; --primary-2:#6BAED6; --primary-3:#BDD7E7; --primary-4:#EFF3FF; --primary-5:#F7FBFF;
  --success:#10b981; --warning:#f59e0b; --error:#ef4444; --info:#3b82f6;
  --gray-50:#f9fafb; --gray-100:#f3f4f6; --gray-900:#111827;
}

[data-theme="blue"]   { --primary-1:#2171B5; --primary-2:#6BAED6; --primary-3:#BDD7E7; --primary-4:#EFF3FF; --primary-5:#F7FBFF; }
[data-theme="teal"]   { --primary-1:#245668; --primary-2:#0D8F81; --primary-3:#6EC574; --primary-4:#EDEF5D; --primary-5:#F5F7E8; }
[data-theme="purple"] { --primary-1:#68245F; --primary-2:#8F0D7D; --primary-3:#C56EBF; --primary-4:#FC9AF5; --primary-5:#FFF0FD; }
[data-theme="coral"]  { --primary-1:#D7301F; --primary-2:#FC8D59; --primary-3:#FDCC8A; --primary-4:#FEF0D9; --primary-5:#FFF9F0; }
[data-theme="slate"]  { --primary-1:#1e293b; --primary-2:#475569; --primary-3:#94a3b8; --primary-4:#e2e8f0; --primary-5:#f8fafc; }
ERP Utilities (class sketch)

Buttons: .erp-btn, .erp-btn-primary, .erp-btn-secondary, .erp-btn-danger, .erp-btn-success

Forms: .erp-input, .erp-label, .erp-help-text

Layout/UI: .erp-card, .erp-table, .erp-badge, .erp-header, .erp-gradient

Surfaces: .front-hero, .app-sidebar, .panel-sidebar, etc.

8) Auth & RBAC (Phase 1 Blueprint)
8.1 Breeze (Blade)
bash
Copy code
composer require laravel/breeze --dev
php artisan breeze:install blade
npm i && npm run build
Enforce verified middleware.

Theme auth templates with ERP utilities + data-theme.

8.2 Roles & Permissions
bash
Copy code
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
Roles: Admin, SettingsManager, Manager, Staff, Viewer
Examples: customers.view|create|update|delete, settings.company.update, admin.users.manage

8.3 Mail & Logging
Branded templates (logo, colors).

Log mail attempts (DB table or file + Telescope later).

8.4 Horizon (Queues)
bash
Copy code
composer require laravel/horizon
php artisan horizon:install
php artisan migrate
Add Supervisor program (see §12.3).

9) Data & Migrations (Planning)
Phase 2 will introduce:

customers (company/individual polymorphic or unified with type)

addresses (billing, shipping, soft deletes)

documents (use spatie/laravel-medialibrary)

audits (DB table or laravel-auditing/custom observers)

Use factories + seeders for demo content.

Strict foreign keys; onDelete('restrict') where appropriate.

10) Testing & QA
Pest preferred (or PHPUnit).

Feature tests for auth, gated routes, email verification.

Browser smoke: /, /dashboard, /system/* render OK, bundles present.

Performance baselines: response time of main surfaces < 300ms on prod (warm cache).

Accessibility: headings, labels, color contrast for each theme.

Run:

bash
Copy code
php artisan test
11) Observability & Errors
Horizon: queues dashboard (Phase 1).

Telescope: local/dev only (Phase 1/4), guard behind gate.

Sentry: production error monitoring (Phase 5).

12) Operations Runbooks
12.1 Deploy (manual)
bash
Copy code
git pull
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache && php artisan route:cache && php artisan view:cache
sudo systemctl restart php8.3-fpm nginx
12.2 Backup & Restore
Nightly DB + storage backups to /var/backups/erp/

Script: /usr/local/bin/backup_erp.sh

Restore (example):

bash
Copy code
mysql -u manucore_user -p manucore < /var/backups/erp/db/latest.sql
rsync -a /var/backups/erp/storage/ /var/www/manucore-erp/storage/app/
php artisan storage:link
12.3 Queues (Supervisor)
Example program:

swift
Copy code
/etc/supervisor/conf.d/laravel-worker.conf
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/manucore-erp/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/manucore-erp/storage/logs/worker.log
bash
Copy code
sudo supervisorctl reread && sudo supervisorctl update && sudo supervisorctl restart all
13) Security
Never commit secrets. Use .env, vaults, or CI secrets.

Nginx denies access to .env, .git, /storage, etc.

UFW + Fail2Ban enabled; SSH root login disabled.

Regularly update packages; enable unattended upgrades.

14) Performance
PHP (php.ini highlights)

ini
Copy code
memory_limit = 512M
post_max_size = 50M
upload_max_filesize = 50M
max_execution_time = 300
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.revalidate_freq=60
FPM pool

ini
Copy code
pm=static
pm.max_children=20
pm.max_requests=1000
Nginx

Gzip on, long-cache static, sensible buffers

Security headers (X-Frame-Options, X-Content-Type-Options, Referrer-Policy, etc.)

15) CI/CD (Phase 5 Draft)
GitHub Actions:

install PHP deps, JS deps

build assets

run tests/linters

artifact or deploy via SSH/rsync

Environments: staging → production

Block deploy if tests fail.

16) Troubleshooting FAQ
Q: npx tailwindcss init -p fails
A: Tailwind v4 removed that flow. Use @tailwindcss/postcss and CSS @source + @plugin (see §6).

Q: Styles not updating
A: npm run build, then php artisan optimize:clear.

Q: Route not found
A: php artisan route:list and verify route file inclusion in routes/web.php.

Q: 500 after deploy
A: Check /storage/logs/laravel.log, clear caches, verify PHP-FPM restart.

Q: Permission errors
A:

bash
Copy code
sudo chown -R <user>:www-data /var/www/manucore-erp
sudo chmod -R 775 storage bootstrap/cache
17) Git, Tags & Releases
Docs/Tracker update

bash
Copy code
git add docs/Project_Tracker.md docs/Manual.md
git commit -m "docs: update manual + tracker (Phase N progress)"
git push
Phase completion

bash
Copy code
git tag -a "phase-<n>-complete" -m "Phase <n> complete"
git push --tags
18) Checklists
Pre-merge

 Tests pass

 Phase DoD unaffected or updated

 Docs updated if behavior changes

Pre-release

 Built assets present

 Migrations reviewed

 Rollback plan noted

Post-release

 Error logs clean

 Horizon healthy

 Basic smoke tests pass

19) Links
/docs/Project_Tracker.md — status, DoD, assistant protocol (must read first)

Nginx config: /etc/nginx/sites-available/rockruff.ibez.co.za

Logs:

Laravel: storage/logs/laravel.log

Nginx: /var/log/nginx/rockruff.ibez.co.za_error.log

20) Glossary
Surface: Branded UI partition (Front/App/System)

DoD: Definition of Done (objective criteria)

RBAC: Role-based access control

SoT: Source of Truth

Horizon: Queue management dashboard

End of file.
EOF

git add docs/Manual.md
git commit -m "docs(manual): add comprehensive Developer & Ops Manual"
git push
```
