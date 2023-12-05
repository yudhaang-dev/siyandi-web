<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Document</title>

        <link rel="shortcut icon" href="{{asset('statics/hope-ui/images/favicon.ico')}}" />
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/libs.min.css')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/hope-ui.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/custom.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/dark.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/rtl.css?v=1.1.0')}}">
        <link rel="stylesheet" href="{{asset('statics/hope-ui/css/customizer.css?v=1.1.0')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        @stack('css')
    </head>
    <body>
        @include('panel.components.loader')
        @include('panel.components.sidebar')
        <main class="main-content">
            <div class="position-relative">
                @section('content-heading')
                    @include('panel.components.navbar')
                @show
            </div>
            <div class="container-fluid">
                @if (session('alert'))
                    @include('panel.components.alert', [
                        'type' => session('alert')->type ?? null,
                        'message' => session('alert')->message ?? null
                    ])
                @endif
                @yield('content')
            </div>
            {{-- @include('panel.components.footer') --}}
        </main>

        <!-- Backend Bundle JavaScript -->
        <script src="{{ asset('statics/hope-ui/js/libs.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('statics/hope-ui/js/hope-ui.js') }}"></script>
        @stack('scripts')
    </body>
</html>