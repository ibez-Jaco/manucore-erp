Absolutely — here’s a complete, drop-in /docs/Project_Tracker.md you can paste into your repo. It’s written so any assistant (Claude, ChatGPT, etc.) will know exactly how to read, follow, and update it.

# ManuCore ERP — Project Status & Phase Tracker (Single Source of Truth)

> **Purpose**  
> This document is the authoritative index for the ManuCore ERP project.  
> It defines phases, DoD, architecture, theming, commands, and update rules for humans and AI assistants.  
> **If anything conflicts elsewhere, this file wins.**

**Last Updated:** 2025-08-29  
**Application:** ManuCore ERP (Laravel **12.26.2**)  
**Environment:** Development / Production-Ready  
**Domain:** https://rockruff.ibez.co.za  
**Server:** Ubuntu 24.04 LTS (`rockruff`)  
**Project Path:** `/var/www/manucore-erp`

---

## 🔐 Assistant Protocol (Read Me First)

**For any AI assistant (Claude, ChatGPT, etc.):**

1. **Always** read this file top-to-bottom at session start.
2. **Never advance a phase** until all DoD checklist items are ✅ and recorded here.
3. **When work is done**, update:
    - Status checkboxes
    - “Last Updated” date
    - Change Log (at the bottom)
    - Commit and push per the **Git Workflow** below
4. **Respect Tailwind v4** rules in this doc (no `tailwindcss init -p`, use `@tailwindcss/postcss`, `@source`, CSS `@plugin`).
5. **No secrets** in commits or examples (mask passwords, tokens).
6. **Route names, file paths, and namespaces** must match conventions declared below.

---

## 🎯 Current Status Snapshot

-   **Current Phase:** **Phase 1 — Auth, RBAC, Theming & Mail**
-   **Phase 0:** ✅ **COMPLETED (2025-08-29)**
-   **Next Action:** Install Laravel Breeze, wire email verification, scaffold RBAC (spatie/permission)

**Quick Context (copy to new chats):**

This is ManuCore ERP (Laravel 12) using a strict phase flow:
Phase 0 → 1 → 4 → 2 → 3 → 5

Architecture: 3 surfaces (Front/App/System) with separate routing, controllers, branding.
Theme: 5-theme system (blue, teal, purple, coral, slate) via data-theme + CSS vars.
Auth: Breeze + email verification + spatie/permission RBAC.
Frontend: Blade + Alpine + Tailwind v4 (Livewire only for Quotes in Phase 3).

---

## 🗂 Phase Index & DoD

### Phase 0 — Bootstrap (Foundation & Theming)

-   [x] **Status:** **COMPLETED (2025-08-29)**
-   [x] Multi-surface routing (Front/App/Settings/Admin)
-   [x] Three base layouts with separate CSS bundles
-   [x] Brand asset separation (logos/favicons per surface)
-   [x] ERP utility classes (`theme.css`)
-   [x] Surface navigation working
-   [x] **5-theme system** implemented (blue, teal, purple, coral, slate)
-   [x] Tailwind v4 wired via `@tailwindcss/postcss` (using `@source` + CSS `@plugin`)
-   [x] Enhanced styling/animations

**DoD Evidence (all met):**

-   [x] `/` shows Front branding + `front.css` + `theme.css`
-   [x] `/dashboard` shows App branding + `app.css` + `theme.css`
-   [x] `/system/settings` & `/system/admin` show System branding + `panel.css` + `theme.css`
-   [x] ERP utilities render consistently across all surfaces
-   [x] Vite assets build successfully; route list resolves; brand logos/favicons per surface

---

### Phase 1 — Auth, RBAC, Theming & Mail (**CURRENT**)

-   [ ] **Status:** Not Started
-   [ ] Laravel Breeze install + theming (Blade)
-   [ ] Email verification enforced
-   [ ] spatie/permission RBAC setup
-   [ ] Branded email templates
-   [ ] Mail logging system
-   [ ] Horizon queue setup (Supervisor already active)
-   [ ] Route protection with role gates

**DoD (must be true to complete):**

-   [ ] Registration → verification email → **verified-only** access
-   [ ] Password reset via branded email
-   [ ] Mail logs persist all attempts
-   [ ] Route protection enforces `auth` + `verified` + **role gates**
-   [ ] Auth pages match ERP theme (respect 5-theme system)
-   [ ] All tests/linters pass; docs & tag updated

---

### Phase 4 — System Panel (Business Settings + Admin)

-   [ ] **Status:** Not Started
-   [ ] Company & Branch management
-   [ ] Email branding configuration
-   [ ] Numbering schemes
-   [ ] User management (CRUD, roles, password reset)
-   [ ] Audit log viewer
-   [ ] Health checks dashboard
-   [ ] Backup management interface

**DoD:**

-   [ ] Business settings manageable **pre** Customers/Quotes
-   [ ] Users/roles/permissions controllable
-   [ ] Critical actions auditable
-   [ ] System health/backups/queues visible

---

### Phase 2 — Core Modules (Customers, Addresses, Documents)

-   [ ] **Status:** Not Started
-   [ ] Customer CRUD (Company/Individual)
-   [ ] Address management (Billing/Shipping)
-   [ ] Document upload/management
-   [ ] Customer audit logs

**DoD:**

-   [ ] End-to-end customer workflows
-   [ ] Secure document handling
-   [ ] Proper audit trails

---

### Phase 3 — Livewire for Quotes (Reactive CPQ)

-   [ ] **Status:** Not Started
-   [ ] Livewire quote builder
-   [ ] Reactive item calculations
-   [ ] Type switching guards
-   [ ] Print/Preview functionality

**DoD:**

-   [ ] Smooth reactive quoting UX
-   [ ] Accurate calculations
-   [ ] PDF generation ready

---

### Phase 5 — Operations, CI/CD, Hardening

-   [ ] **Status:** Not Started
-   [ ] Production deployment pipeline
-   [ ] Sentry error monitoring
-   [ ] Automated backups
-   [ ] Security hardening

**DoD:**

-   [ ] Green CI/CD pipeline
-   [ ] Error monitoring active
-   [ ] Backup/restore tested

---

## 🏗 Architecture & Conventions

### Surfaces & File Layout

┌─ Front (Public)
│ ├─ routes/front.php
│ ├─ App\Http\Controllers\Front*
│ ├─ resources/views/front/*
│ └─ public/brand/front/{logo.svg,favicon.svg}
│
├─ App (ERP - Authenticated)
│ ├─ routes/app.php
│ ├─ App\Http\Controllers\App*
│ ├─ resources/views/app/*
│ └─ public/brand/app/{logo.svg,favicon.svg}
│
└─ System (Settings + Admin)
├─ routes/settings.php
├─ routes/admin.php
├─ App\Http\Controllers\Settings*
├─ App\Http\Controllers\Admin*
├─ resources/views/{settings,admin}/\*
└─ public/brand/system/{logo.svg,favicon.svg}

### Namespaces & Route Names

-   Controllers: `App\Http\Controllers\{Front|App|Settings|Admin}\*`
-   Route naming: **direct** `Route::get(...)->name('...')` (avoid nested/grouped name collisions)
-   Canonical names:
    -   `home`, `about`, `contact`
    -   `dashboard`, `dashboard.analytics`
    -   `settings.index`, `settings.company`, `settings.branches`
    -   `admin.index`, `admin.users`, `admin.roles`

### CSS Bundles (via Vite)

-   `resources/css/theme.css` (shared ERP utilities)
-   `resources/css/front.css` (Front)
-   `resources/css/app.css` (App)
-   `resources/css/panel.css` (System)

---

## 🎨 Theme System (5 Themes)

**Switching Mechanism:**  
Use `data-theme="blue|teal|purple|coral|slate"` on `<html>` (or `<body>`).  
All components derive colors from CSS variables set by the theme.

**Core Variables**

```css
:root {
  --primary-1: #2171B5; /* default blue */
  --primary-2: #6BAED6;
  --primary-3: #BDD7E7;
  --primary-4: #EFF3FF;
  --primary-5: #F7FBFF;
  --success: #10b981; --warning: #f59e0b; --error: #ef4444; --info: #3b82f6;
  --gray-50:#f9fafb; --gray-900:#111827; /* ... (other grays allowed) */
}

/* Theme Variants */
[data-theme="blue"]   { --primary-1:#2171B5; --primary-2:#6BAED6; --primary-3:#BDD7E7; --primary-4:#EFF3FF; --primary-5:#F7FBFF; }
[data-theme="teal"]   { --primary-1:#245668; --primary-2:#0D8F81; --primary-3:#6EC574; --primary-4:#EDEF5D; --primary-5:#F5F7E8; }
[data-theme="purple"] { --primary-1:#68245F; --primary-2:#8F0D7D; --primary-3:#C56EBF; --primary-4:#FC9AF5; --primary-5:#FFF0FD; }
[data-theme="coral"]  { --primary-1:#D7301F; --primary-2:#FC8D59; --primary-3:#FDCC8A; --primary-4:#FEF0D9; --primary-5:#FFF9F0; }
[data-theme="slate"]  { --primary-1:#1e293b; --primary-2:#475569; --primary-3:#94a3b8; --primary-4:#e2e8f0; --primary-5:#f8fafc; }


ERP Utility Classes (live in theme.css)

Buttons: .erp-btn, .erp-btn-primary, .erp-btn-secondary, .erp-btn-danger, .erp-btn-success

Inputs/Forms: .erp-input, .erp-label, .erp-help-text

Layout: .erp-card, .erp-table, .erp-badge, .erp-header, .erp-gradient

States: .erp-loading, .erp-disabled, .erp-success

Surface accents: .front-hero, .app-sidebar, .panel-sidebar, etc.

JS Theme Persistence (Phase 1+:)

Store selection in localStorage or session; set data-theme on load

🧩 Tailwind v4 (Guardrails)

Do not run npx tailwindcss init -p (v3 pattern).

Use PostCSS plugin: @tailwindcss/postcss

In CSS entry files:

@import "tailwindcss";
@source "../views/**/*.blade.php";
@source "../js/**/*.js";
@plugin "@tailwindcss/forms";
@plugin "@tailwindcss/typography";


Vite drives compilation (no standalone Tailwind CLI needed).

⚙️ Environment & Packages

Core

Laravel 12.26.2, PHP 8.3.24 (FPM+OPCache), MySQL 8.0, Redis, Node 20 LTS
Domain: rockruff.ibez.co.za, SSL: Let’s Encrypt (exp 2025-11-24)


Installed

Alpine.js, SweetAlert2

Tailwind v4 + @tailwindcss/postcss

Pending (Phase 1+)

laravel/breeze

spatie/laravel-permission

laravel/horizon

laravel/telescope

spatie/laravel-medialibrary

spatie/laravel-backup

spatie/laravel-health

sentry/sentry-laravel

Database

Connection: MySQL
DB: manucore
User: manucore_user
Migrations: Base Laravel only
Seeders: None

📁 Confirmed File Snapshot (after Phase 0)

Routes

routes/
├─ web.php (includes below)
├─ front.php
├─ app.php
├─ settings.php
└─ admin.php


Controllers

app/Http/Controllers/
├─ Front/HomeController.php
├─ App/DashboardController.php
├─ Settings/CompanyController.php
└─ Admin/UsersController.php


Views

resources/views/
├─ layouts/{front,app,panel}.blade.php
├─ front/{home,about,contact}.blade.php
├─ app/{dashboard,analytics}.blade.php
├─ settings/{index,company,branches}.blade.php
├─ admin/{index,users,roles}.blade.php
└─ errors/404.blade.php


Assets

resources/css/{theme.css,front.css,app.css,panel.css}
public/brand/
├─ front/{logo.svg,favicon.svg}
├─ app/{logo.svg,favicon.svg}
└─ system/{logo.svg,favicon.svg}

🧪 Verification (Phase 0 sanity)

CLI

php artisan route:list
npm run build
ls -la public/build/assets/


HTTP

/, /about, /contact

/dashboard, /dashboard/analytics

/system/settings, /system/settings/company, /system/settings/branches

/system/admin, /system/admin/users, /system/admin/roles

🚀 Phase 1 Playbook (to execute next)

Goal: Auth + RBAC + Mail + Themed auth screens

1) Breeze + Mail

composer require laravel/breeze --dev
php artisan breeze:install blade
npm i && npm run build

# Configure .env mailer (SMTP) and branding
# Ensure verification routes enabled; enforce 'verified' middleware


2) RBAC (spatie/permission)

composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

# Seed roles: Admin, SettingsManager, Manager, Staff, Viewer
# Map route gates and policies accordingly


3) Horizon & Queues

composer require laravel/horizon
php artisan horizon:install
php artisan migrate
# Add Supervisor program for Horizon before enabling in production


4) Protect Routes

/dashboard, /system/*: auth, verified, role gates

Themed auth: match 5-theme system

Phase 1 DoD Recap

Verified-only access, branded reset email, persisted mail logs,

Gates enforced, auth UI on-brand, tests pass, tag + docs updated

🛠 Build, Cache & Service Commands

Assets

npm install
npm run build


Laravel

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache


Services

systemctl restart php8.3-fpm nginx
systemctl restart mysql redis-server supervisor


Logs

tail -f storage/logs/laravel.log
tail -f /var/log/nginx/rockruff.ibez.co.za_error.log

🔐 Security Practices

Never commit secrets; mask values in docs (********)

Nginx blocks .env, .git, sensitive locations

SSL/TLS via Let’s Encrypt; cert renew automated

UFW + Fail2Ban enabled; SSH root login disabled

🌳 Git Workflow & Tags

Standard commit for tracker updates

git add docs/Project_Tracker.md
git commit -m "docs(tracker): update status – Phase X progress + DoD changes"
git push origin <branch>


Phase completion tag

git tag -a "phase-<n>-complete" -m "Phase <n>: <summary>"
git push origin "phase-<n>-complete"

🧾 Glossary

Surface: A branded UI context (Front, App, System)

DoD: Definition of Done — objective acceptance checklist

RBAC: Role-Based Access Control

Horizon: Laravel queue dashboard & supervisor

Theme: Set of CSS vars keyed by data-theme

🗒️ Change Log

2025-08-29: Phase 0 COMPLETED; Tailwind v4 wiring finalized; tracker promoted as SoT

2025-08-27: Rebrand to ManuCore ERP

2025-08-26: Initial deployment live

✅ Assistant Update Checklist (when you make changes)

 Edit relevant checkboxes and dates in this file

 Keep phase ordering: 0 → 1 → 4 → 2 → 3 → 5

 Update “Last Updated” at the top

 Append a concise item to Change Log

 Commit + push per Git Workflow; add a tag on phase completion

```
