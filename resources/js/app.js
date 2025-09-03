// resources/js/app.js
import "./bootstrap";

// --- Alpine (load once) ---
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// --- SweetAlert2 (global) ---
import Swal from "sweetalert2";
window.Swal = Swal;
