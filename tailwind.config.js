/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins"],
                nunito: ["Nunito"],
                montserrat: ["Montserrat"],
                ubuntu: ["Ubuntu"],
            },
            colors: {
                primary: "#232946",
                secondary: "#4b5563",
                
            },
            container: {
                center: true,
                padding: "16px",
            },
        },

    },
    plugins: [],
};
