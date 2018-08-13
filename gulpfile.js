/**
 * @Author: Nicolas Fazio <webmaster-fazio>
 * @Date:   08-11-2017
 * @Email:  contact@nicolasfazio.ch
 * @Last modified by:   webmaster-fazio
 * @Last modified time: 13-11-2017
 */

var gulp  = require('gulp')
    rename = require('gulp-rename');
// Config
var desDir = '../../NgWpStarter'
var path = {
  inputDir:        './www',
  jsOutputDir:     desDir+ '/js',
  cssOutputDir:    desDir+ '/',
  assetsOutputDir: desDir+ '/'
}

gulp.task('css', function () {
  return gulp.src(path.inputDir+'/*.css')
             .pipe(rename('style.css'))
             .pipe(gulp.dest(path.cssOutputDir))
});
gulp.task('js', function () {
  return gulp.src(path.inputDir+'/**/*.js')
            //  .pipe(rename(function (filePath) {
            //     console.log(filePath.basename.split('.')[0]+'.'+filePath.basename.split('.')[1])
            //     filePath.basename = filePath.basename.split('.')[0]+'.'+filePath.basename.split('.')[1]
            //   }))
             .pipe(gulp.dest(path.jsOutputDir))
});
gulp.task('assets', function () {
  return gulp.src([path.inputDir+'/assets/**/*'])
             .pipe(gulp.dest(path.assetsOutputDir))
});


// Task to copy *.php files in desDir
gulp.task('php', function () {
  return gulp.src(['./wordpress/*.php', './wordpress/**/*.php', './wordpress/template-parts/*.php'])
    .pipe(gulp.dest(desDir))
});
// Task to copy reste of WP files in desDir
gulp.task('wpfile', function () {
  return gulp.src(['./**/*.pot', './screenshot.png'])
    .pipe(gulp.dest(desDir))
});

// Task watch
// Rerun the task when a file changes
 gulp.task('watch', function() {
  gulp.watch(['./wordpress/*.php', './wordpress/**/*.php', './wordpress/template-parts/*.php'], ['php']);
});

gulp.task('default', ['css', 'js','assets', 'php', 'wpfile']);
gulp.task('dev', ['php', 'assets', 'watch'])