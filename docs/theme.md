# ManuCore ERP - Theme & Design System Documentation

## Overview

ManuCore ERP features a sophisticated theme system with 4 professional accent colors, automatic dark mode with neon variants, and comprehensive JavaScript functionality. The system separates **accent colors** (brand hue) from **light/dark mode** (user preference) for maximum flexibility.

## Architecture Summary

**Core Components:**

-   **theme.css** - Base theme with 4 accent palettes (Blue, Green, Purple, Orange)
-   **dark-mode.css** - Dark mode overrides with automatic neon variants
-   **panel.css** - Dashboard layouts, sidebar, widgets, data tables
-   **manucore.js** - Complete interactive system with accent management

**System Structure:**

```
Theme System = Accent Color + Light/Dark Mode + Custom Support
├── Accent (Company-level): blue | green | purple | orange | custom
├── Mode (User-level): light | dark (stored in localStorage)
└── Neon Effect: Automatically applied in dark mode
```

## Color System

### Professional Accent Palettes

**Blue (Default)**

```css
--brand-500: #3b82f6; /* Base */
--brand-600: #2563eb; /* Strong */
--brand-700: #1d4ed8; /* Darker */
```

**Green**

```css
--brand-500: #22c55e; /* Base */
--brand-600: #16a34a; /* Strong */
--brand-700: #15803d; /* Darker */
```

**Purple**

```css
--brand-500: #8b5cf6; /* Base */
--brand-600: #7c3aed; /* Strong */
--brand-700: #6d28d9; /* Darker */
```

**Orange**

```css
--brand-500: #f97316; /* Base */
--brand-600: #ea580c; /* Strong */
--brand-700: #c2410c; /* Darker */
```

### Dark Mode Neon Variants

When `data-theme="dark"` is active, colors automatically shift to neon variants:

-   **Blue → Neon Blue**: `#0096ff`
-   **Green → Neon Green**: `#00d47f`
-   **Purple → Neon Purple**: `#9a00ff`
-   **Orange → Neon Orange**: `#e05700`

## CSS Architecture

### File Structure

```
resources/css/
├── theme.css      # Base theme + 4 accent palettes
├── dark-mode.css  # Dark mode + neon variants
├── panel.css      # Dashboard layouts
└── app.css        # Laravel app surface (if needed)
```

### Key CSS Selectors

**Accent Selection:**

```css
html[data-accent="blue"] {
    --brand-600: #2563eb;
}
html[data-accent="green"] {
    --brand-600: #16a34a;
}
html[data-accent="purple"] {
    --brand-600: #7c3aed;
}
html[data-accent="orange"] {
    --brand-600: #ea580c;
}
```

**Dark Mode + Neon:**

```css
[data-theme="dark"][data-accent="blue"] {
    --brand-600: #0096ff;
}
[data-theme="dark"][data-accent="green"] {
    --brand-600: #00d47f;
}
[data-theme="dark"][data-accent="purple"] {
    --brand-600: #9a00ff;
}
[data-theme="dark"][data-accent="orange"] {
    --brand-600: #e05700;
}
```

## JavaScript System

### Core ManuCore Object

```javascript
window.ManuCore = {
    config: {
        theme: "light|dark",           // User preference
        accent: "blue|green|purple|orange", // Company/user choice
        sidebarCollapsed: boolean,     // Layout state
    },

    // Theme Management
    setTheme(theme),                   // Set light/dark mode
    toggleTheme(),                     // Toggle light/dark
    setAccent(accent),                 // Change accent color
    getCurrentAccent(),                // Get current accent

    // UI Components
    showToast(message, type),          // Show notification
    openModal(modalId),                // Open modal dialog
    handleDelete(url, itemName),       // Delete with confirmation

    // Debug Tools
    debug.accent.testAll(),            // Cycle through accents
    debug.current(),                   // Show current state
}
```

### Usage Examples

**Change Theme:**

```javascript
ManuCore.setAccent("green"); // Change to green
ManuCore.toggleTheme(); // Toggle dark/light
ManuCore.setTheme("dark"); // Force dark mode
```

**Show Notifications:**

```javascript
ManuCore.showToast("Success!", "success");
ManuCore.showToast("Error occurred", "error");
```

**Debug & Testing:**

```javascript
ManuCore.debug.current(); // Current state
ManuCore.debug.accent.testAll(); // Test all accents
```

## HTML Integration

### Layout Requirements

**Panel Layout (Required Attributes):**

```html
<html data-theme="light" data-accent="blue"></html>
```

**Accent Picker Buttons:**

```html
<button data-accent-choice="blue">Blue</button>
<button data-accent-choice="green">Green</button>
<button data-accent-choice="purple">Purple</button>
<button data-accent-choice="orange">Orange</button>
```

**Dark Mode Toggle:**

```html
<button class="dark-mode-toggle">
    <div class="dark-mode-toggle-slider">
        <span class="dark-mode-toggle-icon sun-icon">☀️</span>
        <span class="dark-mode-toggle-icon moon-icon">🌙</span>
    </div>
</button>
```

## Backend Integration

### Middleware (ApplyTheme.php)

Maps Company theme to accent and handles custom colors:

```php
$accentMap = [
    'blue'   => 'blue',
    'green'  => 'green',
    'purple' => 'purple',
    'orange' => 'orange',
    'custom' => 'custom',
    // Legacy mappings
    'teal'   => 'green',
    'coral'  => 'orange',
    'slate'  => 'blue',
];

view()->share('activeAccent', $accentMap[$company->theme]);
```

### Database Schema

**Company Table:**

```sql
theme VARCHAR(20) DEFAULT 'blue'           -- Accent choice
primary_color VARCHAR(7) NULL              -- Custom: #2171b5
secondary_color VARCHAR(7) NULL            -- Custom: #6baed6
accent_color VARCHAR(7) NULL               -- Custom: #bdd7e7
```

## Component Usage

### Dashboard Widgets

```html
<div class="widget-stat">
    <div class="widget-stat-icon">📊</div>
    <div class="widget-stat-value">1,247</div>
    <div class="widget-stat-label">Total Sales</div>
</div>
```

### Data Tables

```html
<div class="data-table-container">
    <table class="data-table" data-selectable="true">
        <thead>
            <tr>
                <th class="sortable">Name</th>
                <th class="sortable">Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- rows -->
        </tbody>
    </table>
</div>
```

### Forms

```html
<form data-ajax data-validate>
    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" class="form-input" required />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

## Build & Deploy Commands

```bash
# Build assets
npm run build

# Clear Laravel caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache

# Restart services
sudo systemctl restart php8.3-fpm && sudo systemctl reload nginx

# Verify system
php artisan tinker
# Company::first()->update(['theme' => 'green']);
```

## Troubleshooting

### Common Issues

**Accent not changing:**

-   Check `data-accent` attribute in HTML
-   Verify `activeAccent` is shared from middleware
-   Rebuild assets: `npm run build`

**Dark mode not working:**

-   Check `data-theme` attribute
-   Verify `manucore.js` is loaded
-   Check localStorage: `localStorage.getItem('manucore-theme')`

**Custom colors not applying:**

-   Ensure Company has `theme = 'custom'`
-   Check middleware shares `activeThemeVars`
-   Verify inline `<style>` tag is present

### Debug Commands

```javascript
// Check current state
ManuCore.debug.current();

// Test accent switching
ManuCore.debug.accent.testAll();

// Manual accent change
ManuCore.setAccent("purple");

// Check DOM attributes
document.documentElement.getAttribute("data-theme");
document.documentElement.getAttribute("data-accent");
```

## Future Chat Context Command

When starting new styling conversations, paste this context:

---

**MANUCORE ERP THEME CONTEXT:**

Current system has 4 professional accent colors (Blue/Green/Purple/Orange) + custom support. Dark mode automatically applies neon variants. Structure:

-   **theme.css**: Base + 4 accent palettes using `html[data-accent="..."]`
-   **dark-mode.css**: Dark overrides + neon with `[data-theme="dark"][data-accent="..."]`
-   **panel.css**: Dashboard layouts (sidebar, widgets, tables)
-   **manucore.js**: Complete system with `ManuCore.setAccent()`, `ManuCore.toggleTheme()`

**Key selectors:**

-   Accents: `html[data-accent="blue|green|purple|orange"]`
-   Dark+Neon: `[data-theme="dark"][data-accent="..."]`
-   Components: `.widget-stat`, `.data-table`, `.btn-primary`, etc.

**Variables:** `--brand-500/600/700` (base/strong/darker), `--neutral-50` to `--neutral-950`

**JS API:** `ManuCore.setAccent('green')`, `ManuCore.toggleTheme()`, `ManuCore.showToast(msg, type)`

Current accent: Blue (default). Dark mode has automatic neon. System is production-ready with Company integration via middleware.

---

## Version History

-   **v3.1** - Integrated accent system with automatic neon dark mode
-   **v3.0** - Complete interactive JavaScript system
-   **v2.x** - Dark mode support
-   **v1.x** - Base theme system

This documentation covers the complete ManuCore ERP theme system. All components work together to provide a professional, consistent, and highly customizable user interface that adapts to both user preferences and company branding.
