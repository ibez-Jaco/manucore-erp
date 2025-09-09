// resources/js/app.js
import "./bootstrap";

// --- Alpine (load once) ---
import Alpine from "alpinejs";

// Enhanced sidebar store with persistence
Alpine.store("sidebar", {
    open: window.innerWidth >= 1024, // Default open on desktop

    toggle() {
        this.open = !this.open;
        // Save preference to localStorage
        localStorage.setItem("manucore-sidebar-open", this.open);
    },

    init() {
        // Restore sidebar state from localStorage
        const saved = localStorage.getItem("manucore-sidebar-open");
        if (saved !== null) {
            this.open = JSON.parse(saved);
        }

        // Handle window resize
        window.addEventListener("resize", () => {
            if (window.innerWidth < 1024) {
                this.open = false;
            } else {
                // Restore saved preference on desktop
                const saved = localStorage.getItem("manucore-sidebar-open");
                if (saved !== null) {
                    this.open = JSON.parse(saved);
                } else {
                    this.open = true; // Default to open on desktop
                }
            }
        });
    },
});

// Layout state management
Alpine.store("layout", {
    loading: false,
    notifications: [],

    showLoading() {
        this.loading = true;
    },

    hideLoading() {
        this.loading = false;
    },

    addNotification(notification) {
        const id = Date.now();
        this.notifications.unshift({
            id,
            ...notification,
            timestamp: new Date(),
        });

        // Auto remove after 5 seconds
        setTimeout(() => {
            this.removeNotification(id);
        }, 5000);
    },

    removeNotification(id) {
        this.notifications = this.notifications.filter((n) => n.id !== id);
    },
});

// Fallback: header button can dispatch a window event to toggle sidebar
window.addEventListener("toggle-sidebar", () => {
    try {
        if (Alpine.store("sidebar")) {
            Alpine.store("sidebar").toggle();
        }
    } catch (e) {
        // ignore if Alpine not ready yet
    }
});

// --- SweetAlert2 (global, via npm) ---
import Swal from "sweetalert2";
window.Swal = Swal;

// Global helper functions
window.showLoading = () => {
    if (Alpine.store("layout")) {
        Alpine.store("layout").showLoading();
    }
};

window.hideLoading = () => {
    if (Alpine.store("layout")) {
        Alpine.store("layout").hideLoading();
    }
};

// Initialize Alpine
window.Alpine = Alpine;
Alpine.start();

// Initialize stores after Alpine starts
document.addEventListener("DOMContentLoaded", function () {
    // Initialize sidebar store
    if (Alpine.store("sidebar")) {
        Alpine.store("sidebar").init();
    }
});
