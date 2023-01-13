/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#009CFF",
                secondary: "#FF621F",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
