const mix = require("laravel-mix");
const fs = require("fs");
const path = require("path");

// ---- Compiling module assets start ----
const moduleFolder = "./Modules";

const dirs = (p) =>
    fs
        .readdirSync(p)
        .filter((f) => fs.statSync(path.resolve(p, f)).isDirectory());

// Get the available modules return as array
let modules = dirs(moduleFolder);

// // Loop available modules
modules.forEach(function (mod) {
    mix.js(
        __dirname + "/Modules/" + mod + "/Resources/assets/js/app.js",
        "public/modules/js/" + mod.toLowerCase() + ".js"
    );
    mix.sass(
        __dirname + "/Modules/" + mod + "/Resources/assets/sass/app.scss",
        "public/modules/css/" + mod.toLowerCase() + ".css"
    );
});

mix.copyDirectory(
    "Modules/Blog/Resources/assets/vendor/content_builder",
    "public/vendor/content-builder"
);

// ---- Compiling module assets end ----

// Define Front Path
var frontThemePath = "resources/assets/front/";
var frontPublicPath = "public/assets/front";

// ===================================== For Front ======================================

mix.js(frontThemePath + "/js/other.js", frontPublicPath + "/js").vue({ version: 2 });
mix.js(frontThemePath + "/js/home.js", frontPublicPath + "/js");

mix.sass(frontThemePath + "/scss/other.scss", frontPublicPath + "/css");
mix.sass(frontThemePath + "/scss/home.scss", frontPublicPath + "/css");
mix.sass(frontThemePath + "/scss/instructor.scss", frontPublicPath + "/css");
mix.copyDirectory(
    "resources/assets/front/images",
    "public/assets/front/images"
);

// Copy Mail Images
mix.copyDirectory(
    "resources/assets/mailimages",
    "public/assets/mailimages"
);

mix.copyDirectory(
    "resources/assets/front/imgdiscipline",
    "public/assets/imgdiscipline"
);


/*

 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        require("postcss-import"),
        // require('tailwindcss'),
        require("autoprefixer"),
    ]
);

// ===================================== For Admin ======================================

mix.js("resources/assets/admin/js/app.js", "public/assets/admin/js").vue({ version: 2 });
mix.sass("resources/assets/admin/scss/app.scss", "public/assets/admin/css");

mix.copyDirectory(
    "resources/assets/admin/images",
    "public/assets/admin/images"
);

//mix.copyDirectory("resources/admin/scss/import/fonts", "public/assets/admin/css/fonts");
/*mix.copyDirectory("resources/admin/scss/patterns", "public/assets/admin/css/patterns");
mix.copyDirectory("resources/admin/vendor/iCheck/images", "public/assets/admin/images"); */

// mix.copyDirectory(['resources/assets/admin/vendor/font-awesome/fonts'], 'public/fonts');

mix.styles(
    [
        "resources/assets/admin/vendor/validation/jquery.form-validator.min.css",
        "resources/assets/admin/vendor/ionRangeSlider/ion.rangeSlider.min.css",
        "resources/assets/admin/vendor/dataTables/dataTables.bootstrap5.min.css",
        "resources/assets/admin/vendor/dataTables/responsive.dataTables.min.css",
        "resources/assets/admin/vendor/cropperjs/cropper.min.css",
        "resources/assets/admin/vendor/select2/select2.min.css",
    ],
    "public/assets/admin/css/vendor.css"
);

mix.scripts(
    [
        "resources/assets/admin/vendor/metisMenu/jquery.metisMenu.js",
        "resources/assets/admin/vendor/pace/pace.min.js",
        "resources/assets/admin/vendor/iCheck/js/icheck.min.js",
        "resources/assets/admin/vendor/validation/jquery.form-validator.min.js",
        "resources/assets/admin/vendor/jeditable/jquery.jeditable.min.js",
        "resources/assets/admin/vendor/ionRangeSlider/ion.rangeSlider.min.js",
        "resources/assets/admin/vendor/cropperjs/cropper.min.js",
        "resources/assets/admin/vendor/select2/select2.full.min.js",
        "resources/assets/admin/js/common.js",
    ],
    "public/assets/admin/js/vendor.js",
    "./"
);
