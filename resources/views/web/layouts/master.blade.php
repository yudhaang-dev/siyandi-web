<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') . (isset($pageHeading->title) ? ' · ' . $pageHeading->title : null) }}</title>
        <meta name="description" content="Dinas Tenaga Kerja Kab. Tanggamus">
        <meta name="keywords" content="Dinas Tenaga Kerja Kab. Tanggamus">
        <meta name="title" content="Disnaker Tanggamus">
        <meta property="og:type" content="article">
        <meta property="og:title" content="Disnaker Tanggamus" />
        <meta property="og:description" content="Dinas Tenaga Kerja Kab. Tanggamus" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Disnaker Tanggamus" />
        <meta name="twitter:description" content="Dinas Tenaga Kerja Kab. Tanggamus" />
        <meta name="twitter:image" content="" />

        <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage"}</script>

        <!-- favicon -->
        <link rel="shortcut icon" href="https://siyandi.disnakertanggamus.com/siyandi-logo/logo-chrome.png" />
        <!-- Css -->
        <link href="{{ asset('statics/landrick/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{ asset('statics/landrick/css/bootstrap.min.css') }}" id="bootstrap-style" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('statics/landrick/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('statics/landrick/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        {{ $css ?? null }}
        <link href="{{ asset('statics/landrick/css/style.min.css') }}" id="color-opt" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>

    <body>
        @include('web.layouts.partials.header')
        {{ $slot }}
        @include('web.layouts.partials.footer')
        <script src="{{ asset('statics/landrick/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- SLIDER -->
        <script src="{{ asset('statics/landrick/libs/tiny-slider/min/tiny-slider.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('statics/landrick/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('statics/landrick/js/plugins.init.js') }}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{ asset('statics/landrick/js/app.js') }}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        {{ $scripts ?? null }}
    </body>
</html>