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
    proxy: {
      target: "https://dayindayout.test",
    },
    https: {
      key: "/Applications/MAMP/Library/OpenSSL/certs/dayindayout.test.key",
      cert: "/Applications/MAMP/Library/OpenSSL/certs/dayindayout.test.crt"
    },
  });
  gulp.watch('./assets/scss/**/*.scss', styles);
  gulp.watch('**/*.php', browserSync.reload);
}

exports.styles = styles;
exports.watch = watch;