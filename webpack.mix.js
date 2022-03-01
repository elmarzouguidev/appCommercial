const mix = require('laravel-mix');

require('laravel-mix-purgecss');

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);*/

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css').sourceMaps();
/* .purgeCss({
     enabled: true
 });*/

mix.scripts(
    [
        "public/assets/libs/datatables.net/js/jquery.dataTables.min.js",
        "public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
        "public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js",
        "public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js",

        "public/assets/libs/jszip/jszip.min.js",

        "public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js",
        "public/assets/libs/datatables.net-buttons/js/buttons.print.min.js",
        "public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js",

        "public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js",
        "public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
    ],
    "public/assets/libs/datatables.js"
);