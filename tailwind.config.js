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
            'sm': '14px',
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
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'black': '#000',
            'white': '#FFF',
            'silver': '#CCCCCC',
            'gallery': '#EDEDED',
            'davys-grey': '#474747',
            'gray-100': '#EDEDED',
            'gray-200': '#CCC',
            'gray-700': '#333333',
            'gray-900': '#1F1F1F',
            'jet-black': '#333333',
            'eeire-black': '#1F1F1F',
            'sage': '#C6C9A6',
            'melon': '#EAA899',
            'baby-blue-eyes': '#A3C8F5',
            'burlywood': '#DEB27C',
            'alabaster': '#E7E8D9',
            'beige': '#D6D8C0',
            'misty-moss': '#A5AC71',
            'moss-green': '#888E54',
            'champagne-pink': '#F5E3DD',
            'unbleached-silk': '#ECC8BD',
            'middle-red': '#DA9178',
            'copper-red': '#D27858',
            'alice-blue': '#EDF4FD',
            'beau-blue': '#C8DDF9',
            'french-sky-blue': '#7EB2F1',
            'little-boy-blue': '#5A9CED',
            'old-lace': '#F5ECDE',
            'yellow-400': '#E7D3B1', 
            'dutch-white': '#E7D3B1',
            'indian-yellow': '#D49A4B',
            'copper': '#B5792E',
      },
        

    },
    variants: {
        extend: {
            fontWeight: ['hover'],
        }
    },
    
    plugins: [],
}