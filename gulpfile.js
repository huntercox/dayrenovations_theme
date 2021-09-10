const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const browserSync = require('browser-sync').create();

// compile scss to css
function styles() {

  // 1. locate source SCSS files
  return gulp.src('./assets/scss/**/*.scss')
    // 2. pass file to Sass Compiler
    .pipe(sass())
    // 3. locate destination for compiled CSS
    .pipe(gulp.dest('./'))
    // 4. stream changes to all browsers
    .pipe(browserSync.stream())
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