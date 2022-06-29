"use strict";

const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const rename = require("gulp-rename");
const sync = require("browser-sync");

const concat = require("gulp-concat");
const uglify = require("gulp-uglify");

function scss() {
  return gulp
    .src("./src/scss/main.scss")
    .pipe(sassGlob())
    .pipe(sass().on("error", sass.logError))
    .pipe(rename("app.css"))
    .pipe(gulp.dest("./dist"));
}

function js() {
  return gulp
    .src(["./src/js/scripts/*.js", "./src/js/index.js"])
    .pipe(concat("app.js"))
    .pipe(uglify())
    .pipe(gulp.dest("./dist"));
}

function dev() {
  sync.init({
    proxy: "advist.test",
  });

  return gulp
    .watch(
      [
        "./src/scss/**/*.scss",
        "./src/js/*.js",
        "./src/js/*/*.js",
        "./*php",
        "./template-parts/*.php",
      ],
      { ignoreInitial: false },
      gulp.parallel(scss, js)
    )
    .on("change", sync.reload);
}

exports.sass = scss;
exports.dev = dev;
