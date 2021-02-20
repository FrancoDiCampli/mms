const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primary: {
                    100: '#5BD9D9',
                    200: '#04CCCC',
                    300: '#04BFBF',
                    400: '#03A6A6',
                    500: '#038080',
                },
                
                secondary: {
                    100: '#009ADB',
                    200: '#2B718F',
                    300: '#00648F',
                    400: '#1C495C',
                    500: '#002E42',
                },

                background: '#F4F7FC',
                hover: '#F2F7FF',
                
                table: {
                    header: '#F5F6FA'
                },

                text: {
                    base: '#171725',
                    100: '#E6E9F4',
                    200: '#D7DBEC',
                    300: '#7E84A3',
                    400: '#5A607F',
                    500: '#131523',                    
                },

                notification: {
                    danger: '#F0142F',
                    info: '#57B8FF',
                    warning: '#FFC700',
                    warning2: '#FFC700',
                    success: '#21D59B',
                    light: '#D5D7E3',
                }
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [],
};
