const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#d74919',
                    50:  '#fef6ee',
                    100: '#fcead8',
                    200: '#f9d0af',
                    300: '#f5af7c',
                    400: '#ef8448',
                    500: '#eb6424',
                    600: '#d74919',
                    700: '#b73817',
                    800: '#922d1a',
                    900: '#752819',
                    950: '#3f110b',
                },
                // test: { 1: '#afa', 2: '#aaf', 3: '#faa', 4: '#aff' }
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
