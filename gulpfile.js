console.time('Loading plugins');

require('dotenv').config();
var gulp = require('gulp'),
    browserify = require('browserify'),
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify-es').default,
    notify = require('gulp-notify'),
    minifyCSS = require('gulp-minify-css'),
    cachebust = require('gulp-cache-refresh'),
    image = require('gulp-image'),
    babelify = require('babelify'),
    es2015 = require('babel-preset-es2015'),
    stage0 = require('babel-preset-stage-0'),
    sourcemaps = require('gulp-sourcemaps'),
    source = require('vinyl-source-stream'),
    bust = require('gulp-buster'),
    gutil = require('gulp-util');

console.timeEnd('Loading plugins');

const THEME_NAME = 'national-wedding-show';

function transformHash(hash) {
    Object.keys(hash).forEach(function(key) {
        hash[key] = new Date().getTime().toString();
    });
    return hash;
}

function compileJS(jsFile) {
    return browserify({
        entries: './assets/scripts/' + jsFile + '.js',
        extensions: ['.js'],
        debug: true
    }).transform(babelify, {
        global: true,
        presets: [es2015, stage0],
    })
        .bundle()
        .pipe(source(jsFile + '.js'))
        .pipe(gulp.dest('./web/assets/script'))
        .on('error', notify.onError({
            title: 'error',
            message: '<%= error.message %>'
        }));
}

function bustJS(jsFile) {
    gulp.src('./web/assets/script/' + jsFile + '.js')
        .pipe(process.env.WP_ENV === 'production' ? bust({transform: transformHash}): gutil.noop())
        .pipe(gulp.dest('./web/assets/'));
}

function minifyJS(jsFile) {
    gulp.src('./assets/script/' + jsFile + '.js')
        .pipe(uglify({ mangle: false }))
        .on('error', function (err) {
            console.error(err);
            this.emit('end');
        })
        .pipe(rename(jsFile + '.min.js'))
        .pipe(gulp.dest('./web/assets/script'));
}

function compileSass(scssFile) {
    gulp.src('assets/styles/' + scssFile + '.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .on('error', notify.onError({
            title: 'sass',
            message: '<%= error.message %>'
        }))
        .pipe(rename(scssFile + '.css'))
        .pipe(gulp.dest('web/assets/style'))
        .pipe(minifyCSS({ mangle: false, compress: false, processImport: false }))
        .pipe(rename(scssFile + '.min.css'))
        .pipe(gulp.dest('web/assets/style/'))
        .pipe(process.env.WP_ENV === 'production' ? bust({transform: transformHash}): gutil.noop())
        .pipe(gulp.dest('./web/assets/'));
}

gulp.task('js', function () {
    const executeJS = async () => {
         await new Promise((resolve, reject) => {
            if (compileJS('app')) {
                resolve('JS compiled');
            } else {
                reject('Error compiling JS');
            }
        });

        bustJS('app');
        gulp.start('minifyJS');
    };

    executeJS();
});

gulp.task('sass', function () {
    compileSass('critical');
    compileSass('main');
});

gulp.task('minifyJS', function () {
    minifyJS('app');
});

gulp.task('img', function () {
    gulp.src(['assets/img/**/*']).pipe(gulp.dest('web/assets/img'));
});

gulp.task('fonts', function () {
    gulp.src(['assets/fonts/**/*']).pipe(gulp.dest('web/assets/fonts'));
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('assets/scripts/*.js', ['js']).on('change', livereload.changed);
    gulp.watch('assets/scripts/*/*.js', ['js']).on('change', livereload.changed);
    gulp.watch('assets/styles/**/*.scss', ['sass']);
});

gulp.task('image_compress', function () {
    gulp.src('web/app/wp-content/uploads/2018/**')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: '-progressive',
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest('web/app/wp-content/uploads/2018/'));
});


gulp.task('default', ['js', 'sass', 'fonts', 'img', 'watch']);
gulp.task('build', ['js', 'sass', 'fonts', 'img']);

gulp.task('release', ['image_compress']);
