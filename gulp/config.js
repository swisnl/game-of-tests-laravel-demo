var path = require('path');
var fs   = require('fs');

// basename van directory ophalen, om naam van het project te bepalen
var projectname = path.basename(path.dirname(path.dirname(fs.realpathSync(__filename))));

module.exports = {
    scripts: {
        vendor: {
            paths: [
                'public_html/src'
            ]
        },
        app: {
            paths: [
                'resources/assets/js/app.js'
            ],
            watchPaths: ['resources/assets/js/**/*.js'],
            babel: true
        },
        distPath: './public_html/dist/js'
    },

    styles: {
        sassOptions: {
            outputStyle: 'compressed'
        },
        paths: ['resources/assets/scss/*.scss'],
        watchPaths: ['resources/assets/scss/**/*.scss'],
        distPath: './public_html/dist/css'
    },

    icons: {
        resourcePath: 'resources/assets/icons/*.svg', // waar staan de svgs?
        fontOutputPath: 'public_html/dist/fonts', // waar moeten de iconfont-bestanden naartoe? (woff, ttf etc)
        templateFile: 'resources/assets/scss/variables/_icons.scss.tpl', // templatebestand welke wordt gebruikt om het _icons-bestand mee te genereren
        scssOutputPath: 'resources/assets/scss/variables/' // hier wordt het _icons.scss bestand met de $icons variabele naartoegeschreven, nuttig voor de sass icon-mixin.
    }
};

