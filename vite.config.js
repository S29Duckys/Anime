import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/pages/login.css",
                "resources/css/pages/register.css",
                "resources/css/pages/catalogue.css",
                "resources/js/app.js",
                "resources/js/components/cursorAnimation.js",
                "resources/js/pages/login.js",
                "resources/js/pages/register.js",
                "resources/js/pages/catalogue.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
