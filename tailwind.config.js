module.exports = {
    purge: {
        enabled: true,
        content: [
            './src/*.html',
            './src/safelist.txt',
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
            'xs': '10px',
            'sm': '12px',
            'tiny': '14px',
            'base': '18px',
            'lg': '22px',
            'xl': '28px',
            '2xl': '36px',
            '3xl': '44px',
            '4xl': '55px',
            '5xl': '68px',
            '6xl': '86px',
            '7xl': '107px',
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