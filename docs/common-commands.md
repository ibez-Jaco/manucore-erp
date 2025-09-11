# ManuCore ERP - Common Laravel Commands Reference

## Table of Contents

-   [Cache & Optimization Commands](#cache--optimization-commands)
-   [Development Commands](#development-commands)
-   [Database Commands](#database-commands)
-   [Code Generation Commands](#code-generation-commands)
-   [Route Commands](#route-commands)
-   [Log Management](#log-management)
-   [Queue & Job Commands](#queue--job-commands)
-   [Asset & Frontend Commands](#asset--frontend-commands)
-   [Testing Commands](#testing-commands)
-   [Production Deployment](#production-deployment)
-   [Debugging & Inspection](#debugging--inspection)

---

## Cache & Optimization Commands

### Clear All Caches (Development)

```bash
php artisan optimize:clear
```

**When to use:** After making configuration changes, updating .env file, or when experiencing caching issues during development.

**What it clears:**

-   Configuration cache
-   Route cache
-   View cache
-   Application cache
-   Compiled services

### Individual Cache Clear Commands

```bash
php artisan config:clear    # Clear configuration cache
php artisan route:clear     # Clear route cache
php artisan view:clear      # Clear compiled view files
php artisan cache:clear     # Clear application cache
php artisan event:clear     # Clear cached events & listeners
```

**When to use:** When you need to clear specific caches without affecting others.

### Optimize for Production

```bash
php artisan optimize        # Cache everything for production
php artisan config:cache    # Cache configuration files
php artisan route:cache     # Cache routes for faster lookup
php artisan view:cache      # Precompile Blade templates
```

**When to use:** After deploying to production or when you want maximum performance.

---

## Development Commands

### Start Development Server

```bash
php artisan serve
php artisan serve --host=0.0.0.0 --port=8080  # Custom host/port
```

**When to use:** For local development when not using Valet, XAMPP, or Docker.

### Generate Application Key

```bash
php artisan key:generate
```

**When to use:** After cloning repository or when APP_KEY is missing from .env file.

### Environment Information

```bash
php artisan about           # Show application overview
php artisan env             # Show current environment
php artisan --version       # Show Laravel version
```

**When to use:** To verify application status and environment settings.

---

## Database Commands

### Migration Commands

```bash
php artisan migrate                    # Run pending migrations
php artisan migrate --force           # Run in production (bypasses confirmation)
php artisan migrate:rollback           # Rollback last migration batch
php artisan migrate:rollback --step=3  # Rollback specific number of batches
php artisan migrate:reset              # Rollback all migrations
php artisan migrate:refresh            # Rollback all + re-run all migrations
php artisan migrate:fresh              # Drop all tables + re-run migrations
php artisan migrate:status             # Show migration status
```

**When to use:** Managing database schema changes during development and deployment.

### Seeding Commands

```bash
php artisan db:seed                           # Run DatabaseSeeder
php artisan db:seed --class=RolePermissionSeeder  # Run specific seeder
php artisan migrate:fresh --seed             # Fresh migration + seed
```

**When to use:** Populating database with test data or initial application data.

### Database Inspection

```bash
php artisan db:show           # Show database information
php artisan db:table users    # Show table information
```

**When to use:** Inspecting database structure and table details.

---

## Code Generation Commands

### Model Commands

```bash
php artisan make:model Customer                    # Create model only
php artisan make:model Customer --migration        # Model + migration
php artisan make:model Customer --all             # Model + migration + factory + seeder + controller + policy + form requests
php artisan make:model Customer -mfsc             # Shorthand for model + migration + factory + seeder + controller
```

**When to use:** Creating new Eloquent models for database entities.

### Controller Commands

```bash
php artisan make:controller CustomerController              # Basic controller
php artisan make:controller CustomerController --resource   # RESTful resource controller
php artisan make:controller CustomerController --api        # API resource controller
php artisan make:controller App/CustomerController          # Controller in subfolder
```

**When to use:** Creating controllers for handling HTTP requests.

### Migration Commands

```bash
php artisan make:migration create_customers_table                    # Create table migration
php artisan make:migration add_phone_to_customers_table --table=customers  # Modify existing table
php artisan make:migration drop_customers_table --create=customers    # Drop and recreate
```

**When to use:** Creating database schema changes.

### Request & Validation

```bash
php artisan make:request StoreCustomerRequest     # Form request validation
php artisan make:rule PhoneNumberRule             # Custom validation rule
```

**When to use:** Creating form validation and custom validation rules.

### Other Generators

```bash
php artisan make:middleware CheckRole              # Middleware
php artisan make:provider CustomServiceProvider   # Service provider
php artisan make:command SendEmails               # Artisan command
php artisan make:job ProcessOrder                 # Queueable job
php artisan make:event OrderShipped               # Event
php artisan make:listener SendShipmentNotification # Event listener
php artisan make:mail OrderConfirmation           # Mailable class
php artisan make:notification InvoiceCreated      # Notification
php artisan make:policy CustomerPolicy            # Authorization policy
php artisan make:resource CustomerResource        # API resource
php artisan make:component AlertBanner            # Blade component
```

---

## Route Commands

### Route Information

```bash
php artisan route:list                    # Show all routes
php artisan route:list --method=GET       # Filter by HTTP method
php artisan route:list --name=customer    # Filter by route name
php artisan route:list --path=api         # Filter by path
```

**When to use:** Debugging routing issues or getting overview of application routes.

---

## Log Management

### View Logs

```bash
tail -f storage/logs/laravel.log          # Follow log file in real-time
tail -n 100 storage/logs/laravel.log      # Show last 100 lines
cat storage/logs/laravel.log | grep ERROR # Filter error messages
```

**When to use:** Debugging application issues and monitoring errors.

### Clear Logs

```bash
truncate -s 0 storage/logs/laravel.log     # Clear Laravel log file
rm storage/logs/laravel-*.log              # Remove all log files
find storage/logs -name "*.log" -delete   # Delete all .log files
```

**When to use:** When log files become too large or before deployment.

### Log Rotation

```bash
php artisan log:clear                      # Clear application logs (if custom command exists)
```

---

## Queue & Job Commands

### Queue Workers

```bash
php artisan queue:work                     # Start processing queue
php artisan queue:work --daemon            # Run as daemon
php artisan queue:work --timeout=60        # Set timeout
php artisan queue:listen                   # Listen for new jobs
php artisan queue:restart                  # Restart all queue workers
```

**When to use:** Processing background jobs and email sending.

### Horizon (Redis Queues)

```bash
php artisan horizon                        # Start Horizon dashboard
php artisan horizon:install               # Install Horizon
php artisan horizon:publish              # Publish config
php artisan horizon:pause                # Pause queue processing
php artisan horizon:continue             # Resume queue processing
```

### Queue Inspection

```bash
php artisan queue:failed                  # Show failed jobs
php artisan queue:retry all              # Retry all failed jobs
php artisan queue:flush                  # Delete all failed jobs
```

---

## Asset & Frontend Commands

### Laravel Mix/Vite

```bash
npm install                # Install Node.js dependencies
npm run dev               # Compile assets for development
npm run build            # Compile and minify for production
npm run watch            # Watch files and recompile
```

**When to use:** Managing frontend assets (CSS, JavaScript, images).

### Asset Publishing

```bash
php artisan vendor:publish                                    # Show publishable providers
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --tag=laravel-assets
```

**When to use:** Publishing package assets and configuration files.

---

## Testing Commands

### PHPUnit Testing

```bash
php artisan test                          # Run all tests
php artisan test --filter CustomerTest    # Run specific test
php artisan test --coverage              # Run with coverage report
```

### Database Testing

```bash
php artisan migrate:fresh --env=testing   # Fresh test database
php artisan db:seed --env=testing        # Seed test database
```

---

## Production Deployment

### Complete Deployment Sequence

```bash
# 1. Maintenance mode
php artisan down

# 2. Get latest code
git pull origin main

# 3. Install dependencies
composer install --no-dev --optimize-autoloader

# 4. Build assets
npm ci
npm run build

# 5. Update database
php artisan migrate --force

# 6. Optimize application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Restart queues
php artisan queue:restart

# 8. Exit maintenance mode
php artisan up
```

### File Permissions

```bash
sudo chown -R www-data:www-data storage/ bootstrap/cache/
chmod -R 775 storage/ bootstrap/cache/
```

---

## Debugging & Inspection

### Application Information

```bash
php artisan about                         # Application overview
php artisan env                          # Environment details
php artisan config:show app              # Show app configuration
php artisan config:show database         # Show database configuration
```

### Laravel Telescope (Development)

```bash
php artisan telescope:install            # Install Telescope
php artisan telescope:publish           # Publish assets
php artisan telescope:clear             # Clear Telescope data
```

### Tinker (Interactive Shell)

```bash
php artisan tinker                       # Start interactive shell
```

**Usage examples in Tinker:**

```php
User::count()                           // Count users
Customer::factory(10)->create()         // Create test customers
Cache::forget('key')                    // Clear specific cache key
```

---

## Package-Specific Commands

### Spatie Permission

```bash
php artisan permission:create-role Admin
php artisan permission:create-permission "edit posts"
php artisan permission:show            # Show all roles & permissions
```

### Laravel Backup

```bash
php artisan backup:run                 # Create backup
php artisan backup:list               # List backups
php artisan backup:clean              # Clean old backups
```

### Laravel Health

```bash
php artisan health:check              # Run health checks
php artisan health:list               # List available checks
```

---

## Quick Reference Commands

### Daily Development

```bash
php artisan optimize:clear && npm run build && php artisan optimize
```

### After Git Pull

```bash
composer install && npm install && npm run build && php artisan migrate
```

### Debugging Setup

```bash
php artisan route:list && php artisan config:show app.debug && tail storage/logs/laravel.log
```

### Performance Check

```bash
php artisan about && php artisan route:cache && php artisan config:cache
```

---

## When Things Go Wrong

### Common Issues & Solutions

**Route not found:** `php artisan route:clear && php artisan route:cache`

**Config not updating:** `php artisan config:clear`

**Views not updating:** `php artisan view:clear`

**Class not found:** `composer dump-autoload`

**Permission denied:** `sudo chown -R $USER:www-data storage && chmod -R 775 storage`

**Database connection failed:** `php artisan config:show database`

---

## Environment-Specific Notes

### Development

-   Use `php artisan optimize:clear` frequently
-   Keep `APP_DEBUG=true` in .env
-   Use `php artisan serve` for quick testing

### Production

-   Always use `php artisan optimize`
-   Set `APP_DEBUG=false`
-   Use proper web server (Nginx/Apache)
-   Monitor logs regularly

### ManuCore ERP Specific

-   Remember to restart Horizon after deployment
-   Clear permission caches when updating roles
-   Rebuild frontend assets after theme changes

Save this as `docs/common-commands.md` in your ManuCore ERP project for easy reference.
Here's the complete command sequence to run after making changes (like replacing forms, creating new views, or updating code):

## **After Making Changes - Complete Command Set**

### **Development Environment**

```bash
# Clear all caches and rebuild
php artisan optimize:clear
npm run build
php artisan optimize

# If you added new routes or changed config
php artisan route:clear
php artisan config:clear

# Quick verification
php artisan route:list | grep -i form  # Check your new routes exist
```

### **If You Modified Migrations/Database**

```bash
# Add database commands
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder  # If needed
```

### **Production Environment**

```bash
# Complete production sequence
php artisan optimize:clear
composer dump-autoload --optimize
npm run build
php artisan migrate --force
php artisan optimize
sudo systemctl reload nginx
php artisan queue:restart  # If using queues/Horizon
```

### **One-Liner for Quick Development**

```bash
php artisan optimize:clear && npm run build && php artisan optimize && echo "✅ Ready!"
```

## **When to Use Each**

**After changing views/forms:** One-liner above

**After adding routes:** Add `php artisan route:clear`

**After changing .env:** Add `php artisan config:clear`

**After updating packages:** Add `composer dump-autoload`

**Production deployment:** Use the full production sequence

**Quick check:** `php artisan about` to verify everything is working

The one-liner covers 90% of development changes and is what you'll run most often.
