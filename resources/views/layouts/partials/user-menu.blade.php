@php
    $user = auth()->user();
    $userInitials = strtoupper(substr($user->name ?? 'U', 0, 1));
    $roleColors = [
        'Admin'            => 'badge-danger',
        'SettingsManager'  => 'badge-primary',
        'Manager'          => 'badge-success',
        'Staff'            => 'badge-warning',
        'Viewer'           => 'badge-neutral',
    ];
    $userRole = $user->roles->first()?->name ?? 'User';
    $roleColorClass = $roleColors[$userRole] ?? $roleColors['Viewer'];
@endphp

<div class="user-menu-dropdown dropdown">
    <button type="button"
            class="header-user"
            data-dropdown-toggle="user-dropdown"
            aria-haspopup="true" aria-expanded="false">
        <div class="header-user-avatar">{{ $userInitials }}</div>
        <div class="header-user-info mobile-hidden">
            <div class="header-user-name">{{ $user->name ?? 'User' }}</div>
            <div class="header-user-role">{{ $userRole }}</div>
        </div>
        <x-lucide-chevron-down class="header-user-chevron" />
    </button>

    <div id="user-dropdown" class="dropdown-menu user-dropdown-menu">
        {{-- Profile header --}}
        <div class="user-dropdown-header">
            <div class="user-profile-section">
                <div class="user-avatar-large">{{ $userInitials }}</div>
                <div class="user-details">
                    <div class="user-name-badge">
                        <p class="user-name">{{ $user->name ?? 'User' }}</p>
                        <span class="user-role-badge {{ $roleColorClass }}">{{ $userRole }}</span>
                    </div>
                    <p class="user-email">{{ $user->email ?? '' }}</p>
                    @if($user->email_verified_at)
                        <div class="user-verification">
                            <x-lucide-badge-check class="verification-icon" />
                            <span class="verification-text">Verified Account</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Theme & appearance --}}
        <div class="user-dropdown-section">
            <div class="section-header">
                <x-lucide-palette class="section-icon" />
                <span>Theme & Appearance</span>
            </div>

            {{-- Accent choices --}}
            <div class="accent-picker-section">
                <div class="accent-picker-label">Color Theme</div>
                <div class="accent-picker-grid">
                    <button data-accent-choice="blue"   class="accent-choice blue"   data-tooltip="Blue Theme"><div class="accent-choice-inner"></div></button>
                    <button data-accent-choice="green"  class="accent-choice green"  data-tooltip="Green Theme"><div class="accent-choice-inner"></div></button>
                    <button data-accent-choice="purple" class="accent-choice purple" data-tooltip="Purple Theme"><div class="accent-choice-inner"></div></button>
                    <button data-accent-choice="orange" class="accent-choice orange" data-tooltip="Orange Theme"><div class="accent-choice-inner"></div></button>
                </div>
            </div>

            {{-- Dark mode toggle --}}
            <div class="dark-mode-section">
                <div class="dark-mode-toggle-row">
                    <div class="dark-mode-info">
                        <x-lucide-moon class="dark-mode-icon" />
                        <span class="dark-mode-label">Dark Mode</span>
                    </div>
                    <button type="button" class="dark-mode-toggle-switch" id="dark-mode-toggle">
                        <div class="toggle-switch-slider"><div class="toggle-switch-thumb"></div></div>
                    </button>
                </div>
            </div>

            @if(Route::has('settings.branding.edit'))
            <a href="{{ route('settings.branding.edit') }}" class="theme-settings-link">
                <x-lucide-settings class="theme-settings-icon" />
                <span>Advanced Theme Settings</span>
                <x-lucide-external-link class="external-icon" />
            </a>
            @endif
        </div>

        <div class="dropdown-divider"></div>

        {{-- Account actions (SweetAlert notices) --}}
        <a href="#" class="dropdown-item" data-soon="Account Settings">
            <div class="dropdown-item-content">
                <div class="dropdown-item-icon"><x-lucide-user /></div>
                <div class="dropdown-item-details">
                    <div class="dropdown-item-title">Account Settings</div>
                    <div class="dropdown-item-subtitle">Manage your profile</div>
                </div>
            </div>
        </a>

        <a href="#" class="dropdown-item" data-soon="Preferences">
            <div class="dropdown-item-content">
                <div class="dropdown-item-icon"><x-lucide-sliders-horizontal /></div>
                <div class="dropdown-item-details">
                    <div class="dropdown-item-title">Preferences</div>
                    <div class="dropdown-item-subtitle">Customize experience</div>
                </div>
            </div>
        </a>

        <div class="dropdown-divider"></div>

        @if(config('app.debug'))
            <div class="developer-section-header"><span>Developer Tools</span></div>
            <a href="/phpmyadmin" target="_blank" class="dropdown-item">
                <div class="dropdown-item-content">
                    <div class="dropdown-item-icon warning"><x-lucide-database /></div>
                    <div class="dropdown-item-details">
                        <div class="dropdown-item-title">phpMyAdmin</div>
                        <div class="dropdown-item-subtitle">Database management</div>
                    </div>
                    <x-lucide-external-link class="external-link-icon" />
                </div>
            </a>
            <div class="dropdown-divider"></div>
        @endif

        <a href="#" class="dropdown-item" data-soon="Help & Support">
            <div class="dropdown-item-content">
                <div class="dropdown-item-icon"><x-lucide-help-circle /></div>
                <div class="dropdown-item-details">
                    <div class="dropdown-item-title">Help & Support</div>
                    <div class="dropdown-item-subtitle">Get help and docs</div>
                </div>
            </div>
        </a>

        <div class="dropdown-divider"></div>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="dropdown-item logout-item"
                    onclick="event.preventDefault(); ManuCore.confirmDelete('Sign Out?','Are you sure you want to end your session?').then(r=>{ if(r.isConfirmed){ ManuCore.showLoading('Signing out...','Please wait'); this.closest('form').submit(); } });">
                <div class="dropdown-item-content">
                    <div class="dropdown-item-icon danger"><x-lucide-log-out /></div>
                    <div class="dropdown-item-details">
                        <div class="dropdown-item-title">Sign Out</div>
                        <div class="dropdown-item-subtitle">End your session</div>
                    </div>
                </div>
            </button>
        </form>

        <div class="user-dropdown-footer">
            <div class="footer-info">
                <span class="app-version">ManuCore ERP v3.1.0</span>
                <span class="current-time">{{ now()->format('H:i') }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Component-scoped styles (polish + dark-mode header + correct icon sizing) --}}
<style>
.user-menu-dropdown { position: relative; }

/* trigger button */
.header-user {
    display:flex; align-items:center; gap:var(--space-3);
    padding:var(--space-2) var(--space-3);
    border-radius:var(--radius-full);
    background: var(--neutral-50);
    border:none; cursor:pointer; text-decoration:none;
    transition: all var(--transition-fast);
}
.header-user:hover { background: var(--neutral-100); transform: translateY(-1px); }
.header-user-avatar {
    width:36px; height:36px; border-radius: var(--radius-full);
    background: linear-gradient(135deg, var(--brand-400), var(--brand-600));
    color:#fff; display:grid; place-items:center; font-weight:600; font-size: var(--text-sm);
    box-shadow: var(--shadow-sm);
}
.header-user-info { display:flex; flex-direction:column; min-width:0; }
.header-user-name { font-size: var(--text-sm); font-weight:600; color: var(--neutral-900); line-height:1.2; }
.header-user-role { font-size: var(--text-xs); color: var(--neutral-500); line-height:1.2; }
.header-user-chevron { width:16px; height:16px; color: var(--neutral-500); transition: transform var(--transition-fast); }

/* menu container (viewport safe) */
.user-dropdown-menu{
    position: absolute;
    top: calc(100% + var(--space-2));
    right: 0; left: auto;
    width: 320px;
    max-width: min(92vw, 320px);
    max-height: min(70vh, 480px);
    overflow-y: auto;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    background: white;
    box-shadow: var(--shadow-xl);
}

/* fix giant lucide icons inside dropdown */
.dropdown-item-icon svg, .section-icon,
.user-verification .verification-icon,
.theme-settings-icon, .external-icon, .external-link-icon { width:16px; height:16px; }

/* header (light/dark) */
.user-dropdown-header{
    padding: var(--space-5);
    background: linear-gradient(135deg, var(--brand-50), var(--brand-100));
    border-bottom: 1px solid var(--neutral-200);
}
html[data-theme="dark"] .user-dropdown-menu { background: var(--neutral-900); border-color: var(--neutral-700); }
html[data-theme="dark"] .user-dropdown-header{
    background: linear-gradient(135deg, var(--neutral-800), var(--neutral-700));
    border-bottom-color: var(--neutral-700);
}
html[data-theme="dark"] .user-dropdown-header .user-name { color: var(--neutral-50); }
html[data-theme="dark"] .user-dropdown-header .user-email { color: var(--neutral-300); }

/* profile block */
.user-profile-section { display:flex; align-items:center; gap: var(--space-3); }
.user-avatar-large {
    width:56px; height:56px; border-radius: var(--radius-xl);
    background: linear-gradient(135deg, var(--brand-400), var(--brand-700));
    color:#fff; display:grid; place-items:center; font-weight:700; font-size: var(--text-lg);
    box-shadow: var(--shadow-md);
}
.user-details { flex:1; min-width:0; }
.user-name-badge { display:flex; align-items:center; gap: var(--space-2); margin-bottom: var(--space-1); }
.user-name { font-weight:700; color: var(--neutral-900); font-size: var(--text-base); margin:0; }
.user-email { color: var(--neutral-600); font-size: var(--text-sm); margin:0; }
.user-verification { display:flex; align-items:center; gap: var(--space-1); margin-top: var(--space-1); }
.verification-text { font-size:10px; font-weight:500; color: var(--success-600); }

/* sections */
.user-dropdown-section { padding: var(--space-4) var(--space-5); }
.section-header { display:flex; align-items:center; gap: var(--space-2); margin-bottom: var(--space-3); font-size: var(--text-sm); font-weight:600; color: var(--neutral-700); }
.section-icon { width:16px; height:16px; }

/* accent picker */
.accent-picker-section { margin-bottom: var(--space-4); }
.accent-picker-label { font-size: var(--text-xs); font-weight:500; color: var(--neutral-600); margin-bottom: var(--space-2); }
.accent-picker-grid { display:grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-2); }
.accent-choice{
    width:40px; height:40px; border-radius: var(--radius-lg);
    border:2px solid var(--neutral-200); cursor:pointer; position:relative; overflow:hidden; background:none; padding:4px;
    transition: transform var(--transition-fast), border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.accent-choice-inner{ width:100%; height:100%; border-radius:6px; transition: transform var(--transition-fast); }
.accent-choice.blue   .accent-choice-inner { background:#2563eb; }
.accent-choice.green  .accent-choice-inner { background:#16a34a; }
.accent-choice.purple .accent-choice-inner { background:#7c3aed; }
.accent-choice.orange .accent-choice-inner { background:#ea580c; }
.accent-choice:hover { transform: scale(1.05); border-color: var(--neutral-400); }
.accent-choice:hover .accent-choice-inner{ transform: scale(1.1); }
.accent-choice.active { border-color: var(--brand-600); box-shadow: 0 0 0 2px rgba(59,130,246,.2); }
.accent-choice.active::after{
    content:'✓'; position:absolute; inset:0; display:grid; place-items:center; color:#fff; font-weight:700; text-shadow:0 1px 2px rgba(0,0,0,.5);
}

/* improved dark-mode switch */
.dark-mode-section { margin-bottom: var(--space-4); }
.dark-mode-toggle-row { display:flex; align-items:center; justify-content:space-between; }
.dark-mode-info { display:flex; align-items:center; gap: var(--space-2); }
.dark-mode-icon { width:16px; height:16px; color: var(--neutral-600); }
.dark-mode-label { font-size: var(--text-sm); font-weight:500; color: var(--neutral-700); }
.dark-mode-toggle-switch{
    width:52px; height:28px; border-radius:9999px; border:1px solid var(--neutral-300);
    background: linear-gradient(180deg, var(--neutral-100), var(--neutral-200));
    box-shadow: inset 0 1px 2px rgba(0,0,0,.05);
    cursor:pointer; position:relative; padding:3px; transition: all var(--transition-fast);
}
.dark-mode-toggle-switch .toggle-switch-thumb{
    width:22px; height:22px; border-radius:9999px; background:#fff;
    box-shadow: 0 1px 2px rgba(0,0,0,.2);
    transition: transform var(--transition-fast), background var(--transition-fast);
}
.dark-mode-toggle-switch.active{ border-color: var(--brand-600); background: linear-gradient(180deg, var(--brand-200), var(--brand-300)); }
.dark-mode-toggle-switch.active .toggle-switch-thumb{ transform: translateX(24px); }

/* generic items + footer */
.dropdown-item{ display:block; padding: var(--space-3) var(--space-5); color: var(--neutral-700); text-decoration:none; transition: background var(--transition-fast); border:none; width:100%; background:none; text-align:left; cursor:pointer; }
.dropdown-item:hover{ background: var(--neutral-50); }
.dropdown-item-content{ display:flex; align-items:center; gap: var(--space-3); }
.dropdown-item-icon{
    width:36px; height:36px; background: var(--neutral-100);
    border-radius: var(--radius-lg); display:flex; align-items:center; justify-content:center; color: var(--neutral-600); flex-shrink:0;
}
.dropdown-item-icon.warning { background: var(--warning-100); color: var(--warning-600); }
.dropdown-item-icon.danger  { background: var(--danger-100);  color: var(--danger-600); }
.dropdown-item-details{ flex:1; min-width:0; }
.dropdown-item-title{ font-size: var(--text-sm); font-weight:500; color: var(--neutral-900); margin-bottom:2px; }
.dropdown-item-subtitle{ font-size: var(--text-xs); color: var(--neutral-500); }
.logout-item{ color: var(--danger-700); }
.logout-item:hover{ background: var(--danger-50); }
.external-link-icon { width:16px; height:16px; color: var(--neutral-400); margin-left:auto; }

.developer-section-header{ padding: var(--space-2) var(--space-5); font-size: var(--text-xs); font-weight:600; color: var(--neutral-500); text-transform:uppercase; letter-spacing:.05em; }

.user-dropdown-footer{ padding: var(--space-3) var(--space-5); border-top:1px solid var(--neutral-200); background: var(--neutral-50); }
html[data-theme="dark"] .user-dropdown-footer{ background: var(--neutral-900); border-top-color: var(--neutral-700); }
.footer-info{ display:flex; align-items:center; justify-content:space-between; font-size: var(--text-xs); color: var(--neutral-500); }
.app-version{ font-weight:600; }

/* role badges */
.badge-danger { background: var(--danger-100); color: var(--danger-700); }
.badge-primary{ background: var(--brand-100);  color: var(--brand-700); }
.badge-success{ background: var(--success-100); color: var(--success-700); }
.badge-warning{ background: var(--warning-100); color: var(--warning-700); }
.badge-neutral{ background: var(--neutral-200); color: var(--neutral-700); }

/* mobile positioning: keep menu on-screen */
@media (max-width: 640px) {
    .mobile-hidden { display: none !important; }
    .user-menu-dropdown { position: static; }
    .user-dropdown-menu {
        position: fixed;
        top: 70px;                  /* header height */
        right: var(--space-4);
        left: auto;
        width: min(92vw, 320px);
        max-height: min(70vh, 480px);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    if (!window.ManuCore) return;

    const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';
    const toast = (title, type='info') => {
        if (window.Swal) {
            Swal.fire({ icon: type, title, timer: 1300, showConfirmButton: false, toast:true, position:'top-end' });
        } else if (window.ManuCore?.showToast) {
            ManuCore.showToast(title, type);
        }
    };
    const soon = (title) => {
        if (window.Swal) Swal.fire({ icon:'info', title, text:'This feature is coming soon.', confirmButtonColor: brand });
        else alert(`${title}\n\nThis feature is coming soon.`);
    };

    // “Coming soon” items
    document.querySelectorAll('[data-soon]')?.forEach(a => {
        a.addEventListener('click', (e) => { e.preventDefault(); soon(a.getAttribute('data-soon')); });
    });

    // ---------- Accent choice feedback (user-action only) ----------
    const formatName = (s) => (s || '').toString().trim().replace(/[-_]+/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
    const norm = (s) => (s || '').toString().trim().toLowerCase();

    const getCurrentAccent = () =>
      (ManuCore?.getCurrentAccent?.() || document.documentElement.getAttribute('data-accent') || 'blue').toString();

    const updateAccentChoices = () => {
        const currentAccent = norm(getCurrentAccent());
        document.querySelectorAll('.accent-choice').forEach(choice => {
            const active = norm(choice.getAttribute('data-accent-choice')) === currentAccent;
            choice.classList.toggle('active', active);
        });
    };

    // Only toast after a real user click from this menu
    let lastAccent = norm(getCurrentAccent());
    let accentToastArmed = false;

    document.querySelectorAll('.accent-choice').forEach(btn => {
        btn.addEventListener('click', () => { accentToastArmed = true; }, { passive: true });
    });

    window.addEventListener('accent-changed', (e) => {
        const det = e?.detail;
        const parsed =
            (typeof det === 'string' && det) ||
            (det && typeof det === 'object' && (det.accent || det.name || det.value)) ||
            getCurrentAccent();

        const nextAccent = norm(parsed);

        if (nextAccent && nextAccent !== lastAccent) {
            lastAccent = nextAccent;
            if (accentToastArmed) {
                accentToastArmed = false;
                toast(`Accent changed to ${formatName(nextAccent)}`, 'success');
            }
        }
        updateAccentChoices();
    });

    // ---------- Dark mode toggle + feedback ----------
    const toggle = document.getElementById('dark-mode-toggle');
    const updateDarkToggle = () => {
        const theme = document.documentElement.getAttribute('data-theme') || 'light';
        toggle?.classList.toggle('active', theme === 'dark');
    };
    toggle?.addEventListener('click', () => ManuCore.toggleTheme && ManuCore.toggleTheme());
    window.addEventListener('theme-changed', () => {
        const theme = document.documentElement.getAttribute('data-theme') || 'light';
        toast(theme === 'dark' ? 'Dark mode enabled' : 'Light mode enabled', 'success');
        updateDarkToggle();
    });

    // init UI states
    updateAccentChoices();
    updateDarkToggle();
});
</script>
