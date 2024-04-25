import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'wc-red-000' : '#FFC9C9',
            'wc-red-100' : '#FF9A9A',
            'wc-red-200' : '#FF7E7E',
            'wc-red-300' : '#FF6363',
            'wc-red-400' : '#FF4949',
            'wc-black-000' : '#9B9B9B',
            'wc-black-100' : '#686868',
            'wc-black-200' : '#535353',
            'wc-black-300' : '#353535',
            'wc-black-400' : '#161616',
        }
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};
