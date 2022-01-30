module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'black': '#0C083C',
        'prime': '#312B78',
        'grey': '#746E6E',
        'green': '#1BB13C',
        'yellow': '#F3A939',
        'overlay': '#F1F0FF',
        'smoke': '#E5E5E5',
        'ghost': 'rgba(116, 110, 110, 0.4);'
      },
    },
    fontWeight: {
      hairline: 100,
      'extra-light': 100,
      thin: 200,
      light: 300,
      normal: 400,
      medium: 500,
      semibold: 600,
      bold: 700,
      extrabold: 800,
      'extra-bold': 800,
      black: 900,
    },
    borderWidth: {
      '1': '1px'
    },
    dropShadow: {
      't-lg': '0 -10px 10px rgba(0, 0, 0, 0.25)',
    }
  },
  variants: {
    display: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [],
}
