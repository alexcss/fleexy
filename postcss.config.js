const purgeCss = require('@fullhuman/postcss-purgecss')
const autoprefixer = require('autoprefixer')

module.exports = {
  plugins: [
    autoprefixer(),
    process.env.NODE_ENV === 'production' && (
      purgeCss({
        content: ['./**/*.twig', './**/*.php', './**/*.js',],
        skippedContentGlobs: ['./node_modules/**'],
        css: ['./dist/*.css'],
        safelist: {
          standard: [/text-primary/, /text-green/, /text-blue/, /border-primary/, /border-green/, /border-blue/],
          deep: [/modal$/, /modal-backdrop$/, /fade/, /show/, /offcanvas$/, /splide/],
        }
      })
    )
  ]
}
