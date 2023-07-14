const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '', // Green
                    50:  '#e8ffe4',
                    100: '#caffc4',
                    200: '#9aff90',
                    300: '#59ff50',
                    400: '#04ff00',
                    500: '#00e602',
                    600: '#00b806',
                    700: '#008b05',
                    800: '#076d0c',
                    900: '#0b5c10',
                    950: '#003406',
                },
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
