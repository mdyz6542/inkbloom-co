import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'blush':    '#FFD4DE',
                'matcha':   '#D4E9D0',
                'lilac':    '#E4D6FF',
                'butter':   '#FFF2C4',
                'paper':    '#FFFBF5',
                'cherry':   '#FF4D6D',
                'plum':     '#3D2B4F',
                'fog':      '#8B8094',
                'cloud':    '#F4F0F6',
            },
            fontFamily: {
                heading: ['Fredoka', ...defaultTheme.fontFamily.sans],
                display: ['Fredoka', ...defaultTheme.fontFamily.sans],
                body:    ['Poppins', ...defaultTheme.fontFamily.sans],
                accent:  ['Caveat', ...defaultTheme.fontFamily.sans],
                hand:    ['Caveat', ...defaultTheme.fontFamily.sans],
                sans:    ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                '2xl': '1rem',
                '3xl': '1.5rem',
                '4xl': '2rem',
                '5xl': '2.5rem',
            },
            boxShadow: {
                'cherry': '0 4px 0 #C53251',
                'soft':   '0 8px 30px rgba(61,43,79,0.08)',
                'gummy':  '0 6px 0 rgba(61,43,79,0.12), 0 10px 24px rgba(61,43,79,0.12)',
                'card':   '0 2px 16px 0 rgba(61,43,79,0.06)',
            },
        },
    },

    plugins: [forms],
};
