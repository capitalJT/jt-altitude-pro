var gulp        = require('gulp');
var browserSync = require('browser-sync');
var sass        = require('gulp-sass');
var prefix      = require('gulp-autoprefixer');
var shell       = require('gulp-shell');


var concat      = require('gulp-concat');
var rename      = require('gulp-rename');
var uglify      = require('gulp-uglify');
var jshint      = require('gulp-jshint');
var sourcemaps  = require('gulp-sourcemaps');

var svgSprite   = require('gulp-svg-sprites');
var filter      = require('gulp-filter');
var svg2png     = require('gulp-svg2png');

/**
 * @task sprites
 * Create SVG sprites or compile to <symbols>
 * https://github.com/shakyShane/gulp-svg-sprites
 *
 * required vars: svgSprite, filter, svg2png

 */
gulp.task('sprites', function () {
    return gulp.src('src/images/svg/icons/*.svg')
        .pipe(svgSprite({
            baseSize: 16,
            cssFile: "../dist/css/svg-icon-sprite.css",
            svg: {
                sprite: "images/svg-sprite/ai-svg-sprite.svg"
            },
            preview: {
                sprite: "svg-test-page.html"
            }
        }))
        .pipe(gulp.dest("src/"))
        .pipe(filter("**/*.svg"))  // Filter out everything except the SVG file
        .pipe(svg2png())
        .pipe(gulp.dest("src/"));
});

/**
 * @task sass
 * Compile files from scss
 */
gulp.task('sass', function () {
    // return gulp.src([
    //     'src/sass/styles.scss',
    //     'src/sass/adaptive-splash-theme.scss'
    // ])
    return gulp.src('src/scss/*.scss') // all of the .scss files
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError)) // pass the file through gulp-sass
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError)) // pass the file through gulp-sass
        .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) // pass the file through autoprefixer
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest('dist/css')) // output .css file to css folder
        .pipe(filter('scss**/*.css')) // Filtering stream to only css files
        .pipe(browserSync.reload({stream:true})) // reload the stream
});


/**
 * @task lint
 * Concatenate, minify, and send scripts
 */
gulp.task("lint", function() {
    gulp.src("src/js/*.js")
    // gulp.src("src/js/custom.js")
    // .pipe(jshint())
        .pipe(jshint("src/js/.jshintrc"))
        // .pipe(jshint.reporter("default"));
        .pipe(jshint.reporter("jshint-stylish"));
});

/**
 * @task scripts
 * Concatenate, minify, and send scripts
 * `scripts` depends on `lint`
 */
// var jsFiles = 'src/js/**/*.js',
var jsFiles = 'src/js/*.js',
    jsDest = 'dist/js';

gulp.task('scripts', ['lint'], function() {
    return gulp.src(jsFiles)
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('scripts.min.js'))
        // .pipe(uglify())
        .pipe(uglify().on('error', function(e){
            console.log(e);
        }))
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(jsDest));
});


/**
 * @task clearcache
 * Clear all caches
 */
// gulp.task('clearcache', function() {
//   return shell.task([
//     'drush cr'
//   ]);
// });

gulp.task('clearcache', shell.task([
    'drush cc css-js'
]));

/**
 * @task reload
 * Refresh the page after clearing cache
 */
gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('reloadClear', ['clearcache'], function () {
    browserSync.reload();
});
/**
 * @task watch
 * Watch scss files for changes & recompile
 * Clear cache when Drupal related files are changed
 */
gulp.task('watch', function () {
    gulp.watch(['src/scss/*.scss', 'src/scss/**/*.scss'], ['sass']);
    gulp.watch(['src/scss/*.scss', 'src/scss/**/*.scss']).on('change', browserSync.reload);
    //   gulp.watch(['src/sass/*.scss', 'src/sass/**/*.scss'], ['reloadClear']);
    // gulp.watch('**/*.{php,inc,info}',['reload']);
});


/**
 * Launch the Server
 */
gulp.task('browser-sync', ['sass'], function() {
    browserSync.init({
        // Change as required
        proxy: "https://jabaltorres.test/",
        socket: {
            // For local development only use the default Browsersync local URL.
            domain: 'localhost:3000'
            // For external development (e.g on a mobile or tablet) use an external URL.
            // You will need to update this to whatever BS tells you is the external URL when you run Gulp.
            //domain: '192.168.0.13:3000'
        }
    });
});

/**
 * Default task, running just `gulp` will
 * compile Sass files, launch Browsersync & watch files.
 */
gulp.task('default', ['browser-sync', 'watch']);