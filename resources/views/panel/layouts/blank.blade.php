<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('statics/hope-ui/images/favicon.ico')}}" />
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/libs.min.css')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/hope-ui.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/custom.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/dark.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/rtl.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/customizer.css?v=1.1.0')}}">

        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href="{{asset('statics/hope-ui/vendor/fullcalendar/core/main.css')}}" />
        <link rel='stylesheet' href="{{asset('statics/hope-ui/vendor/fullcalendar/daygrid/main.css')}}" />
        <link rel='stylesheet' href="{{asset('statics/hope-ui/vendor/fullcalendar/timegrid/main.css')}}" />
        <link rel='stylesheet' href="{{asset('statics/hope-ui/vendor/fullcalendar/list/main.css')}}" />
        <link rel="stylesheet" href="{{asset('statics/hope-ui/vendor/Leaflet/leaflet.css')}}" />
        <link rel="stylesheet" href="{{asset('statics/hope-ui/vendor/vanillajs-datepicker/dist/css/datepicker.min.css')}}" />

        <link rel="stylesheet" href="{{asset('statics/hope-ui/vendor/aos/dist/aos.css')}}" />

        <style>
            th.hide-search input{
                display: none;
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>