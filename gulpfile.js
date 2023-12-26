/**
* Gulpfile.
* Project Configuration for gulp tasks.
*/

const pkg = require('./package.json');
const package = pkg.name;
const slug = pkg.slug;
const version = pkg.version;
const textdomain = pkg.textdomain;
const compressing = true;

// Build files.
const buildFiles = ['./**', '!node_modules/**', '!dist/', '!package-lock.json', '!README.md'];
const buildDestination = './dist/' + slug + '/';
const distributionFiles = './dist/' + slug + '/**/*';

// Translations.
const destFile = slug + '.pot';
const translatePath = './languages/' + destFile;
const translatableFiles = './**/*.php';

// Source files.
const cssFolder = './assets/css/';
const scssFolder = './assets/scss/';
const scriptsFolder = './assets/scripts/';
const controllersFolder = './assets/scripts/controllers/';
const vendorsJSFolder = './assets/vendors/js/';
const vendorsCSSFolder = './assets/vendors/css/';

// Browsers you care about for autoprefixing. https://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
	'last 2 version',
	'> 1%',
	'ie >= 9',
	'ie_mob >= 10',
	'ff >= 30',
	'chrome >= 34',
	'safari >= 7',
	'opera >= 23',
	'ios >= 7',
	'android >= 4',
	'bb >= 10'
];

// Requirements

const {
	src,
	dest,
	watch,
	series,
} = require('gulp');

const sass = require('gulp-sass')(require('sass'));
const del = require('del');
const uglify = require('gulp-uglify-es').default;
const print = require('gulp-print').default;
const cleanCSS = require('gulp-clean-css');
const gulpif = require('gulp-if');
const $ = require('gulp-load-plugins')();
const replace = require('gulp-replace-task');

/**
 * Error Handler for gulp-plumber
 */
function errorHandler(err) {
	console.error(err);
	this.emit('end');
}

/**
 * Development Tasks.
 */

// DELETE FOLDERS
function cleanFolders(done) {
	del.sync([
		'assets/vendors/', 'assets/scripts/*.js', '!assets/scripts/admin.js', '!assets/scripts/helpers.js', '!assets/scripts/night-mode.js', 'assets/css/*.css'
	]);
	return done();
}

// COMPILE SCSS INTO CSS
function compileSCSS() {
	return src(scssFolder + '**/!(_)*.scss')
		.pipe($.plumber({ errorHandler }))
		.pipe(print(filepath => `Processing: ${filepath}`))
		.pipe(sass())
		.pipe($.autoprefixer(AUTOPREFIXER_BROWSERS))
		.pipe($.csscomb())
		.pipe(dest(cssFolder))

		// minify
		.pipe(gulpif(compressing, cleanCSS()))
		.pipe(gulpif(compressing, $.rename({
			suffix: '.min',
			prefix: ''
		})))
		.pipe(dest(cssFolder));
}

// COPY AND TRANSPILE CUSTOM JS
function compileJS() {
	return src(controllersFolder + '**/_*.js')
		.pipe($.plumber({ errorHandler }))
		.pipe(print(filepath => `Processing: ${filepath}`))
		.pipe($.babel())
		.pipe($.concat('controllers.js'))
		.pipe(dest(scriptsFolder))

		// minify
		.pipe(gulpif(compressing, uglify()))
		.pipe(gulpif(compressing, $.rename({
			suffix: '.min',
			prefix: ''
		})))
		.pipe(dest(scriptsFolder));
}

// COPY JS VENDOR FILES
function jsVendor() {
	return src([
		'node_modules/animsition/dist/js/animsition.js',
		'node_modules/highlightjs/highlight.pack.js',
		'node_modules/fitvids/dist/fitvids.js',
		'node_modules/gist-simple/dist/gist-simple.js',
		'node_modules/sharer.js/sharer.js',
		'node_modules/@popperjs/core/dist/umd/popper.js',
		'node_modules/tippy.js/dist/tippy-bundle.umd.js',
		'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
		'node_modules/superfish/dist/js/superfish.js',
		'node_modules/bootstrap/dist/js/bootstrap.min.js',
		'node_modules/superclick/dist/js/superclick.js'
	])
		.pipe($.plumber({ errorHandler }))
		.pipe($.removeSourcemaps())
		.pipe(dest(vendorsJSFolder));
}

// COPY CSS VENDOR FILES
function cssVendor() {
	return src([
		'node_modules/animsition/dist/css/animsition.css',
		'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
		'node_modules/highlightjs/styles/github-gist.css'
	])
		.pipe($.plumber({ errorHandler }))
		.pipe($.removeSourcemaps())
		.pipe(dest(vendorsCSSFolder));
}

// WATCH FILES
function watchFiles() {
	watch(scssFolder + '**/*.scss', compileSCSS);
	watch(controllersFolder + '**/*.js', compileJS);
}

/**
 * Build Tasks.
 */

// TRANSLATE
function buildTranslate() {
	return src(translatableFiles)
		.pipe(print(filepath => `Processing: ${filepath}`))
		.pipe($.sort())
		.pipe($.wpPot({
			domain: '@@textdomain',
			destFile: destFile,
			package: package
		}))
		.pipe(dest(translatePath));
}

// CLEAN DIST
function buildCleanDist(done) {
	del.sync('dist');
	return done();
}

// BUILD COPY
function buildCopy() {
	return src(buildFiles)
		.pipe($.copy(buildDestination));
}

// BUILD VARIABLES
function buildVariables() {
	return src(distributionFiles)
		.pipe(replace({
			patterns: [
				{
					match: 'version',
					replacement: version
				},
				{
					match: 'textdomain',
					replacement: textdomain
				}
			]
		}))
		.pipe(dest(buildDestination));
}

// ZIP ALL FILES INSIDE DIST
function buildZip() {
	return src(buildDestination + '/**', {
		base: 'dist'
	})
		.pipe($.zip(slug + '-' + version + '.zip'))
		.pipe(dest('./dist/'));
}

// CLEAN DIST FOLDER EXCEPT ZIP
function buildCleanAfterZip(done) {
	del.sync([
		buildDestination,
		'!/dist/' + slug + '.zip'
	]);
	return done();
}

// DEVELOPMENT
exports.default = series(cleanFolders, compileSCSS, cssVendor, jsVendor, compileJS, watchFiles);
exports.build = series(buildCleanDist, series(cleanFolders, compileSCSS, cssVendor, jsVendor, compileJS, buildTranslate), series(buildCleanDist, buildCopy), buildVariables, series(buildZip, buildCleanAfterZip));