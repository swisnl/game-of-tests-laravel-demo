var gulp = require('gulp'),
    runSequence = require('run-sequence'),
    config = require('../config');


gulp.task('default', function () {
    runSequence(['js.vendor', 'js.app', 'styles']);
});

gulp.task('deploy', function () {
    gulp.start('default');
});

gulp.task('watch', function () {
    gulp.start('default');

    gulp.watch(config.scripts.app.watchPaths, ['js.app']);
    gulp.watch(config.styles.watchPaths, ['styles']);

});

gulp.task('js', function () {
    runSequence(['js.vendor', 'js.app']);
});