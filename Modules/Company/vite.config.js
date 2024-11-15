import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    build: {
        outDir: "../../public/build/company",
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: "../../public",
            buildDirectory: "build/company",
            input: [
                __dirname + "/resources/assets/css/app.css",
                __dirname + "/resources/assets/js/app.js",
            ],
            refresh: true,
        }),
    ],
});

export const paths = [
    "Modules/Company/resources/assets/css/app.css",
    "Modules/Company/resources/assets/js/app.js",
];
