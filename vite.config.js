import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/reset.css',
                'resources/css/admin.css',
                'resources/css/akb.css',
                'resources/css/login.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
