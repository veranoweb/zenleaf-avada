module.exports = {
    purge: {
        enabled: true,
        content: [
            './src/*.html',
            './public/wp-content/themes/zenleaf-custom-theme/*.php',
            './public/wp-content/themes/zenleaf-custom-theme/template-parts/*.php',
        ],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            screens: {
                'sm': '768px',
                // => @media (min-width: 640px) { ... }
            },
        },
        fontSize: {
            'xs': '.75rem',
            'sm': '.875rem',
            'tiny': '.875rem',
            'base': '18px',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '4rem',
            '7xl': '5rem',
        },
        fontFamily: {
          'heading': ['Norwester'],
          'subheading': ['Nourd-Bold'],
          'body': ['FiraSansCondensed-Regular'],
        }

    },
    variants: {
        extend: {
            fontWeight: ['hover'],
        }
    },
    plugins: [],
}