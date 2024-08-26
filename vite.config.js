import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app-trivia.css',
                'resources/css/app-chatbot.css',
                'resources/css/normalize.css',
                'resources/sass/welcome.scss',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/app-trivia.js',
                'resources/js/app-chatbot.js',
            ],
            refresh: true,
        }),
    ],
});
