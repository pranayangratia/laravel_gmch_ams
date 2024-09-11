/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            "blue":'#222831',
            "lighter-blue":'#2d3544',
            "light-blue":'#357579',
            "white":'#EEEEEE',
            "full-white":'#ffffff',
            "cyan":'#76ABAE',
            "red":'#f43063',
            "gray":'#31363F',
            "cyan-dark":'#4ca7ad',
            "block":'#505050',
            "light-gray":'#c2c2c2',

        },
        extend: {
            fontFamily: {
                "Italiana":["Italiana", "sans-serif"],
            }

        },

    },
    plugins: [],
}

