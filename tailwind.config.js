import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
import containerQueries from "@tailwindcss/container-queries";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                // Match our project’s preferred face
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms, typography, containerQueries],
};
