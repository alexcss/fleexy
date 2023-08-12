const purgeCss = require('@fullhuman/postcss-purgecss')
const autoprefixer = require('autoprefixer');

module.exports = {
  plugins: [
    autoprefixer(),
    process.env.NODE_ENV === 'production' && (
      purgeCss({
        content: ['./**/*.twig',],
        skippedContentGlobs: ['./node_modules/**'],
        css: ['./dist/assets/*.css'],
        safelist: {
          deep: [/modal$/, /modal-backdrop$/, /fade/, /show/, /offcanvas$/],
        }
      })
    )
  ]
}
