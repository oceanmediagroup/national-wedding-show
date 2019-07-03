console.time('Loading plugins');

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
    source = require('vinyl-source-stream');

console.timeEnd('Loading plugins');

const THEME_NAME = 'snt';

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
        .pipe(gulp.dest("./web/assets/script"))
        .on('error', notify.onError({
            title: 'error',
            message: '<%= error.message %>'
        }));
}

function minifyJS(jsFile) {
    gulp.src("./assets/script/" + jsFile + ".js")
        .pipe(uglify({mangle: false}))
        .on('error', function (err) {
            console.error(err);
            this.emit('end');
        })
        .pipe(rename(jsFile + '.min.js'))
        .pipe(gulp.dest('./web/assets/script'));
}


function compileSass(scssFile) {
    gulp.src("assets/styles/" + scssFile + ".scss")
        .pipe(sass())
        .on('error', notify.onError({
            title: 'sass',
            message: '<%= error.message %>'
        }))
        .pipe(rename(scssFile + ".css"))
        .pipe(gulp.dest('web/assets/style'))
        .pipe(minifyCSS({mangle: false, compress: false, processImport: false}))
        .pipe(rename(scssFile + ".min.css"))
        .pipe(gulp.dest('web/assets/style/'));
};

function cacheInFile(fileName) {
    gulp.src("web/app/themes/" + THEME_NAME + "/" + fileName + ".php")
        .pipe(cachebust({
            type: 'timestamp'
        }))
        .pipe(gulp.dest("web/app/wp-content/themes/" + THEME_NAME + "/"));
};

gulp.task('js', function () {
    const executeJS = async () => {
        const data = await new Promise((resolve, reject) => {
            if (compileJS('app')) {
            resolve("JS compiled");
        } else {
            reject("Error compiling JS");
        }
    });
        // console.log(data);
        gulp.start('minifyJS');
    }

    executeJS();

    // Cache after change in JS
    cacheInFile('footer');
});

gulp.task('sass', function () {
    compileSass('critical');
    compileSass('main');

    // Cache after change in SASS
    cacheInFile('header');
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
    /* MAVEN GLOBAL*/
    gulp.watch('assets/scripts/*.js', ['js']).on('change', livereload.changed);
    gulp.watch('assets/scripts/*/*.js', ['js']).on('change', livereload.changed);
    gulp.watch('assets/scripts/*/*/*.js', ['js']).on('change', livereload.changed);
    gulp.watch('assets/styles/*/*.scss', ['sass']).on('change', livereload.changed);
    gulp.watch('assets/styles/*.scss', ['sass']).on('change', livereload.changed);
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
