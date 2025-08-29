# ManuCore ERP — Status Board

**Last Updated:** August 29, 2025  
**Live:** https://rockruff.ibez.co.za  
**Repo:** `main` / `develop`  
**CI:** ![CI](https://github.com/<ORG>/<REPO>/workflows/ci/badge.svg)

> **Source of Truth:** `/docs/Project_Tracker.md` (phase DoD gates).  
> This page is the quick **operational status** and **to-do rollup**.

---

## 🔎 Current Snapshot

-   **Laravel:** 12.26.2 • **PHP:** 8.3 • **Node:** 20 LTS • **DB:** MySQL 8 • **Cache/Queue:** Redis
-   **Server:** Ubuntu 24.04 LTS (`rockruff`) • **Domain:** `rockruff.ibez.co.za` • **SSL:** Let’s Encrypt (exp. Nov 24, 2025)

### Services

| Service        | Status                                   |
| -------------- | ---------------------------------------- |
| Nginx          | ✅ active                                |
| PHP-FPM 8.3    | ✅ active                                |
| MySQL 8        | ✅ active                                |
| Redis          | ✅ active                                |
| Supervisor     | ⚠️ Not configured for queues (Phase 1/5) |
| Fail2Ban / UFW | ✅ active                                |

### Packages (App)

| Package                           | Status                     |
| --------------------------------- | -------------------------- |
| `laravel/breeze`                  | ⏳ Not installed (Phase 1) |
| `spatie/laravel-permission` v6    | ⏳ Not installed (Phase 1) |
| `spatie/laravel-medialibrary` v11 | ⏳ Phase 2                 |
| `spatie/laravel-backup` v9        | ⏳ Phase 4/5               |
| `laravel/horizon`                 | ⏳ Phase 1/5               |
| `laravel/telescope`               | ⏳ Optional Dev            |
| `spatie/laravel-health`           | ⏳ Phase 4/5               |
| `sentry/sentry-laravel`           | ⏳ Phase 5                 |
| `alpinejs`                        | ✅ Installed               |
| `sweetalert2`                     | ✅ Installed               |

---

## 🚦 Phase Rollup (DoD view)

> Phase flow: **0 → 1 → 4 → 2 → 3 → 5**. Advance only when all DoD items pass.

### ✅ Phase 0 — Bootstrap (Foundation & Theming) — **COMPLETED (Aug 29, 2025)**

-   Multi-surface routing: Front/App/Settings/Admin
-   Three base layouts + separate CSS bundles
-   Brand asset separation (logos/favicons per surface)
-   ERP utility classes (`theme.css`)
-   Surface navigation working
-   5-theme system (blue/teal/purple/coral/slate)  
    **DoD results:**  
    `/` → Front branding + `front.css` + `theme.css` ✅  
    `/dashboard` → App branding + `app.css` + `theme.css` ✅  
    `/system/settings`, `/system/admin` → System branding + `panel.css` + `theme.css` ✅  
    ERP utilities render consistently ✅

---

### ⏳ Phase 1 — Auth, RBAC, Theming & Mail (INCOMING)

**To-Do:**

-   [ ] Install/theme **Laravel Breeze** (email verification enforced)
-   [ ] **spatie/permission** roles/permissions (Admin, SettingsManager, Manager, Staff, Viewer)
-   [ ] Branded mail templates (verify, reset)
-   [ ] Mail logging (DB)
-   [ ] Horizon queues (+ Supervisor program)
-   [ ] Route protection: `auth`, `verified`, role gates  
        **DoD:**
-   [ ] Registration → verification → verified access only
-   [ ] Password reset via branded email
-   [ ] Mail logs persist all attempts
-   [ ] Route protection enforces auth + verification + roles
-   [ ] Auth pages match ERP theme

---

### ⏳ Phase 4 — System Panel (Business Settings + Admin)

**To-Do:**

-   [ ] Company & Branch management
-   [ ] Email branding configuration
-   [ ] Numbering schemes (global/series)
-   [ ] User management CRUD + role assignment + password reset
-   [ ] Audit log viewer
-   [ ] Health checks dashboard
-   [ ] Backup management UI  
        **DoD:**
-   [ ] Settings usable before Customers/Quotes
-   [ ] Users/Roles/Permissions controllable
-   [ ] Critical actions auditable
-   [ ] System health/backups/queues visible

---

### ⏳ Phase 2 — Core Modules (Customers, Addresses, Documents)

**To-Do:**

-   [ ] Customer CRUD (Company/Individual)
-   [ ] Address mgmt (Billing/Shipping)
-   [ ] Document upload/management (Media Library)
-   [ ] Customer audit logs  
        **DoD:**
-   [ ] End-to-end customer workflows
-   [ ] Secure document handling
-   [ ] Proper audit trails

---

### ⏳ Phase 3 — Quotes (Livewire, Reactive CPQ)

**To-Do:**

-   [ ] Livewire quote builder
-   [ ] Reactive item calculations (guards for type switching)
-   [ ] Print/Preview/PDF  
        **DoD:**
-   [ ] Smooth reactive quoting
-   [ ] Accurate calculations
-   [ ] PDF generation ready

---

### ⏳ Phase 5 — Ops, CI/CD, Hardening

**To-Do:**

-   [ ] Production deploy pipeline (GitHub Actions → server/Forge)
-   [ ] Sentry error monitoring
-   [ ] Automated backups (Spatie)
-   [ ] Security hardening (headers, rate limits, secrets mgmt)  
        **DoD:**
-   [ ] Green CI/CD pipeline
-   [ ] Error monitoring active
-   [ ] Backup/restore tested

---

## 🧭 Workstreams & Owners

| Workstream        | Lead | Notes                                          |
| ----------------- | ---- | ---------------------------------------------- |
| Auth & RBAC       | —    | Breeze + spatie/permission wiring              |
| Mail & Templates  | —    | Branding + mail logging                        |
| System Panel      | —    | Company/Branches, audit, health, backups       |
| Core Data         | —    | Customers, addresses, documents                |
| Quotes (Livewire) | —    | Reactive CPQ + PDFs                            |
| Ops & CI/CD       | —    | Horizon, Supervisor, Sentry, backups, pipeline |

> Assign leads and add GitHub handles here.

---

## 📌 Immediate Next Actions (next 3–5 days)

-   [ ] Add **Breeze** + themed auth views; flip on **email verification**
-   [ ] Install **spatie/permission** and seed base roles
-   [ ] Protect App/System routes with `auth`+`verified`+roles
-   [ ] Add **Horizon** and Supervisor program (prod)
-   [ ] Wire `resources/views/emails/*` with ERP branding and test mail

---

## ⚠️ Risks & Mitigations

| Risk                  | Impact                 | Mitigation                                        |
| --------------------- | ---------------------- | ------------------------------------------------- |
| Queues not supervised | Delayed emails/jobs    | Add Horizon + Supervisor in Phase 1               |
| Missing RBAC gates    | Access leakage         | Gate all non-public routes after Phase 1          |
| No backups yet        | Data loss              | Add Spatie Backup + S3/local rotation (Phase 4/5) |
| No error monitoring   | Slow incident response | Add Sentry (Phase 5)                              |

---

## 🔬 Quick Verification

```bash
# App health
php artisan --version
php artisan route:list
php artisan config:show app

# Surfaces
curl -I https://rockruff.ibez.co.za/
curl -I https://rockruff.ibez.co.za/dashboard
curl -I https://rockruff.ibez.co.za/system/settings
curl -I https://rockruff.ibez.co.za/system/admin

# Build
npm run build && ls -la public/build/
```
