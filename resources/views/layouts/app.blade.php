<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Material Dashboard Laravel - Free Frontend Preset for Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/246089f9bb58620d23425cf6e3149e0d/material-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/994ee37dcfdd7b109e9d5b3dca1a6106/demo.css" rel="stylesheet" />
    <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/5d6034886fc8f8ac68b0f9c2d3076c4c/jquery.min.js"></script>

    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        
        
        <!--   Core JS Files   -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/caefe8638b6e4ca8a616fc66ee1f8885/popper.min.js"></script>
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/41aedf8a598786c06dc6fed2210a2b8c/bootstrap-material-design.min.js"></script>
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/ec8edfd529e1e9f74d178497c01594ba/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/534709a0a5e9861043dd3a681e838fb4/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/099a6440cfa2b6ce52f1c43d2b80d862/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/52e2a7b97c53f3533a75f739b70636a0/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/f4fca19fecd1f1cdcfdf15544a73c3c6/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/dc96d259f21a5bfca04aec3e4af01443/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/d2932cd5824f5b48427eb26842d0c1e9/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/8f073c13c2a5279ed12cc56fe1bc1094/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/045a222f4462e472bbc912e36b4a62c3/jquery.tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/21ea871ec98913aefa8f2ae4549b3340/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/837bae2bc078baf58e296ae8dc67e6e8/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/ec749847bd6d32e4d8b628f1ae1fbc18/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/11f25ef810896041e204635d73a1f0af/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Chartist JS -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/d6350157786c4a4678b4ba0cb1130340/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/49252e7cdb3a0599e7722d8fa8b73257/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/f61063fb439c43c67a76186275e597b5/material-dashboard.js" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="https://trello-attachments.s3.amazonaws.com/5d6e7da5d7c75b3b7df60527/5de94be2cc989b3cfbd16a4e/26e3e527c64fa67b026428f778fda890/settings.js"></script>
        @stack('js')
    </body>
</html>