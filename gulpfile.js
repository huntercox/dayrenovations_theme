const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();

// compile scss to css
function styles() {

  // 1. locate source SCSS files
  return gulp.src('./assets/scss/**/*.scss')
    // 2. pass file to Sass Compiler
    .pipe(sass())
    // 3. locate destination for compiled CSS
    .pipe(gulp.dest('./assets/css/'))
    // 4. stream changes to all browsers
    .pipe(browserSync.stream())
}

function minify() {

  // 1. locate source SCSS files
  return gulp.src('./assets/css/*.css')
    // 2. pass file to Sass Compiler
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    // 3. locate destination for compiled CSS
    .pipe(gulp.dest('./'))
}

function watch() {
  browserSync.init({
    notify: false,
    proxy: "https://dayindayout.test",
    https: {
      key: "/Users/hsc/.localhost-ssl/ssl.huntercox.dev.key",
      cert: "/Users/hsc/.localhost-ssl/ssl.huntercox.dev.crt"
    },
  });
  gulp.watch('./assets/scss/**/*.scss', styles);
  gulp.watch('**/*.php').on('change', browserSync.reload);
}

exports.styles = styles;
exports.watch = watch;

exports.minify = minify;