module.exports = {
    important: true,
    mode: 'jit',
    purge: [
        //'./storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        //'./resources/**/*.vue'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            center: true,
            padding: '2rem'
        },
        extend: {
            fontFamily: {
                'roboto': ['"Roboto"']
            },
            borderWidth: {
                '3': '3px',
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active']
        },
    },
    plugins: [],
}
