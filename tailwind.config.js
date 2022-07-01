/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a"}
            },
            fontFamily: {
                'body': [
                    'Inter',  'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto',
                    ...defaultTheme.fontFamily.sans],
                sans: [
                    'Inter',  'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto',
                    ...defaultTheme.fontFamily.sans]
                //'body': ['Inter', 'Nunito', ...defaultTheme.fontFamily.sans],
                //sans: ['Inter', 'Nunito', ...defaultTheme.fontFamily.sans]
            }
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
