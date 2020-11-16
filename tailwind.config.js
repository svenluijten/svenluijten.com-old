module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/**/*.blade.php',
  ],
  theme: {
  screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
  },
    extend: {},
  },
  variants: {},
  plugins: [],
}
