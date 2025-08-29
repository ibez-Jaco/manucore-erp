import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/front.css',
                'resources/css/app.css',
                'resources/css/panel.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
