import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/admin-lte/dist/css/adminlte.min.css',
                    dest: 'vendor/adminlte/dist/css'
                },
                {
                    src: 'node_modules/admin-lte/dist/js/adminlte.min.js',
                    dest: 'vendor/adminlte/dist/js'
                },
                {
                    src: 'node_modules/bootstrap/dist/css/bootstrap.min.css',
                    dest: 'vendor/adminlte/plugins/bootstrap/css'
                },
                {
                    src: 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
                    dest: 'vendor/adminlte/plugins/bootstrap/js'
                },
                {
                    src: 'node_modules/jquery/dist/jquery.min.js',
                    dest: 'vendor/adminlte/plugins/jquery'
                },
                {
                    src: 'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
                    dest: 'vendor/adminlte/plugins/fontawesome-free/css'
                },
                {
                    src: 'node_modules/@fortawesome/fontawesome-free/webfonts',
                    dest: 'vendor/adminlte/plugins/fontawesome-free/webfonts'
                }
            ]
        })
    ],
});
