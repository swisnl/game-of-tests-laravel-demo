var gulp = require('gulp'),
    sass = require('gulp-sass'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    globbing = require('gulp-css-globbing'),
    combineMediaQueries = require('gulp-combine-media-queries'),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require('gulp-autoprefixer'),
    config = require('../config');

gulp.task('styles', function () {

    gulp.src(config.styles.paths)
        .pipe(plumber({errorHandler: notify.onError("Error (sass): <%= error.message %>")}))
        .pipe(globbing({
            extensions: ['.scss']
        }))
        .pipe(sourcemaps.init())
        .pipe(sass(
            config.styles.sassOptions
        ))
        // .pipe(combineMediaQueries())
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie > 8'],
            cascade: false
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(config.styles.distPath))
        .pipe(notify({message: 'sass complete', onLast: true}));
});
