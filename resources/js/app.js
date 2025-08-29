import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Import SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

// Theme system
document.addEventListener('DOMContentLoaded', function() {
    // Get saved theme from localStorage (will be from session/DB in Phase 1)
    const savedTheme = localStorage.getItem('theme') || 'blue';
    document.documentElement.setAttribute('data-theme', savedTheme);
    
    // Update theme selector if it exists
    const themeSelector = document.getElementById('theme-selector');
    if (themeSelector) {
        themeSelector.value = savedTheme;
        themeSelector.addEventListener('change', function() {
            const newTheme = this.value;
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }
});

console.log('ManuCore ERP - Phase 0 Bootstrap Loaded');
