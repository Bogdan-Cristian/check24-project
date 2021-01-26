var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();


gulp.task('browserSync', function() {
    browserSync.init({
      server: {
        baseDir: './'
      },
    })
  });

gulp.task('sass', function(){
    return gulp.src('scss/styles.scss')
    .pipe(sass())
    .pipe(gulp.dest('dist/'))
    .pipe(browserSync.reload({
        stream: true
      }))
});

gulp.task('watch:scss', function(){
    gulp.watch('scss/**/*.scss', gulp.series('sass'));
  });

/* gulp.task('watch:html', function(){
   gulp.watch('./index.html', browserSync.reload); 
 });*/


gulp.task('start:dev', gulp.parallel('watch:scss','sass', 'browserSync'));
