const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'body': 'linear-gradient(180deg,#F1F8FF 0%,#FEEEEF 40.94%,#FFFFFF 56.56%)',
            },
            colors:{
                'dark': '#2c383f',
                'base-primary': '#464646',
                'orange' : 'rgb(255 95 83)'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
