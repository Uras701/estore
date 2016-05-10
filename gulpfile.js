var gulp = require('gulp'),
  //sass = require('gulp-ruby-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  cssnano = require('gulp-cssnano'),
  //jshint = require('gulp-jshint'),
  uglify = require('gulp-uglify'),
  imagemin = require('gulp-imagemin'),
  rename = require('gulp-rename'),
  concat = require('gulp-concat'),
  notify = require('gulp-notify'),
  cache = require('gulp-cache'),
  livereload = require('gulp-livereload'),
  del = require('del');

gulp.task('styles', function() {
  return gulp.src([
    'bower_components/bootstrap/dist/css/bootstrap.css',
    'bower_components/bootstrap/dist/css/bootstrap-theme.css'
  ], { style: 'expanded' })
    .pipe(autoprefixer('last 2 version'))
    .pipe(concat('app.css'))
    .pipe(gulp.dest('web/assets/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('web/assets/css'))
    .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
  return gulp.src([
      'bower_components/jquery/dist/jquery.js',
      'bower_components/bootstrap/dist/js/bootstrap.js'
  ])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('web/assets/js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('web/assets/js'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('fonts', function() {
  return gulp.src([
      'bower_components/bootstrap/dist/fonts/*'
    ])
    .pipe(gulp.dest('web/assets/fonts'))
    .pipe(notify({ message: 'Fonts task complete' }));
});

gulp.task('clean', function() {
  return del(['web/assets']);
});

gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'scripts', 'fonts');
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('src/front-end/css/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('src/fromt-end/js/**/*.js', ['scripts']);

  // Create LiveReload server
  livereload.listen();

  // Watch any files in dist/, reload on change
  gulp.watch(['web/assets/**']).on('change', livereload.changed);

});