

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>AGENDA APPS</title>

    <meta name="description" content="AGENDA">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
<!--     <meta property="og:title" content="AGENDA">
    <meta property="og:site_name" content="AGENDA">
    <meta property="og:description" content="AGENDA - Buat dan Olah Event Kampusmu">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content=""> -->

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('assets/media/favicons/logobdwGD.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/logoec192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/logoec192.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css') }}">

    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">
    <style>
        #map-canvas{
            width: 100%;
            height: 300px;
        }
    </style>

    <style>
        #map-canvasedit{
            width: 100%;
            height: 300px;
        }
    </style>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <!--     <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCLz_NtmPGJP86BXl3gRy5pv4ocSm8Vg_o&libraries=places" type="text/javascript"></script> -->




    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->

    <script>
        function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
var gb = gambar.files;
//                loop untuk merender gambar
for (var i = 0; i < gb.length; i++){
//                    bikin variabel
var gbPreview = gb[i];
var imageType = /image.*/;
var preview=document.getElementById(idpreview);
var reader = new FileReader();
if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
preview.file = gbPreview;
reader.onload = (function(element) {
    return function(e) {
        element.src = e.target.result;
    };
})(preview);
    //                    membaca data URL gambar
    reader.readAsDataURL(gbPreview);
}else{
//                        jika tipe data tidak sesuai
alert("Type file tidak sesuai. Khusus image.");
}
}
}
</script>
</head>

