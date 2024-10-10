import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    plugins: [
        forms,
        daisyui,
    ],

    daisyui: {
        themes: [
            {
                mytheme: {

                    "primary": "#F06543",

                    "secondary": "#ffe347",

                    "accent": "#6457a6",

                    "neutral": "#264653",

                    "info": "#00e4ff",

                    "success": "#23f0c7",

                    "warning": "#b53c00",

                    "error": "#f14250",
                },
            },
        ],
    },
};
