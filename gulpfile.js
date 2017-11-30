var gulp = require('gulp');
var download = require("gulp-download");

gulp.task('setup', function () {
    download("http://www.1c-bitrix.ru/download/scripts/bitrixsetup.php")
        .pipe(gulp.dest("bitrix/"));
    download("http://www.1c-bitrix.ru/download/business_encode_php5.tar.gz")
        .pipe(gulp.dest("bitrix/"));
});

