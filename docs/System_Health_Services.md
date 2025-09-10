ManuCore ERP – System Health & Services Overview

This page documents the current health, runtime configuration, and core services of the ManuCore ERP deployment (rockruff.ibez.co.za).

1. Environment & Versions

PHP: 8.3.24 (cli)

Composer: 2.8.11

Node: v20.19.4

NPM: 10.8.2

MySQL: 8.0.43 (Ubuntu 24.04 build)

Redis: 7.0.15

Laravel Framework: 12.26.3

✔ All platform requirements confirmed:
ext-mbstring, ext-zip, ext-pcntl, ext-exif, etc.

2. System Services

All systemd-managed services are active and running:

✔ nginx

✔ php8.3-fpm

✔ mysql

✔ redis-server

✔ supervisor

Recent reload/restart logs confirm stability.

3. Laravel Runtime Snapshot

Application: ManuCore ERP

Environment: production

Debug Mode: OFF

URL: rockruff.ibez.co.za

Timezone: UTC

Locale: en

Drivers:

Cache → redis

Queue → redis

Session → redis

Logs → stack/single

Mail → log

Routes: 150 total
Migrations: Fully ran (users, cache, jobs, permissions, media, companies, branches).

4. Horizon (Queue Manager)

✔ Package: laravel/horizon

✔ Supervisor config present

✔ Horizon process running

✔ Horizon dashboard available

Cron task: horizon:snapshot runs every 5 minutes.

5. Backups

✔ Package: spatie/laravel-backup

Disk: local

Status: Healthy

Latest backup: ~1 hour ago

Used storage: 13.24 MB

Backups monitored daily via cron (backup:monitor).

6. Health Checks (spatie/laravel-health)

✔ Package present and configured.

Checks confirmed:

Database → Ok

Cache → Ok

Redis → Ok

Queue → Ok

Schedule → Ok

Horizon → Ok (Running)

Heartbeat cron jobs (health:queue-check-heartbeat, health:schedule-check-heartbeat) run every minute.

7. Telescope (Debug/Observability)

✔ Package: laravel/telescope

Enabled: true

Path: /telescope

Driver: database

Watchers: Cache, Batch, etc. active

✔ Telescope routes registered

8. Scheduler (Cron)

Active scheduled tasks:

horizon:snapshot → every 5 min

queue:prune-batches → daily

queue:prune-failed → daily

backup:run → daily @ 2AM

backup:monitor → daily @ 8AM

model:prune → daily

telescope:prune → daily

health:queue-check-heartbeat → every minute

health:schedule-check-heartbeat → every minute

9. Storage & Logs

✔ Storage symlink present (public/storage)

✔ storage/app exists

✔ storage/logs writable

Logs are regularly flushed (laravel.log).

10. Nginx

✔ Config test: OK

✔ Recent reloads successful

Active vhost: rockruff.ibez.co.za

11. Observations

⚡ All systems operational

✅ Horizon queue, Telescope, Backups, Health are live

🟢 Scheduler is populated and running

🚫 Sentry has been fully removed (no lingering refs)

12. Commands Reference

Rebuild caches:

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

Health check:

php artisan health:check

Restart services:

sudo supervisorctl restart horizon:
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx

✅ All core services verified and stable.
This doc reflects the system state as of 2025-09-09.

Do you want me to also generate a diagram/visual architecture (services + flows) in the docs to go along with this? That could show Laravel ↔ Redis ↔ Horizon ↔ Supervisor and backups/health checks visually.
