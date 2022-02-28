const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

function styles() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream())
}

function minify() {
  return gulp.src('./assets/css/*.css')
    .pipe(cleanCSS({ compatibility: 'ie8' }))
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