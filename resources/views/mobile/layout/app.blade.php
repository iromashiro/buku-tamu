<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Buku Tamu Diskominfo</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('mobile/styles/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('mobile/styles/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('mobile/fonts/css/fontawesome-all.min.css')}}">
    <link rel="manifest" href="{{URL::asset('mobile/_manifest.json')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('mobile/app/icons/icon-192x192.png')}}">
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
    <style>
        .chart-container1 {
            width: 100%;
            height: auto;
            /* Mengatur tinggi secara otomatis berdasarkan konten */
            aspect-ratio: 0.4;
            /* Menjaga rasio aspek grafik, sesuaikan nilainya sesuai kebutuhan */
            min-height: 300px;
            /* Tinggi minimal untuk memastikan grafik terlihat */
        }

        .chart-container {
            width: 100%;
            height: auto;
            /* Mengatur tinggi secara otomatis berdasarkan konten */
            aspect-ratio: 1.5;
            /* Menjaga rasio aspek grafik, sesuaikan nilainya sesuai kebutuhan */
            min-height: 300px;
            /* Tinggi minimal untuk memastikan grafik terlihat */
        }

        /* Responsif untuk ukuran layar yang lebih kecil */
        @media (max-width: 768px) {
            .chart-container {
                min-height: 200px;
                /* Tinggi minimal yang lebih kecil untuk layar yang lebih kecil */
            }
        }
    </style>
</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="index.html" class="header-title">Buku Tamu Diskominfo</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
        </div>

        <div class="content mt-3 notch-clear">
            <div class="d-flex">
                <div class="align-self-center">
                    <p class="mb-n1 font-400 font-12 opacity-50">Diskominfo SP</p>
                    <h1 class="font-30">Buku Tamu</h1>
                </div>
                <!--<div class="align-self-center ms-auto">
                    <a href="#"><img src="{{URL::asset('mobile/images/pictures/faces/1s.png')}}" width="50"
                            class="rounded-circle shadow-xl"></a>
                </div>-->
            </div>
        </div>

        @include('mobile.layout.menu')

        <div class="page-content header-clear-small">

            @yield('content')

            <div class="footer card card-style">
                <p class="footer-text">Copyright &copy; Diskominfo Kab. Muara Enim <span id="copyright-year">2017</span>
                </p>
            </div>

        </div>
        <!-- End of Page Content-->
        <!-- All Menus, Action Sheets, Modals, Notifications, Toasts, Snackbars get Placed outside the <div class="page-content"> -->

        <!-- Menu Share -->
        <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-n1">
                <h1>Share the Love</h1>
                <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#"
                    class="close-menu"><i class="fa fa-times"></i></a>
            </div>

        </div>

    </div>

    <script type="text/javascript" src="{{URL::asset('mobile/scripts/bootstrap.min.js')}}">
    </script>
    <script type="text/javascript" src="{{URL::asset('mobile/scripts/custom.js')}}"></script>
    <script src="{{URL::asset('dist/js/canvasjs.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="{{URL::asset('dist/js/canvasjs.min.js')}}"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        const html5QrCode = new Html5Qrcode("reader");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            // handle success, for example, redirect to the decoded URL
            console.log(`Decoded text: ${decodedText}`, decodedResult);
            window.location.href = decodedText; // Redirect to the URL contained in the QR code
        };
        const config = { fps: 10, qrbox: { width: 250, height: 50 } };

        // Start scanning with the back camera
        html5QrCode.start(
            { facingMode: { exact: "environment"} }, // Prefer the back camera
            config,
            qrCodeSuccessCallback,
            (errorMessage) => {
                // parse error, show appropriate message to the user.
                console.log(`QR Code no detected, error: ${errorMessage}`);
            }
        ).catch((err) => {
          // If you want to prefer front camera
        html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);
        });

        // This function can be called when you want to stop the QR scanner.
        function stopScanning() {
            html5QrCode.stop().then((ignore) => {
                // QR Scanning is stopped.
                console.log("QR Scanning stopped.");
            }).catch((err) => {
                // Stop failed, handle it.
                console.error("Failed to stop scanning.", err);
            });
        }
    </script>
    @yield('script')
</body>
