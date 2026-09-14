import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    DEFAULT: '#0d6e60', // hoomeee signature green
                    dark: '#1c1c1e',    // Cognify signature dark
                },
                'brand-red': {
                    50: '#fdf2f3',
                    100: '#fbe5e7',
                    200: '#f7cdd0',
                    300: '#f2a6ab',
                    400: '#ec727a',
                    500: '#d10a14', // Core Vivid Primary Red
                    600: '#b8050e',
                    700: '#990209',
                    800: '#7e070d',
                    900: '#680b11',
                    950: '#3a0206',
                }
            }
        },
    },

    plugins: [forms],
};
