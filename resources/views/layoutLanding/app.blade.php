<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sony Nursery </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Sertakan SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .navbar .getstarted,
        .navbar .getstarted:focus {
            padding: 8px 20px;
            margin-left: 30px;
            border-radius: 50px;
            color: #fff;
            font-size: 14px;
            border: 2px solid #47b2e4;
            font-weight: 600;
        }

        .navbar .getstarted:hover,
        .navbar .getstarted:focus:hover {
            color: #fff;
            background: green;
        }

        .progress-wrapper {
            margin-bottom: 20px;
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-animated {
            animation: progressFill 1.5s ease-in-out;
        }

        @keyframes progressFill {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-center">
        @include('layoutLanding.header')
    </header><!-- End Header -->


    <main id="main">
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo">
        @include('layoutLanding.footer')
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('assets/vendor/aos/aos.js') }} "></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }} "></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
