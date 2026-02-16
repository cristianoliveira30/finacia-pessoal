import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    // --- ADICIONE ESTE BLOCO ABAIXO ---
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost', // O IP que pegamos no passo anterior
        },
    },
});
