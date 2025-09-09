import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/theme.css",
                "resources/css/front.css",
                "resources/css/app.css",
                "resources/css/panel.css",
                "resources/css/dark-mode.css", // Add this
                "resources/js/app.js",
                "resources/js/manucore.js", // Add this
            ],
            refresh: true,
        }),
    ],
});
