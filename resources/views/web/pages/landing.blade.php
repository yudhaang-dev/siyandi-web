<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DISNAKER Tanggamus</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
        .bg-video {
            object-fit: cover;
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index:-1;
        }
        .bg-video-overlay {
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index:-1;
            background-color: rgba(0,0,0,.7);
        }
        </style>
    </head>
    <body>
        <video class="bg-video" loop muted autoplay poster="poster.jpg">
            <source src="https://siyandi.disnakertanggamus.com/assets/bg-video.mp4" type="video/mp4">
        </video>
        <div class="bg-video-overlay"></div>
        <div class="container py-5 text-white">
            <div class="text-center">
                <img src="https://siyandi.disnakertanggamus.com/assets/logo-tanggamus.png" alt="" style="height:150px;">
            </div>
            <h1 class="text-center fw-bolder mb-5">Dinas Tenaga Kerja<br><small>Pemerintah Daerah Kabupaten Tanggamus</small></h1>
            <h2 class="text-center fw-bold mb-3">Layanan</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 mb-3">
                    <a class="w-100 d-flex flex-column align-items-center text-decoration-none" href="https://siyandi.disnakertanggamus.com/apps/yellow-cards/create">
                        <div class="bg-white p-3 rounded-circle" style="width:100px;">
                            <img src="{{ asset('statics/landrick/images/insurance/term-life.svg') }}" class="w-100">
                        </div>
                        <h4 class="text-center text-white">Pendaftaran Kartu Kuning</h4>
                    </a>
                </div>
                <div class="col-md-2 mb-3">
                    <a class="w-100 d-flex flex-column align-items-center text-decoration-none" href="https://siyandi.disnakertanggamus.com/apps/transmigrants/create">
                        <div class="bg-white p-3 rounded-circle" style="width:100px;">
                            <img src="{{ asset('statics/landrick/images/insurance/family-health.svg') }}" class="w-100">
                        </div>
                        <h4 class="text-center text-white">Pendaftaran Transmigrasi</h4>
                    </a>
                </div>
                <div class="col-md-2 mb-3">
                    <a class="w-100 d-flex flex-column align-items-center text-decoration-none" href="https://siyandi.disnakertanggamus.com/apps/cases/create">
                        <div class="bg-white p-3 rounded-circle" style="width:100px;">
                            <img src="{{ asset('statics/landrick/images/insurance/investment.svg') }}" class="w-100">
                        </div>
                        <h4 class="text-center text-white">Pengaduan Online</h4>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">Masuk Ke Beranda</a>
            </div>
        </div>
    </body>
</html>