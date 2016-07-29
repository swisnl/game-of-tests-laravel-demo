var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    buffer = require('vinyl-buffer'),
    source = require('vinyl-source-stream'),
    browserify = require('browserify'),
    babelify = require('babelify'),
    sourcemaps = require("gulp-sourcemaps"),
    plumber = require('gulp-plumber'),
    config = require('../../config');

gulp.task('js.app', function () {
    if (config.scripts.app.babel) {
        var bundler = browserify(config.scripts.app.paths, {debug: false}).transform(babelify);

        bundler.bundle()
            .on('error', function (err) {
                return notify().write("Error (js.app (babel)): " + err.message);
            })
            .pipe(plumber({errorHandler: notify.onError("Error (js-app (babel)): <%= error.message %>")}))
            .pipe(source('app.js'))
            .pipe(buffer())
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(uglify())
            .pipe(rename('app.js'))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest(config.scripts.distPath))
            .pipe(notify({message: 'js.app (babel) complete', onLast: true}));
    } else {
        gulp.src(config.scripts.app.paths)
            .pipe(plumber({errorHandler: notify.onError("Error (js.app (js)): <%= error.message %>")}))
            .pipe(uglify())
            .pipe(concat('app.js'))
            .pipe(gulp.dest(config.scripts.distPath))
            .pipe(notify({message: 'js.app (js) complete', onLast: true}))
    }

});