/**
* Gulpfile.
* Project Configuration for gulp tasks.
*/

var pkg = require('./package.json');
var package = pkg.name;
var slug = pkg.slug;
var version = pkg.version;
var textdomain = pkg.textdomain;

// Build files.
var buildFiles = ['./**', '!node_modules/**', '!dist/', '!package.json', '!package-lock.json', '!gulpfile.js', '!assets/sass/**'];
var buildDestination = './dist/' + slug + '/';
var distributionFiles = './dist/' + slug + '/**/*';

// Translations.
var destFile = slug + '.pot';
var translatePath = './languages/' + destFile;
var translatableFiles = './**/*.php';

// Source files.
var cssFolder = './assets/css/';
var sassFolder = './assets/sass/';
var scriptsFolder = './assets/scripts/';
var controllersFolder = './assets/scripts/controllers/';

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
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	csscomb = require('gulp-csscomb'),
	concat = require('gulp-concat'),
	cleanCSS = require('gulp-clean-css'),
	uglify = require('gulp-uglifyjs'),
	rename = require('gulp-rename'),

	// build
	wpPot = require('gulp-wp-pot'),
	sort = require('gulp-sort'),
	copy = require('gulp-copy'),
	zip = require('gulp-zip'),
	replace = require('gulp-replace-task'),
	cleaner = require('gulp-clean');

/**
 * Development Tasks.
 */

gulp.task('sass', function() {
	return gulp.src(sassFolder + '**/!(_)*.sass')
	.pipe(sass())
	.pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
	.pipe(csscomb())
	.pipe(rename({
		suffix: '',
		prefix : 'vlt-'
	}))
	.pipe(gulp.dest(cssFolder))

	// minify
	.pipe(cleanCSS())
	.pipe(rename({
		suffix: '.min',
		prefix : ''
	}))
	.pipe(gulp.dest(cssFolder));
});

gulp.task('scripts', function() {
	return gulp.src(controllersFolder + '**/_*.js')
	.pipe(concat('vlt-controllers.js'))
	.pipe(gulp.dest(scriptsFolder))

	// minify
	.pipe(uglify())
	.pipe(rename({
		suffix: '.min',
		prefix : ''
	}))
	.pipe(gulp.dest(scriptsFolder));
});

gulp.task('watch', function() {
	gulp.watch(sassFolder + '**/*.sass', gulp.parallel('sass'));
	gulp.watch(controllersFolder + '**/*.js', gulp.parallel('scripts'));
});

gulp.task('default', gulp.parallel('watch', 'sass', 'scripts'));

/**
 * Build Tasks.
 */

gulp.task('build-translate', function() {
	return gulp.src(translatableFiles)
	.pipe(sort())
	.pipe(wpPot({
		domain: '@@textdomain',
		destFile: destFile,
		package: package
	}))
	.pipe(gulp.dest(translatePath));
});

gulp.task('build-clean', function() {
	return gulp.src('./dist/*', {
		read: false
	})
	.pipe(cleaner());
});

gulp.task('build-copy', function() {
	return gulp.src(buildFiles)
	.pipe(copy(buildDestination));
});

gulp.task('build-clean-and-copy', gulp.series('build-clean', 'build-copy'), function() {});

gulp.task('build-variables', function() {
	return gulp.src(distributionFiles)
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
	.pipe(gulp.dest(buildDestination));
});

gulp.task('build-zip', function() {
	return gulp.src(buildDestination + '/**', {
		base: 'dist'
	})
	.pipe(zip(slug + '-' + version + '.zip'))
	.pipe(gulp.dest('./dist/'));
});

gulp.task('build-clean-after-zip', function() {
	return gulp.src([
		buildDestination,
		'!/dist/' + slug + '.zip'
	], {
		read: false
	})
	.pipe(cleaner());
});

gulp.task('build-zip-and-clean', gulp.series('build-zip', 'build-clean-after-zip'), function() {});

gulp.task('build', gulp.series('build-clean', gulp.parallel('sass', 'scripts', 'build-translate'), 'build-clean-and-copy', 'build-variables', 'build-zip-and-clean'));