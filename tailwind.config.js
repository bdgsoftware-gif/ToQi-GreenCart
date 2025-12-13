import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            screens: {
                "8xl": "88rem",
                "9xl": "96rem",
                "10xl": "104rem",
            },
            maxWidth: {
                "8xl": "88rem",
                "9xl": "96rem",
                "10xl": "104rem",
            },
            fontFamily: {
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
