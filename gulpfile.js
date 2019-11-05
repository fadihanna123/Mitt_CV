// Läsa in och importera de paket som behövs.
const { src, dest, watch, series, parallel } = require("gulp");
const concat = require("gulp-concat");
const concatCss = require('gulp-concat-css');
const cleanCSS = require('gulp-clean-css');
const uglify = require("gulp-uglify-es").default;
let sass = require('gulp-sass');
sass.complier = require('node-sass');
browserSync = require('browser-sync').create();
var ts = require('gulp-typescript');
const babel = require('gulp-babel');


// Definera sökvägar.
const files = {
	ImagesPath: "src/Images/**",
	sassPath: "src/SASS/*.scss",
	jsPath: "src/js/*.js",
	cssPath: 'pub/css/*.css',
	htmlPath: 'src/**/*.html'
};

// Task: Läsa in jsPath från files och konvertera Ecmascript filer till Javascript, skicka också den till pub/js mappen och gör livereload.
function convertToJs() {
	return src(files.jsPath)
	.pipe(babel({
		presets: ['@babel/env']
	}))
        .pipe(dest('pub/js/'))
		.pipe(browserSync.stream());
		
}

// Task: Läsa in jsPath från files och skicka också den till pub/js mappen och gör livereload.
function Workwithjs() {
		return src(files.jsPath)
        .pipe(dest('pub/js/'))
		.pipe(browserSync.stream());
		
}

// Task: Läsa in htmlPath från files, skicka också den till pub/ mappen och gör livereload.
function htmlTask() {
	return src(files.htmlPath)
	.pipe(dest('pub/'))
	.pipe(browserSync.stream());
	
}

// Task: Läsa in cssPath och sassPath från files och slå ihop samtliga css filer som finns i pub/css, minifiera dem till main.css filen och skicka också den till pub/css mappen
function cssTask()
{
	return src(files.cssPath, files.sassPath)	
	.pipe(concatCss('main.css'))
	.pipe(cleanCSS({compatibility: 'ie8'}))
	.pipe(dest('pub/css'))
	.pipe(browserSync.stream());
}

// Task: Läsa in sassPath från files och konvertera koden från scss till css och flytta dem sedan till pub/css
function convertToSASS()
{
	return src(files.sassPath)
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(dest('pub/css'));
}


// Task: Läsa in ImagesPath från files och kopiera bilder från src/Images till pub/Images
function MoveImages()
{
	return src(files.ImagesPath)
	.pipe(dest('pub/Images'));
}

// Task: Kontrollera alla förändringar för html, css, SASS, bilder och Javascript filer filer samma gäller för både funktioner htmlTask, Workwithjs, convertToJs, cssTask, convertToSASS, MoveImages och sedan gör livereload för webbläsare
function watchTask()
{
	browserSync.init({
		server:{
			baseDir: 'pub/'
		}
		});
	watch([files.jsPath, files.htmlPath, files.sassPath, files.cssPath, files.ImagesPath],
        parallel(convertToJs, htmlTask, MoveImages, convertToSASS, Workwithjs, cssTask)
    ).on('change', browserSync.reload);
}

exports.default = series(convertToJs, htmlTask, convertToSASS, Workwithjs, cssTask, MoveImages, watchTask);
