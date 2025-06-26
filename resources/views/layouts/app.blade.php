<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LifeSure - Life Insurance Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $favicon ?? asset('favicon.png') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.min.css') }}"/>
    <link href="{{ asset('assets/vendor/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Banner Stylesheet -->
    <link href="{{ asset('assets/css/banner.css') }}" rel="stylesheet">
    
    <!-- Add modal styles -->
    <style>
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .modal-header {
            padding: 1rem 1rem 0;
        }
        .modal-body {
            padding-top: 0;
        }
        .modal-body img {
            max-width: 200px;
            height: auto;
        }
        .btn-primary {
            background-color: #0151ab;
            border-color: #0151ab;
        }
        .btn-primary:hover {
            background-color: #0151ab;
            border-color: #0151ab;
        }
        .btn-outline-primary {
            color: #0151ab;
            border-color: #0151ab;
        }
        .btn-outline-primary:hover {
            background-color: #0151ab;
            border-color: #0151ab;
        }
        @media (max-width: 576px) {
            .modal-dialog {
                margin: 1rem;
            }
            .modal-body {
                padding: 1rem;
            }
            .btn-lg {
                padding: 0.5rem 1rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div id="page-loader" style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;background:rgba(255,255,255,0.95);display:flex;align-items:center;justify-content:center;">
        <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status">
            <!-- <span class="visually-hidden">Loading...</span> -->
            <span class="visually-hidden"></span>
        </div>
    </div>
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    // Hide loader when page is fully loaded
    $(window).on('load', function() {
        $('#page-loader').fadeOut(400);
    });
    </script>
</body>

</html>
