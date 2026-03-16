/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#FFC900',
        secondary: '#FFDD00',
        dark: '#1E1E1E',
        'dark-light': '#4D4D4D' // Added custom color
      }
    }
  }
}