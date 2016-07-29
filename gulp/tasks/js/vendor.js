var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    config = require('../../config');


gulp.task('js.vendor', function () {
    gulp.src(config.scripts.vendor.paths)
        .pipe(plumber({errorHandler: notify.onError("Error (js-vendor): <%= error.message %>")}))
        .pipe(uglify())
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest(config.scripts.distPath))
        .pipe(notify({message: 'js.vendor complete', onLast: true}));
});