var gulp = require('gulp'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    config = require('../config');

gulp.task('build-icons', function () {
    var iconfont = require('gulp-iconfont');
    var consolidate = require('gulp-consolidate');

    gulp.src(config.icons.resourcePath)
        .pipe(iconfont({
            fontName: 'icons',
            fontHeight: 1024,
            descent: 64,
            normalize: true,
            appendCodepoints: false,
            startCodepoint: 0xE001
        }))
        .on('glyphs', function (glyphs, options) {
            gulp.src(config.icons.templateFile)
                .pipe(consolidate('lodash', {
                    glyphs: glyphs
                }))
                .pipe(rename({basename: "_icons", extname: ".scss"}))
                .pipe(gulp.dest(config.icons.scssOutputPath));
        })
        .pipe(gulp.dest(config.icons.fontOutputPath))
        .pipe(notify({message: 'build-icons complete', onLast: true}));
});