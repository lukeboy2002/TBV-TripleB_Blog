import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-body': theme('colors.gray[700]'),
                        '--tw-prose-headings': theme('colors.gray[700]'),
                        '--tw-prose-lead': theme('colors.gray[700]'),
                        '--tw-prose-links': theme('colors.orange[700]'),
                        '--tw-prose-bold': theme('colors.gray[700]'),
                        '--tw-prose-counters': theme('colors.gray[700]'),
                        '--tw-prose-bullets': theme('colors.gray[700]'),
                        '--tw-prose-hr': theme('colors.gray[700]'),
                        '--tw-prose-quotes': theme('colors.gray[700]'),
                        '--tw-prose-quote-borders': theme('colors.gray[700]'),
                        '--tw-prose-captions': theme('colors.gray[700]'),
                        '--tw-prose-code': theme('colors.gray[700]'),
                        '--tw-prose-pre-code': theme('colors.gray[700]'),
                        '--tw-prose-pre-bg': theme('colors.gray[700]'),
                        '--tw-prose-th-borders': theme('colors.gray[700]'),
                        '--tw-prose-td-borders': theme('colors.gray[700]'),

                        '--tw-prose-invert-body': theme('colors.orange[500]'),
                        '--tw-prose-invert-headings': theme('colors.white'),
                        '--tw-prose-invert-lead': theme('colors.orange[500]'),
                        '--tw-prose-invert-links': theme('colors.orange[500]'),
                        '--tw-prose-invert-bold': theme('colors.orange[500]'),
                        '--tw-prose-invert-counters': theme('colors.orange[400]'),
                        '--tw-prose-invert-bullets': theme('colors.orange[600]'),
                        '--tw-prose-invert-hr': theme('colors.orange[700]'),
                        '--tw-prose-invert-quotes': theme('colors.orange[500]'),
                        '--tw-prose-invert-quote-borders': theme('colors.orange[500]'),
                        '--tw-prose-invert-captions': theme('colors.orange[400]'),
                        '--tw-prose-invert-code': theme('colors.white'),
                        '--tw-prose-invert-pre-code': theme('colors.orange[300]'),
                        '--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
                        '--tw-prose-invert-th-borders': theme('colors.orange[600]'),
                        '--tw-prose-invert-td-borders': theme('colors.orange[700]'),
                    },
                },
            }),
        },
    },

    plugins: [
        forms,
        typography,
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/container-queries'),
        require('flowbite/plugin'),
    ],
};
