var gulp        = require('gulp');
var browserSync = require('browser-sync');
var sass        = require('gulp-sass');
var prefix      = require('gulp-autoprefixer');
var shell       = require('gulp-shell');

var concat      = require('gulp-concat');  
var rename      = require('gulp-rename');  
var uglify      = require('gulp-uglify');
var jshint      = require("gulp-jshint");
var sourcemaps  = require('gulp-sourcemaps');

/**
 * @task sass
 * Compile files from scss
 */
gulp.task('sass', function () {
  return gulp.src('scss/jt-styles.scss') // the source .scss file
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError)) // pass the file through gulp-sass
  .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) // pass the file through autoprefixer
  .pipe(sourcemaps.write()) // writing sourcemaps to relative path for debugging
  .pipe(gulp.dest('css')) // output .css file to css folder
  .pipe(browserSync.reload({stream:true})) // reload the stream
});


/**
 * @task scripts
 * Concatenate, minify, and send scripts
 */
var jsFiles = 'js/**/*.js',  
    jsDest = 'dist/scripts';

gulp.task('scripts', function() {  
  return gulp.src(jsFiles)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(jsDest))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify().on('error', function(e){
      console.log(e);
    }))
    .pipe(gulp.dest(jsDest));
});

/**
 * @task lint
 * Concatenate, minify, and send scripts
 */
gulp.task("lint", function() {
  // gulp.src("assets/js/**/*.js")
  gulp.src("js/app.js")
    // .pipe(jshint())
    .pipe(jshint(".jshintrc"))
    // .pipe(jshint.reporter("default"));
    .pipe(jshint.reporter("jshint-stylish"));
});


/**
 * @task reload
 * Refresh the page after clearing cache
 */
gulp.task('reload', function () {
  browserSync.reload();
});


/**
 * @task watch
 * Watch scss files for changes & recompile
 * Clear cache when Drupal related files are changed
 */
gulp.task('watch', function () {
  gulp.watch(['scss/*.scss', 'scss/**/*.scss'], ['sass']);
  gulp.watch(['scss/*.scss', 'scss/**/*.scss']).on('change', browserSync.reload);
  gulp.watch('**/*.{php,inc,info}',['reload']);
});


/**
 * Launch the Server
 */
gulp.task('browser-sync', ['sass'], function() {
  browserSync.init({
    // Change as required
    proxy: "http://jabaldevsite.test/",
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