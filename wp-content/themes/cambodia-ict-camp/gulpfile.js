// var gulp = require( 'gulp' );
const { src, dest, task, watch, parallel, series } = require( 'gulp' );

var baseURL      = 'localhost/Cambodia-ICTCamp';

// common plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var browserSync  = require( 'browser-sync' ).create();
var reload       = browserSync.reload;
var plumber      = require( 'gulp-plumber' );
var notify       = require( 'gulp-notify' );

// CSS plugins
var sass         = require( 'gulp-sass' );
var uglify       = require( 'gulp-uglify' );
var autoprefixer = require( 'gulp-autoprefixer' );

// JS plugins
var browserify   = require( 'browserify' );
var babelify     = require( 'babelify' );
var concat       = require( 'gulp-concat' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );

// images plugin
var imagemin     = require( 'gulp-imagemin' );

var fontsSRC     = 'src/fonts/**/*';
var fontsDIST    = 'dist/fonts/';

var htmlSRC      = 'src/**/*.html';
var htmlDIST     = 'dist/'

var cssSRC       = 'src/scss/style.scss';
var cssDIST      = './dist/css/';
var cssWatch     = 'src/scss/**/*.scss';

var jsSRC        = 'script.js';
var jsFolder     = 'src/js/';
var jsLib        = jsFolder + 'lib/';
var jsDIST       = './dist/js/';
var jsWatch      = 'src/js/**';
var jsFiles      = [jsSRC]; // array of all js files to check

var imagesSRC    = 'src/images/**/*';
var imagesDIST   = 'dist/images/';

function browser_sync() {
  browserSync.init({
    proxy: baseURL,
    injectChanges: true
  })
}

function css( done ) {
  src( cssSRC )
      .pipe( plumber() )
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
      .pipe( dest( cssDIST ) )

  done();
};

function js_concat() {
  return src( 'src/js/lib/*.js' )
      .pipe( plumber() )
      .pipe( concat( 'script.js' ) )
      .pipe( dest( 'src/js/' ) );
}

function js( done ) {
  jsFiles.map( function( entry ) {
    return browserify({
        entries: [jsFolder + entry]
      })
      .transform( babelify, { presets: ['env'] } )
      .bundle()
      .pipe( plumber() )
      .pipe( source( entry ) )
      .pipe( rename({ extname: '.min.js' }) )
      .pipe( buffer() )
      .pipe( sourcemaps.init({ loadMaps: true }) )
      .pipe( uglify() )
      .pipe( sourcemaps.write( './' ) )
      .pipe( dest( jsDIST ) )
    })
  done();
};

// function triggerPlumber( src_file, dest_file ) {
//   return src( src_file )
//       .pipe( plumber() )
//       .pipe( dest( dest_file ) );
// }

function images() {
  return src( imagesSRC )
      .pipe( plumber() )
      .pipe( dest( imagesDIST ) )
      .pipe( imagemin({
          optimizationLevel: 3,
          progressive: true,
          interlaced: true,
      }) )
      .pipe( dest( imagesDIST ) )
}

function fonts() {
  return triggerPlumber( fontsSRC, fontsDEST );
}

function html() {
  return triggerPlumber( htmlSRC, htmlDEST );
}

function watch_files() {
  watch( cssWatch, css );
  watch( jsWatch, series( js, reload ) );

  src( jsDIST + 'script.min.js' )
    .pipe( notify({ message: 'Gulp is Watching...' }) );
}

task( 'browser-sync', browser_sync );
task( 'css', css );
task( 'concat', js_concat );
task( 'js', js );
task( 'images', images );
task( 'fonts', fonts );
task( 'html', html );

task( 'default', parallel( css, images, series( js_concat, js ) ) );

task( 'watch', parallel( browser_sync, watch_files ) );