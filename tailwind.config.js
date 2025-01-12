/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        'primary': '#202225',
        'secondary': '#5865f2',
        gray: colors.trueGray,
        gray: {
          900: '#202225',
          800: '#2f3136',
          700: '#36393f',
          600: '#4f545c',
          400: '#d4d7dc',
          300: '#e3e5e8',
          200: '#ebedef',
          100: '#f2f3f5',
        },
        'm-red': '#C8102E',
        'm-darkblue': '#1C3F94',
        'm-blue': '#3994D0',
        'm-purple': '#6A0DAD',
      },

      width: {
        50: '12.5rem',
      },

      height: {
        29: '7.25rem',
        30: '7.5rem',
        30.5: '7.67rem',
        31: '7.75rem',
        50: '12.5rem',
        76: '19rem',
        88: '22rem',
        92: '23rem',
        140: '35rem',
      },

      spacing: {
        38: '9.5rem',
        112: '28rem',
        120: '30rem',
        128: '32rem',
        136: '34rem',
        144: '36rem',
        152: '38rem',
        160: '40rem',
        168: '42rem',
        176: '44rem',
      },

      backgroundImage: {
        'turbo-pattern': "url('/public/assets/pattern/turbo-engine.png')"
      }
    },
  },
  plugins: [],
}

