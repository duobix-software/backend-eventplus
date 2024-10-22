import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react"

export default defineConfig(({ mode }) => {
    const envDir = "../../../";

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
                hotFile: "../../public/admin-default-vite.hot",
                publicDirectory: '../../public',
                buildDirectory: 'build/admin',
                input: [
                    __dirname + '/resources/assets/js/app.tsx',
                    __dirname + '/resources/assets/css/app.css'
                ],
                refresh: true,
            }),
        ],
    }

});

export const paths = [
   'Modules/Admin/resources/assets/css/app.css',
   'Modules/Admin/resources/assets/js/app.tsx',
];