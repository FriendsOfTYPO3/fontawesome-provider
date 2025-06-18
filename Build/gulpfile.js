'use strict';

const {src, dest, parallel} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');

function buildStyles() {
    return src('./Scss/*.scss')
        .pipe(concat('fontawesome.scss'))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(dest('../Resources/Public/Css'));
}

function copyFonts() {
    return src('node_modules/font-awesome/fonts/*', {encoding: false})
        .pipe(dest('../Resources/Public/Fonts'));
}

exports.default = parallel(buildStyles, copyFonts);
