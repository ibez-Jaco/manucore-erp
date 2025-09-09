/**
 * ================================================================
 * MANUCORE ERP - COMPLETE INTERACTIVE SYSTEM
 * Version: 3.1 - Professional Accent System Integrated
 * Description: Comprehensive JavaScript framework for ManuCore ERP
 * ================================================================
 */

// ================================================================
// GLOBAL CONFIGURATION & INITIALIZATION
// ================================================================

/**
 * Main ManuCore object - Entry point for all ERP functionality
 */
window.ManuCore = {
    // System configuration with defaults
    config: {
        apiUrl: "/api",
        theme: localStorage.getItem("manucore-theme") || "light",
        accent: localStorage.getItem("manucore-accent") || "blue",
        sidebarCollapsed:
            localStorage.getItem("manucore-sidebar-collapsed") === "true",
        toastDuration: 5000,
        animationSpeed: 300,
        debounceDelay: 300,
    },

    // Available theme accents
    allowedAccents: ["blue", "green", "purple", "orange"],

    /**
     * Initialize all ManuCore systems
     * Called automatically when DOM is ready
     */
    init() {
        this.initTheme();
        this.initSidebar();
        this.initModals();
        this.initDropdowns();
        this.initToasts();
        this.initDataTables();
        this.initForms();
        this.initSearch();
        this.initNotifications();
        this.initTabs();
        this.initTooltips();
        this.initSweetAlert();
        this.bindGlobalEvents();

        console.log("🚀 ManuCore ERP initialized successfully");
        console.log(
            "🎨 Accent System ready - Current:",
            this.getCurrentAccent()
        );
    },
};

// ================================================================
// THEME & ACCENT MANAGEMENT SYSTEM
// ================================================================

/**
 * Initialize theme system with accent support
 * Handles both light/dark modes and accent colors
 */
ManuCore.initTheme = function () {
    // Apply saved theme (light/dark mode)
    const savedTheme = localStorage.getItem("manucore-theme") || "light";
    document.documentElement.setAttribute("data-theme", savedTheme);
    this.config.theme = savedTheme;

    // Apply saved accent (color theme)
    const savedAccent = localStorage.getItem("manucore-accent") || "blue";
    this.setAccent(savedAccent, false); // false = no toast on init

    // Update dark mode toggle state
    const toggle = document.querySelector(".dark-mode-toggle");
    if (toggle) {
        toggle.classList.toggle("active", savedTheme === "dark");
    }

    // Listen for system preference changes (respects user's OS settings)
    const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
    mediaQuery.addEventListener("change", (e) => {
        // Only auto-switch if user hasn't manually set a preference
        if (!localStorage.getItem("manucore-theme")) {
            this.setTheme(e.matches ? "dark" : "light");
        }
    });
};

/**
 * Set light/dark theme mode
 * @param {string} theme - "light" or "dark"
 */
ManuCore.setTheme = function (theme) {
    // Add transition class for smooth color changes
    document.documentElement.classList.add("transitioning");

    // Apply theme to DOM and storage
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("manucore-theme", theme);
    this.config.theme = theme;

    // Update toggle button state
    const toggle = document.querySelector(".dark-mode-toggle");
    if (toggle) {
        toggle.classList.toggle("active", theme === "dark");
    }

    // Remove transition class after animation completes
    setTimeout(() => {
        document.documentElement.classList.remove("transitioning");
    }, 200);

    // Notify other components of theme change
    window.dispatchEvent(
        new CustomEvent("theme-changed", {
            detail: {
                theme,
                accent: this.getCurrentAccent(),
                isNeon: theme === "dark",
            },
        })
    );

    // Show user feedback
    const modeName = theme.charAt(0).toUpperCase() + theme.slice(1);
    const accentName =
        this.getCurrentAccent().charAt(0).toUpperCase() +
        this.getCurrentAccent().slice(1);
    this.showToast(`${accentName} ${modeName} mode activated`, "success");
};

/**
 * Toggle between light and dark themes
 */
ManuCore.toggleTheme = function () {
    const currentTheme =
        document.documentElement.getAttribute("data-theme") || "light";
    const newTheme = currentTheme === "dark" ? "light" : "dark";
    this.setTheme(newTheme);
};

/**
 * Set accent color (blue, green, purple, orange)
 * @param {string} accent - Accent color name
 * @param {boolean} showToast - Whether to show confirmation toast
 */
ManuCore.setAccent = function (accent, showToast = true) {
    // Validate accent choice
    if (!this.allowedAccents.includes(accent)) {
        console.warn(
            `[ManuCore] Invalid accent: ${accent}. Allowed: ${this.allowedAccents.join(
                ", "
            )}`
        );
        return;
    }

    // Apply accent to DOM and storage
    document.documentElement.setAttribute("data-accent", accent);
    localStorage.setItem("manucore-accent", accent);
    this.config.accent = accent;

    // Show confirmation toast (if requested)
    if (showToast) {
        const accentName = accent.charAt(0).toUpperCase() + accent.slice(1);
        const themeName =
            this.config.theme.charAt(0).toUpperCase() +
            this.config.theme.slice(1);
        this.showToast(
            `Theme changed to ${accentName} ${themeName}`,
            "success"
        );
    }

    // Notify other components of accent change
    window.dispatchEvent(
        new CustomEvent("accent-changed", {
            detail: {
                accent,
                theme: this.config.theme,
                isNeon: this.config.theme === "dark",
            },
        })
    );
};

/**
 * Get current accent color
 * @returns {string} Current accent name
 */
ManuCore.getCurrentAccent = function () {
    return document.documentElement.getAttribute("data-accent") || "blue";
};

// ================================================================
// SIDEBAR NAVIGATION SYSTEM
// ================================================================

/**
 * Initialize sidebar functionality
 * Handles collapsed states and responsive behavior
 */
ManuCore.initSidebar = function () {
    const sidebar = document.querySelector(".sidebar");
    if (!sidebar) return;

    // Apply saved collapsed state
    if (this.config.sidebarCollapsed) {
        sidebar.classList.add("collapsed");
    }

    // Set up proper content margins
    this.updateMainContentMargin();
};

/**
 * Toggle sidebar collapsed/expanded state
 */
ManuCore.toggleSidebar = function () {
    const sidebar = document.querySelector(".sidebar");
    if (!sidebar) return;

    sidebar.classList.toggle("collapsed");
    const isCollapsed = sidebar.classList.contains("collapsed");

    // Persist state
    localStorage.setItem("manucore-sidebar-collapsed", isCollapsed);
    this.config.sidebarCollapsed = isCollapsed;

    // Update layout
    this.updateMainContentMargin();

    // Notify components
    window.dispatchEvent(
        new CustomEvent("sidebar-toggled", {
            detail: { collapsed: isCollapsed },
        })
    );
};

/**
 * Update main content margin based on sidebar state
 * Handles responsive behavior
 */
/**
 * Update main content margin based on sidebar state
 * Handles responsive behavior
 */
ManuCore.updateMainContentMargin = function () {
    const sidebar = document.querySelector(".sidebar");
    const main = document.querySelector(".main-content");
    if (!sidebar || !main) return;

    // Desktop: let CSS handle it (via sibling selector)
    if (window.innerWidth > 768) {
        main.style.marginLeft = "";
        main.style.width = "";
        main.style.maxWidth = "";
        return;
    }

    // Mobile: force full width + no left margin
    main.style.marginLeft = "0";
    main.style.width = "100%";
    main.style.maxWidth = "100%";
};

/**
 * Toggle mobile sidebar with backdrop
 * Used on smaller screens
 */
ManuCore.toggleMobileSidebar = function () {
    const sidebar = document.querySelector(".sidebar");
    if (!sidebar) return;

    sidebar.classList.toggle("mobile-open");

    // Handle backdrop overlay
    let backdrop = document.querySelector(".sidebar-backdrop");
    if (sidebar.classList.contains("mobile-open")) {
        // Create backdrop if it doesn't exist
        if (!backdrop) {
            backdrop = document.createElement("div");
            backdrop.className = "sidebar-backdrop";
            backdrop.style.cssText = `
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 25;
                backdrop-filter: blur(4px);
            `;
            backdrop.addEventListener("click", () =>
                this.toggleMobileSidebar()
            );
            document.body.appendChild(backdrop);
        }
    } else {
        // Remove backdrop when sidebar closes
        if (backdrop) {
            backdrop.remove();
        }
    }
};

// ================================================================
// MODAL DIALOG SYSTEM
// ================================================================

/**
 * Initialize modal system
 * Handles backdrop clicks and escape key
 */
ManuCore.initModals = function () {
    // Close modals when clicking backdrop
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("modal-backdrop")) {
            this.closeModal(e.target.id);
        }
    });

    // Close modals with Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            const openModal = document.querySelector(".modal-backdrop.show");
            if (openModal) {
                this.closeModal(openModal.id);
            }
        }
    });
};

/**
 * Open modal by ID
 * @param {string} modalId - Modal element ID
 */
ManuCore.openModal = function (modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.classList.add("show");
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";

    // Auto-focus first interactive element
    setTimeout(() => {
        const firstInput = modal.querySelector(
            "input, button, select, textarea"
        );
        if (firstInput) firstInput.focus();
    }, 100);

    // Notify components
    modal.dispatchEvent(new CustomEvent("modal-opened"));
};

/**
 * Close modal by ID
 * @param {string} modalId - Modal element ID
 */
ManuCore.closeModal = function (modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.classList.remove("show");

    setTimeout(() => {
        modal.style.display = "none";
        document.body.style.overflow = "";
    }, this.config.animationSpeed);

    // Notify components
    modal.dispatchEvent(new CustomEvent("modal-closed"));
};

// ================================================================
// DROPDOWN MENU SYSTEM
// ================================================================

/**
 * Initialize dropdown functionality
 * Handles clicks and keyboard navigation
 */
ManuCore.initDropdowns = function () {
    document.addEventListener("click", (e) => {
        // Handle dropdown toggle buttons
        if (
            e.target.matches("[data-dropdown-toggle]") ||
            e.target.closest("[data-dropdown-toggle]")
        ) {
            e.preventDefault();
            const trigger = e.target.closest("[data-dropdown-toggle]");
            const dropdownId = trigger.getAttribute("data-dropdown-toggle");
            this.toggleDropdown(dropdownId);
        }
        // Close dropdowns when clicking outside
        else if (!e.target.closest(".dropdown")) {
            this.closeAllDropdowns();
        }
    });

    // Close dropdowns with Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            this.closeAllDropdowns();
        }
    });
};

/**
 * Toggle specific dropdown menu
 * @param {string} dropdownId - Dropdown element ID
 */
ManuCore.toggleDropdown = function (dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    if (!dropdown) return;

    // Close others first
    document.querySelectorAll(".dropdown-menu.show").forEach((m) => {
        if (m !== dropdown) m.classList.remove("show");
    });

    dropdown.classList.toggle("show");

    // Viewport safety: nudge if overflowing
    if (dropdown.classList.contains("show")) {
        const rect = dropdown.getBoundingClientRect();
        const pad = 8;

        // Too wide to the right? snap to right edge
        if (rect.right > window.innerWidth - pad) {
            dropdown.style.left = "auto";
            dropdown.style.right = "0";
        }

        // Too wide to the left? snap to left edge
        if (rect.left < pad) {
            dropdown.style.right = "auto";
            dropdown.style.left = "0";
        }

        // Too tall? cap height and allow scroll (CSS also handles this)
        if (rect.height > window.innerHeight * 0.7) {
            dropdown.style.maxHeight = "70vh";
            dropdown.style.overflowY = "auto";
        }
    }
};

/**
 * Close all open dropdown menus
 */
ManuCore.closeAllDropdowns = function () {
    document.querySelectorAll(".dropdown-menu.show").forEach((menu) => {
        menu.classList.remove("show");
    });
};

// ================================================================
// TOAST NOTIFICATION SYSTEM
// ================================================================

/**
 * Initialize toast notification system
 * Creates container if needed
 */
ManuCore.initToasts = function () {
    if (!document.querySelector(".toast-container")) {
        const container = document.createElement("div");
        container.className = "toast-container";
        document.body.appendChild(container);
    }
};

/**
 * Show toast notification
 * @param {string} message - Toast message
 * @param {string} type - Toast type (success, error, warning, info)
 * @param {number|null} duration - Display duration in ms (null for no auto-hide)
 */
ManuCore.showToast = function (message, type = "info", duration = null) {
    const container = document.querySelector(".toast-container");
    if (!container) return;

    duration = duration || this.config.toastDuration;

    // Create toast element
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;

    const icons = {
        success: "✅",
        error: "❌",
        warning: "⚠️",
        info: "ℹ️",
    };

    toast.innerHTML = `
        <div class="toast-icon">${icons[type]}</div>
        <div class="toast-content">
            <div class="toast-title">${
                type.charAt(0).toUpperCase() + type.slice(1)
            }</div>
            <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close" aria-label="Close">×</button>
    `;

    container.appendChild(toast);

    // Set up close functionality
    const closeBtn = toast.querySelector(".toast-close");
    closeBtn.addEventListener("click", () => this.removeToast(toast));

    // Auto-remove after duration
    if (duration > 0) {
        setTimeout(() => this.removeToast(toast), duration);
    }

    return toast;
};

/**
 * Remove toast with animation
 * @param {HTMLElement} toast - Toast element to remove
 */
ManuCore.removeToast = function (toast) {
    if (!toast || !toast.parentElement) return;

    toast.style.animation = "slideOutRight 0.3s ease-out";
    setTimeout(() => {
        if (toast.parentElement) {
            toast.remove();
        }
    }, 300);
};

// ================================================================
// DATA TABLE SYSTEM
// ================================================================

/**
 * Initialize all data tables on the page
 * Sets up sorting, searching, selection, and pagination
 */
ManuCore.initDataTables = function () {
    document.querySelectorAll(".data-table").forEach((table) => {
        this.setupTableSorting(table);
        this.setupTableSearch(table);
        this.setupTableSelection(table);
        this.setupTablePagination(table);
    });
};

/**
 * Set up table column sorting
 * @param {HTMLElement} table - Table element
 */
ManuCore.setupTableSorting = function (table) {
    table
        .querySelectorAll("th.sortable, th[data-sortable]")
        .forEach((header) => {
            header.style.cursor = "pointer";
            header.addEventListener("click", () => {
                this.sortTable(table, header);
            });
        });
};

/**
 * Sort table by column
 * @param {HTMLElement} table - Table element
 * @param {HTMLElement} header - Header element clicked
 */
ManuCore.sortTable = function (table, header) {
    const columnIndex = Array.from(header.parentElement.children).indexOf(
        header
    );
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));
    const isAscending = header.classList.contains("sort-asc");

    // Sort rows based on column data
    rows.sort((a, b) => {
        let aValue = a.children[columnIndex]?.textContent.trim() || "";
        let bValue = b.children[columnIndex]?.textContent.trim() || "";

        // Handle numeric values
        const aNum = parseFloat(aValue.replace(/[^\d.-]/g, ""));
        const bNum = parseFloat(bValue.replace(/[^\d.-]/g, ""));

        if (!isNaN(aNum) && !isNaN(bNum)) {
            return isAscending ? bNum - aNum : aNum - bNum;
        }

        // Handle date values
        const aDate = new Date(aValue);
        const bDate = new Date(bValue);
        if (!isNaN(aDate.getTime()) && !isNaN(bDate.getTime())) {
            return isAscending ? bDate - aDate : aDate - bDate;
        }

        // Handle string values
        return isAscending
            ? bValue.localeCompare(aValue)
            : aValue.localeCompare(bValue);
    });

    // Update DOM with sorted rows
    rows.forEach((row) => tbody.appendChild(row));

    // Update sort indicators
    table.querySelectorAll("th").forEach((th) => {
        th.classList.remove("sort-asc", "sort-desc");
    });
    header.classList.add(isAscending ? "sort-desc" : "sort-asc");
};

/**
 * Set up table search functionality
 * @param {HTMLElement} table - Table element
 */
ManuCore.setupTableSearch = function (table) {
    const searchInput = document.querySelector(
        `[data-table-search="${table.id}"]`
    );
    if (!searchInput) return;

    let searchTimeout;
    searchInput.addEventListener("input", (e) => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            this.filterTable(table, e.target.value);
        }, this.config.debounceDelay);
    });
};

/**
 * Filter table rows by search term
 * @param {HTMLElement} table - Table element
 * @param {string} searchTerm - Search query
 */
ManuCore.filterTable = function (table, searchTerm) {
    const tbody = table.querySelector("tbody");
    const rows = tbody.querySelectorAll("tr");
    const term = searchTerm.toLowerCase();
    let visibleCount = 0;

    rows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        const isVisible = text.includes(term);
        row.style.display = isVisible ? "" : "none";
        if (isVisible) visibleCount++;
    });

    // Update results counter
    const countElement = document.querySelector(
        `[data-table-count="${table.id}"]`
    );
    if (countElement) {
        countElement.textContent = `${visibleCount} results`;
    }

    // Notify components
    table.dispatchEvent(
        new CustomEvent("table-filtered", {
            detail: { term: searchTerm, visibleCount },
        })
    );
};

/**
 * Set up table row selection with checkboxes
 * @param {HTMLElement} table - Table element
 */
ManuCore.setupTableSelection = function (table) {
    if (!table.dataset.selectable) return;

    // Add select all checkbox to header
    const thead = table.querySelector("thead tr");
    if (!thead.querySelector(".select-all")) {
        const th = document.createElement("th");
        th.style.width = "40px";
        th.innerHTML =
            '<input type="checkbox" class="select-all" aria-label="Select all">';
        thead.insertBefore(th, thead.firstChild);
    }

    // Add individual checkboxes to each row
    table.querySelectorAll("tbody tr").forEach((row) => {
        if (!row.querySelector(".select-row")) {
            const td = document.createElement("td");
            td.innerHTML =
                '<input type="checkbox" class="select-row" aria-label="Select row">';
            row.insertBefore(td, row.firstChild);
        }
    });

    // Set up select all functionality
    const selectAll = table.querySelector(".select-all");
    if (selectAll) {
        selectAll.addEventListener("change", (e) => {
            table.querySelectorAll(".select-row").forEach((checkbox) => {
                checkbox.checked = e.target.checked;
                checkbox
                    .closest("tr")
                    .classList.toggle("selected", e.target.checked);
            });
            this.updateSelectionActions(table);
        });
    }

    // Set up individual row selection
    table.querySelectorAll(".select-row").forEach((checkbox) => {
        checkbox.addEventListener("change", (e) => {
            e.target
                .closest("tr")
                .classList.toggle("selected", e.target.checked);

            // Update select all state
            const allRows = table.querySelectorAll(".select-row");
            const checkedRows = table.querySelectorAll(".select-row:checked");
            if (selectAll) {
                selectAll.checked = allRows.length === checkedRows.length;
                selectAll.indeterminate =
                    checkedRows.length > 0 &&
                    checkedRows.length < allRows.length;
            }

            this.updateSelectionActions(table);
        });
    });
};

/**
 * Update bulk action buttons based on selection
 * @param {HTMLElement} table - Table element
 */
ManuCore.updateSelectionActions = function (table) {
    const selectedCount = table.querySelectorAll(".select-row:checked").length;
    const bulkActions = document.querySelector(
        `[data-table-actions="${table.id}"]`
    );

    if (bulkActions) {
        bulkActions.style.display = selectedCount > 0 ? "flex" : "none";
        const countElement = bulkActions.querySelector(".selection-count");
        if (countElement) {
            countElement.textContent = `${selectedCount} selected`;
        }
    }
};

/**
 * Set up table pagination
 * @param {HTMLElement} table - Table element
 */
ManuCore.setupTablePagination = function (table) {
    const pagination = table
        .closest(".data-table-container")
        ?.querySelector(".table-pagination-controls");
    if (!pagination) return;

    pagination.addEventListener("click", (e) => {
        if (e.target.matches(".btn[data-page]")) {
            const page = e.target.dataset.page;
            this.loadTablePage(table, page);
        }
    });
};

/**
 * Load table page (for server-side pagination)
 * @param {HTMLElement} table - Table element
 * @param {string} page - Page number
 */
ManuCore.loadTablePage = function (table, page) {
    console.log(`Loading page ${page} for table ${table.id}`);
    // Implementation would make AJAX request to load new page
};

// ================================================================
// FORM HANDLING SYSTEM
// ================================================================

/**
 * Initialize form handling
 * Sets up validation and AJAX submission
 */
ManuCore.initForms = function () {
    // Set up client-side validation
    document.querySelectorAll("form[data-validate]").forEach((form) => {
        this.setupFormValidation(form);
    });

    // Set up AJAX form submission
    document.querySelectorAll("form[data-ajax]").forEach((form) => {
        this.setupAjaxForm(form);
    });
};

/**
 * Set up form validation
 * @param {HTMLElement} form - Form element
 */
ManuCore.setupFormValidation = function (form) {
    // Real-time validation on blur
    form.querySelectorAll("input, select, textarea").forEach((field) => {
        field.addEventListener("blur", () => this.validateField(field));
        field.addEventListener("input", () => this.clearFieldError(field));
    });

    // Validation on form submission
    form.addEventListener("submit", (e) => {
        if (!this.validateForm(form)) {
            e.preventDefault();
        }
    });
};

/**
 * Validate entire form
 * @param {HTMLElement} form - Form element
 * @returns {boolean} Whether form is valid
 */
ManuCore.validateForm = function (form) {
    let isValid = true;
    const fields = form.querySelectorAll(
        "input[required], select[required], textarea[required]"
    );

    fields.forEach((field) => {
        if (!this.validateField(field)) {
            isValid = false;
        }
    });

    return isValid;
};

/**
 * Validate individual form field
 * @param {HTMLElement} field - Form field element
 * @returns {boolean} Whether field is valid
 */
ManuCore.validateField = function (field) {
    const value = field.value.trim();
    const fieldContainer = field.closest(".form-group") || field.parentElement;
    let isValid = true;
    let errorMessage = "";

    // Clear previous errors
    this.clearFieldError(field);

    // Required field validation
    if (field.hasAttribute("required") && !value) {
        isValid = false;
        errorMessage = "This field is required";
    }

    // Email validation
    if (field.type === "email" && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = "Please enter a valid email address";
        }
    }

    // Phone validation
    if (field.type === "tel" && value) {
        const phoneRegex = /^[\+]?[\d\s\-\(\)]{10,}$/;
        if (!phoneRegex.test(value)) {
            isValid = false;
            errorMessage = "Please enter a valid phone number";
        }
    }

    // Number range validation
    if (field.type === "number" && value) {
        const min = parseFloat(field.min);
        const max = parseFloat(field.max);
        const num = parseFloat(value);

        if (!isNaN(min) && num < min) {
            isValid = false;
            errorMessage = `Value must be at least ${min}`;
        }
        if (!isNaN(max) && num > max) {
            isValid = false;
            errorMessage = `Value must be at most ${max}`;
        }
    }

    // Custom validation functions
    const customValidator = field.dataset.validator;
    if (customValidator && window[customValidator]) {
        const customResult = window[customValidator](value, field);
        if (customResult !== true) {
            isValid = false;
            errorMessage = customResult;
        }
    }

    // Show error if validation failed
    if (!isValid) {
        this.showFieldError(field, errorMessage);
    }

    return isValid;
};

/**
 * Display field error message
 * @param {HTMLElement} field - Form field element
 * @param {string} message - Error message
 */
ManuCore.showFieldError = function (field, message) {
    const fieldContainer = field.closest(".form-group") || field.parentElement;

    field.classList.add("form-input-error");

    let errorElement = fieldContainer.querySelector(".form-error");
    if (!errorElement) {
        errorElement = document.createElement("div");
        errorElement.className = "form-error";
        fieldContainer.appendChild(errorElement);
    }

    errorElement.textContent = message;
    errorElement.style.display = "block";
};

/**
 * Clear field error display
 * @param {HTMLElement} field - Form field element
 */
ManuCore.clearFieldError = function (field) {
    const fieldContainer = field.closest(".form-group") || field.parentElement;

    field.classList.remove("form-input-error");

    const errorElement = fieldContainer.querySelector(".form-error");
    if (errorElement) {
        errorElement.style.display = "none";
    }
};

/**
 * Set up AJAX form submission
 * @param {HTMLElement} form - Form element
 */
ManuCore.setupAjaxForm = function (form) {
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        // Validate before submission
        if (!this.validateForm(form)) {
            return;
        }

        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn?.textContent;

        try {
            // Show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<div class="spinner"></div> Processing...';
            }

            // Make AJAX request
            const response = await fetch(form.action, {
                method: form.method || "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    )?.content,
                },
            });

            const result = await response.json();

            if (response.ok) {
                this.showToast(
                    result.message || "Operation completed successfully",
                    "success"
                );

                // Handle redirects
                if (result.redirect) {
                    window.location.href = result.redirect;
                }

                // Reset form if requested
                if (result.reset) {
                    form.reset();
                }

                // Close modal if form is in a modal
                const modal = form.closest(".modal-backdrop");
                if (modal) {
                    this.closeModal(modal.id);
                }
            } else {
                throw new Error(result.message || "An error occurred");
            }
        } catch (error) {
            this.showToast(error.message, "error");
        } finally {
            // Restore button state
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        }
    });
};

// ================================================================
// SEARCH FUNCTIONALITY
// ================================================================

/**
 * Initialize search functionality
 */
ManuCore.initSearch = function () {
    const searchInputs = document.querySelectorAll(
        ".search-input, [data-search]"
    );

    searchInputs.forEach((input) => {
        let searchTimeout;

        input.addEventListener("input", (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.performSearch(e.target.value, e.target);
            }, this.config.debounceDelay);
        });

        // Global search hotkey (Ctrl+K or Cmd+K)
        document.addEventListener("keydown", (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === "k") {
                e.preventDefault();
                input.focus();
            }
        });
    });
};

/**
 * Perform search based on input type
 * @param {string} query - Search query
 * @param {HTMLElement} input - Search input element
 */
ManuCore.performSearch = function (query, input) {
    const searchType = input.dataset.search || "global";

    // Route to appropriate search handler
    switch (searchType) {
        case "customers":
            this.searchCustomers(query);
            break;
        case "products":
            this.searchProducts(query);
            break;
        case "orders":
            this.searchOrders(query);
            break;
        default:
            this.globalSearch(query);
    }
};

/**
 * Global search implementation
 * @param {string} query - Search query
 */
ManuCore.globalSearch = function (query) {
    if (query.length < 2) return;

    console.log("Global search:", query);
    // Implementation would make API call and display results
};

// ================================================================
// NOTIFICATION SYSTEM
// ================================================================

/**
 * Initialize notification panel
 */
ManuCore.initNotifications = function () {
    const notificationBtn = document.querySelector(
        "[data-notifications-toggle]"
    );
    const notificationPanel = document.querySelector(".notifications-panel");

    if (notificationBtn && notificationPanel) {
        // Toggle notification panel
        notificationBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            this.toggleNotifications();
        });

        // Close on outside click
        document.addEventListener("click", (e) => {
            if (
                !notificationPanel.contains(e.target) &&
                !notificationBtn.contains(e.target)
            ) {
                notificationPanel.classList.remove("show");
            }
        });

        // Mark notifications as read when clicked
        notificationPanel.addEventListener("click", (e) => {
            if (e.target.closest(".notification-item")) {
                const item = e.target.closest(".notification-item");
                item.classList.remove("unread");
                this.updateNotificationBadge();
            }
        });

        // Clear all notifications
        const clearBtn = notificationPanel.querySelector(
            ".notifications-clear"
        );
        if (clearBtn) {
            clearBtn.addEventListener("click", () => {
                notificationPanel
                    .querySelectorAll(".notification-item")
                    .forEach((item) => {
                        item.classList.remove("unread");
                    });
                this.updateNotificationBadge();
                this.showToast("All notifications marked as read", "info");
            });
        }
    }

    this.updateNotificationBadge();
};

/**
 * Toggle notification panel visibility
 */
ManuCore.toggleNotifications = function () {
    const panel = document.querySelector(".notifications-panel");
    if (panel) {
        panel.classList.toggle("show");
    }
};

/**
 * Update notification badge count
 */
ManuCore.updateNotificationBadge = function () {
    const unreadCount = document.querySelectorAll(
        ".notification-item.unread"
    ).length;
    const badge = document.querySelector(".header-notification-badge");

    if (badge) {
        if (unreadCount > 0) {
            badge.style.display = "block";
            badge.textContent = unreadCount > 9 ? "9+" : unreadCount;
        } else {
            badge.style.display = "none";
        }
    }
};

// ================================================================
// TAB SYSTEM
// ================================================================

/**
 * Initialize tab functionality
 */
ManuCore.initTabs = function () {
    document.querySelectorAll(".nav-tabs").forEach((tabGroup) => {
        const tabs = tabGroup.querySelectorAll(".nav-tab");

        tabs.forEach((tab) => {
            tab.addEventListener("click", (e) => {
                e.preventDefault();
                this.switchTab(tab, tabGroup);
            });
        });
    });
};

/**
 * Switch active tab
 * @param {HTMLElement} activeTab - Tab to activate
 * @param {HTMLElement} tabGroup - Tab group container
 */
ManuCore.switchTab = function (activeTab, tabGroup) {
    const tabs = tabGroup.querySelectorAll(".nav-tab");

    // Remove active state from all tabs
    tabs.forEach((tab) => tab.classList.remove("active"));

    // Activate clicked tab
    activeTab.classList.add("active");

    // Show corresponding panel
    const targetId =
        activeTab.getAttribute("data-tab-target") ||
        activeTab.getAttribute("href")?.slice(1);
    if (targetId) {
        // Hide all panels
        document.querySelectorAll(".tab-panel").forEach((panel) => {
            panel.style.display = "none";
        });

        // Show target panel
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
            targetPanel.style.display = "block";
        }
    }

    // Notify components
    activeTab.dispatchEvent(
        new CustomEvent("tab-changed", {
            detail: { target: targetId },
        })
    );
};

// ================================================================
// TOOLTIP SYSTEM
// ================================================================

/**
 * Initialize tooltips for elements with data-tooltip
 */
ManuCore.initTooltips = function () {
    document.querySelectorAll("[data-tooltip]").forEach((element) => {
        this.setupTooltip(element);
    });
};

/**
 * Set up tooltip for specific element
 * @param {HTMLElement} element - Element to add tooltip to
 */
ManuCore.setupTooltip = function (element) {
    const tooltipText = element.getAttribute("data-tooltip");
    const position = element.getAttribute("data-tooltip-position") || "top";

    let tooltip = null;

    element.addEventListener("mouseenter", () => {
        tooltip = this.createTooltip(tooltipText, position);
        document.body.appendChild(tooltip);
        this.positionTooltip(tooltip, element, position);
    });

    element.addEventListener("mouseleave", () => {
        if (tooltip) {
            tooltip.remove();
            tooltip = null;
        }
    });
};

/**
 * Create tooltip element
 * @param {string} text - Tooltip text
 * @param {string} position - Tooltip position
 * @returns {HTMLElement} Tooltip element
 */
ManuCore.createTooltip = function (text, position) {
    const tooltip = document.createElement("div");
    tooltip.className = `tooltip tooltip-${position}`;
    tooltip.textContent = text;
    tooltip.style.cssText = `
        position: absolute;
        z-index: 60;
        padding: 8px 12px;
        font-size: 12px;
        background: var(--neutral-900);
        color: white;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s;
    `;

    // Fade in animation
    setTimeout(() => {
        tooltip.style.opacity = "1";
    }, 10);

    return tooltip;
};

/**
 * Position tooltip relative to target element
 * @param {HTMLElement} tooltip - Tooltip element
 * @param {HTMLElement} element - Target element
 * @param {string} position - Desired position
 */
ManuCore.positionTooltip = function (tooltip, element, position) {
    const rect = element.getBoundingClientRect();
    const tooltipRect = tooltip.getBoundingClientRect();

    switch (position) {
        case "top":
            tooltip.style.left =
                rect.left + rect.width / 2 - tooltipRect.width / 2 + "px";
            tooltip.style.top = rect.top - tooltipRect.height - 8 + "px";
            break;
        case "bottom":
            tooltip.style.left =
                rect.left + rect.width / 2 - tooltipRect.width / 2 + "px";
            tooltip.style.top = rect.bottom + 8 + "px";
            break;
        case "left":
            tooltip.style.left = rect.left - tooltipRect.width - 8 + "px";
            tooltip.style.top =
                rect.top + rect.height / 2 - tooltipRect.height / 2 + "px";
            break;
        case "right":
            tooltip.style.left = rect.right + 8 + "px";
            tooltip.style.top =
                rect.top + rect.height / 2 - tooltipRect.height / 2 + "px";
            break;
    }
};

// ================================================================
// SWEETALERT2 INTEGRATION
// ================================================================

/**
 * Initialize SweetAlert2 with ManuCore styling
 */
ManuCore.initSweetAlert = function () {
    if (window.Swal) {
        // Set default configuration to match ManuCore theme
        Swal.mixin({
            confirmButtonColor: "var(--brand-600)",
            cancelButtonColor: "#6b7280",
            customClass: {
                popup: "manucore-swal-popup",
                title: "manucore-swal-title",
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-secondary",
            },
        });
    }
};

/**
 * Show delete confirmation dialog
 * @param {string} title - Dialog title
 * @param {string} text - Dialog text
 * @returns {Promise} SweetAlert2 promise
 */
ManuCore.confirmDelete = function (
    title = "Are you sure?",
    text = "You won't be able to revert this!"
) {
    return Swal.fire({
        title: title,
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc2626",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
    });
};

/**
 * Show success dialog
 * @param {string} title - Success title
 * @param {string} text - Success message
 * @returns {Promise} SweetAlert2 promise
 */
ManuCore.showSuccess = function (title, text = "") {
    return Swal.fire({
        title: title,
        text: text,
        icon: "success",
        confirmButtonColor: "var(--brand-600)",
    });
};

/**
 * Show error dialog
 * @param {string} title - Error title
 * @param {string} text - Error message
 * @returns {Promise} SweetAlert2 promise
 */
ManuCore.showError = function (title, text = "") {
    return Swal.fire({
        title: title,
        text: text,
        icon: "error",
        confirmButtonColor: "#dc2626",
    });
};

/**
 * Show loading dialog
 * @param {string} title - Loading title
 * @param {string} text - Loading message
 * @returns {Promise} SweetAlert2 promise
 */
ManuCore.showLoading = function (
    title = "Processing...",
    text = "Please wait"
) {
    return Swal.fire({
        title: title,
        text: text,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });
};

// ================================================================
// CRUD OPERATIONS
// ================================================================

/**
 * Handle single item deletion with confirmation
 * @param {string} url - Delete endpoint URL
 * @param {string} itemName - Item name for messaging
 */
ManuCore.handleDelete = async function (url, itemName = "item") {
    const result = await this.confirmDelete(
        `Delete ${itemName}?`,
        `This ${itemName} will be permanently deleted.`
    );

    if (result.isConfirmed) {
        try {
            this.showLoading("Deleting...", `Removing ${itemName}`);

            const response = await fetch(url, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    )?.content,
                    Accept: "application/json",
                },
            });

            const data = await response.json();

            if (response.ok) {
                await this.showSuccess(
                    "Deleted!",
                    `${itemName} has been deleted.`
                );
                window.location.reload();
            } else {
                throw new Error(data.message || "Delete failed");
            }
        } catch (error) {
            this.showError("Error!", error.message);
        }
    }
};

/**
 * Handle bulk deletion of multiple items
 * @param {Array} selectedItems - Array of item IDs
 * @param {string} baseUrl - Base API URL
 */
ManuCore.handleBulkDelete = async function (selectedItems, baseUrl) {
    if (selectedItems.length === 0) {
        this.showToast("No items selected", "warning");
        return;
    }

    const result = await this.confirmDelete(
        `Delete ${selectedItems.length} items?`,
        "These items will be permanently deleted."
    );

    if (result.isConfirmed) {
        try {
            this.showLoading(
                "Deleting...",
                `Removing ${selectedItems.length} items`
            );

            const response = await fetch(`${baseUrl}/bulk-delete`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    )?.content,
                    Accept: "application/json",
                },
                body: JSON.stringify({ ids: selectedItems }),
            });

            const data = await response.json();

            if (response.ok) {
                await this.showSuccess(
                    "Deleted!",
                    `${selectedItems.length} items deleted.`
                );
                window.location.reload();
            } else {
                throw new Error(data.message || "Bulk delete failed");
            }
        } catch (error) {
            this.showError("Error!", error.message);
        }
    }
};

// ================================================================
// GLOBAL EVENT BINDING
// ================================================================

/**
 * Bind global event listeners
 * Handles clicks, keyboard shortcuts, and window events
 */
ManuCore.bindGlobalEvents = function () {
    // Theme and accent toggle handlers
    document.addEventListener("click", (e) => {
        // Dark mode toggle
        if (
            e.target.matches(".dark-mode-toggle") ||
            e.target.closest(".dark-mode-toggle")
        ) {
            this.toggleTheme();
        }

        // Accent picker buttons
        const accentBtn = e.target.closest("[data-accent-choice]");
        if (accentBtn) {
            const choice = accentBtn.getAttribute("data-accent-choice");
            if (choice) {
                this.setAccent(choice);
            }
        }
    });

    // Sidebar toggle handlers
    document.addEventListener("click", (e) => {
        if (
            e.target.matches(".header-toggle, .sidebar-toggle") ||
            e.target.closest(".header-toggle, .sidebar-toggle")
        ) {
            if (window.innerWidth <= 768) {
                this.toggleMobileSidebar();
            } else {
                this.toggleSidebar();
            }
        }
    });

    // Modal trigger handlers
    document.addEventListener("click", (e) => {
        // Open modal
        if (
            e.target.matches("[data-modal-open]") ||
            e.target.closest("[data-modal-open]")
        ) {
            e.preventDefault();
            const trigger = e.target.closest("[data-modal-open]");
            const modalId = trigger.getAttribute("data-modal-open");
            this.openModal(modalId);
        }

        // Close modal
        if (
            e.target.matches("[data-modal-close]") ||
            e.target.closest("[data-modal-close]")
        ) {
            e.preventDefault();
            const modal = e.target.closest(".modal-backdrop");
            if (modal) {
                this.closeModal(modal.id);
            }
        }
    });

    // Delete action handlers
    document.addEventListener("click", (e) => {
        if (
            e.target.matches("[data-delete-url]") ||
            e.target.closest("[data-delete-url]")
        ) {
            e.preventDefault();
            const trigger = e.target.closest("[data-delete-url]");
            const url = trigger.getAttribute("data-delete-url");
            const itemName = trigger.getAttribute("data-item-name") || "item";
            this.handleDelete(url, itemName);
        }
    });

    // Navigation submenu toggles
    document.addEventListener("click", (e) => {
        if (
            e.target.matches(".nav-item.has-submenu > .nav-link") ||
            e.target.closest(".nav-item.has-submenu > .nav-link")
        ) {
            e.preventDefault();
            const navItem = e.target.closest(".nav-item");
            navItem.classList.toggle("open");
        }
    });

    // Window resize handler
    window.addEventListener("resize", () => {
        this.updateMainContentMargin();

        // Close mobile sidebar on desktop resize
        if (window.innerWidth > 768) {
            const sidebar = document.querySelector(".sidebar");
            if (sidebar) {
                sidebar.classList.remove("mobile-open");
                const backdrop = document.querySelector(".sidebar-backdrop");
                if (backdrop) backdrop.remove();
            }
        }
    });

    // Filter chip removal
    document.addEventListener("click", (e) => {
        if (e.target.matches(".filter-chip-remove")) {
            e.stopPropagation();
            e.target.closest(".filter-chip").remove();
        }
    });

    // Keyboard shortcuts
    document.addEventListener("keydown", (e) => {
        // Ctrl/Cmd + D for dark mode toggle
        if ((e.ctrlKey || e.metaKey) && e.key === "d") {
            e.preventDefault();
            this.toggleTheme();
        }

        // Ctrl/Cmd + B for sidebar toggle
        if ((e.ctrlKey || e.metaKey) && e.key === "b") {
            e.preventDefault();
            this.toggleSidebar();
        }
    });
};

// ================================================================
// UTILITY FUNCTIONS
// ================================================================

/**
 * Debounce function calls
 * @param {Function} func - Function to debounce
 * @param {number} wait - Wait time in milliseconds
 * @returns {Function} Debounced function
 */
ManuCore.debounce = function (func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
};

/**
 * Throttle function calls
 * @param {Function} func - Function to throttle
 * @param {number} limit - Time limit in milliseconds
 * @returns {Function} Throttled function
 */
ManuCore.throttle = function (func, limit) {
    let inThrottle;
    return function (...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
};

/**
 * Format currency for South African context
 * @param {number} amount - Amount to format
 * @param {string} currency - Currency code (default: ZAR)
 * @returns {string} Formatted currency string
 */
ManuCore.formatCurrency = function (amount, currency = "ZAR") {
    return new Intl.NumberFormat("en-ZA", {
        style: "currency",
        currency: currency,
    }).format(amount);
};

/**
 * Format date for South African context
 * @param {Date|string} date - Date to format
 * @param {string} format - Format type (short, long, datetime)
 * @returns {string} Formatted date string
 */
ManuCore.formatDate = function (date, format = "short") {
    const options = {
        short: { year: "numeric", month: "short", day: "numeric" },
        long: { year: "numeric", month: "long", day: "numeric" },
        datetime: {
            year: "numeric",
            month: "short",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
        },
    };

    return new Intl.DateTimeFormat("en-ZA", options[format]).format(
        new Date(date)
    );
};

/**
 * Get selected table row IDs
 * @param {string} tableId - Table element ID
 * @returns {Array} Array of selected row IDs
 */
ManuCore.getSelectedTableRows = function (tableId) {
    const table = document.getElementById(tableId);
    if (!table) return [];

    return Array.from(table.querySelectorAll(".select-row:checked")).map(
        (checkbox) => {
            return checkbox.closest("tr").dataset.id || checkbox.value;
        }
    );
};

// ================================================================
// DEBUG HELPERS
// ================================================================

/**
 * Debug utilities for console access
 */
ManuCore.debug = {
    // Current theme and accent state
    current: () => ({
        theme: document.documentElement.getAttribute("data-theme"),
        accent: document.documentElement.getAttribute("data-accent"),
        config: ManuCore.config,
    }),

    // Accent-specific debugging
    accent: {
        current: () => ManuCore.getCurrentAccent(),
        theme: () => document.documentElement.getAttribute("data-theme"),
        test: (accent) => {
            console.log(`Testing accent: ${accent}`);
            ManuCore.setAccent(accent);
        },
        testAll: () => {
            let index = 0;
            const interval = setInterval(() => {
                if (index >= ManuCore.allowedAccents.length) {
                    clearInterval(interval);
                    console.log("Accent test complete");
                    return;
                }
                ManuCore.setAccent(ManuCore.allowedAccents[index]);
                index++;
            }, 2000);
        },
    },

    // System state inspection
    inspect: {
        sidebar: () => ({
            collapsed: document
                .querySelector(".sidebar")
                ?.classList.contains("collapsed"),
            mobileOpen: document
                .querySelector(".sidebar")
                ?.classList.contains("mobile-open"),
        }),
        modals: () => document.querySelectorAll(".modal-backdrop.show").length,
        dropdowns: () =>
            document.querySelectorAll(".dropdown-menu.show").length,
        toasts: () => document.querySelectorAll(".toast").length,
    },
};

// ================================================================
// INITIALIZATION
// ================================================================

/**
 * Initialize ManuCore when DOM is ready
 */
document.addEventListener("DOMContentLoaded", function () {
    ManuCore.init();
});

// Export for global access
window.ManuCore = ManuCore;

// Development logging
console.log("🎨 ManuCore ERP System Loaded");
console.log("Available accents:", ManuCore.allowedAccents);
console.log("Debug helpers available via ManuCore.debug");
