import { defineConfig } from 'vite';
export default defineConfig({
    build: {
        manifest: true,
        outDir: 'dist',
        rollupOptions: {
            input: {
                main: 'assets/js/main.js',
                style: 'assets/css/style.scss'
            },
            output: {
                entryFileNames: 'js/[name].[hash].js',
                chunkFileNames: 'js/[name].[hash].js',
                assetFileNames: ({name}) => {
                    if (/\.css$/.test(name)) {
                        return 'css/[name].[hash][extname]';
                    }
                    return 'assets/[name].[hash][extname]';
                }
            }
        }
    },
    server: {
        origin: 'http://localhost:3000'
    }
});