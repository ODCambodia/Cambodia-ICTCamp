var gulp = require( 'gulp' );

const { series } = require( 'gulp' );

var rename = require( 'gulp-rename' );
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );

var cssSRC = 'src/scss/style.scss';
var cssDIST = './dist/css/';
var cssWatch = 'src/scss/**/*.scss';


var jsSRC = 'src/js/script.js';
var jsDIST = './dist/js/';
var jsWatch = 'src/js/**';

function css( done ) {
  gulp.src( cssSRC )
      .pipe( sourcemaps.init() )
      .pipe( sass({
        errorLogToConsole: true,
        outputStyle: 'compressed'
      }) )
      .on( 'error', console.error.bind( console ) )
      .pipe( autoprefixer({ 
        browsers: ['last 2 versions'],
        cascade: false 
      }) )
      .pipe( rename({ 
        suffix: '.min' 
      }) )
      .pipe( sourcemaps.write( './' ) )
      .pipe( gulp.dest( cssDIST ) );

  done();
};

function js( done ) {
  // gulp.src( jsSRC )
  //     .pipe( gulp.dest( jsDIST ));
  
  // browserify: get the modules into script.js
  // tranform babelify [env]: compile ES6 to vanilla javascript
  // 
  // done();
};

function watch_files() {
  gulp.watch( cssWatch, css );
  gulp.watch( jsWatch, js );
}

gulp.task( 'css', css );
gulp.task( 'js', js );

gulp.task( 'default', gulp.parallel( css, js ) );

gulp.task( 'watch', watch_files );