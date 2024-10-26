import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react"
import { resolve } from 'path';

export default defineConfig(({ mode }) => {
    const envDir = "../../";

    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        build: {
            outDir: '../../public/build/admin',
            emptyOutDir: true,
            manifest: true,
        },
        plugins: [
            react(),
            laravel({
                hotFile: resolve(__dirname, "../../public/admin-default-vite.hot"),
                publicDirectory: resolve(__dirname, '../../public'),
                buildDirectory: 'build/admin',
                input: [
                    __dirname + '/resources/js/app.tsx',
                    __dirname + '/resources/css/app.css'
                ],
                refresh: true,
            }),
        ],
    }

});
