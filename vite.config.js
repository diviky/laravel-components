import { defineConfig } from 'vite';
import { resolve } from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/assets/easymde.js', 'resources/assets/tinymce.js'],
            refresh: true,
        }),
    ],
    build: {
        lib: {
            entry: resolve(__dirname, 'resources/assets/quill.js'),
            name: 'quillEditor',
            fileName: (format) => `quill.${format}.js`,
        },
        rollupOptions: {
            external: ['quill'],
            input: {
                'lexical-editor': resolve(__dirname, 'resources/assets/lexical-editor.js'),
                'tiptap-editor': resolve(__dirname, 'resources/assets/js/tiptap-editor.js'),
            },
            output: {
                globals: {
                    quill: 'Quill',
                },
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
                manualChunks: {
                    tinymce: ['tinymce'],
                },
            },
        },
        minify: 'terser',
        sourcemap: true,
        outDir: 'public/build',
    },
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources'),
            '~': resolve(__dirname, 'resources'),
            '/node_modules': '/node_modules',
        },
    },
});
