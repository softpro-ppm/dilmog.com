<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content='pavilan'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Title Tag  -->
    <title>@yield('title', 'always on time')</title>

    @if (View::hasSection('meta_description'))
    <meta name="description" content="@yield('meta_description', 'ZiDrop | Nigeria’s Leading Logistics Company | As Quick as a Click')">
    @endif

    <?php 

        if ($_SERVER['REQUEST_URI'] === '/public/' || $_SERVER['REQUEST_URI'] === '/public') {
            header("Location: https://zidrop.com/", true, 301);
            exit;
        }

    ?>

    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/owl-carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/slicknav.min.css">
    <link rel="stylesheet" href="{{ asset('backEnd/') }}/dist/css/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/reset.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/new_footer.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/counter.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    
    <!-- LifeSure Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/lifesure-theme.css') }}">


    <!-- Meta Pixel Code -->

    <script>
        ! function(f, b, e, v, n, t, s)

        {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?

                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };

            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';

            n.queue = [];
            t = b.createElement(e);
            t.async = !0;

            t.src = v;
            s = b.getElementsByTagName(e)[0];

            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',

            'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1836393513600149');

        fbq('track', 'PageView');

        
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1836393513600149&ev=PageView&noscript=1" /></noscript>

    <!-- End Meta Pixel Code -->
   
    @yield('styles')
    <style>
        /* LifeSure Theme - Exact Match */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.6;
            color: #666;
        }

        /* Header Styles - Exact LifeSure Match */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            padding: 0;
        }

        .header.scrolled {
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .middle-header {
            padding: 15px 0;
            background: transparent;
            transition: all 0.4s ease;
        }

        .navbar {
            padding: 0;
        }

        /* Logo Styles */
        .logo img {
            max-height: 45px;
            transition: all 0.3s ease;
        }

        .logo .navbar-brand {
            font-size: 32px;
            font-weight: 700;
            color: #007bff;
            text-decoration: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        /* Navigation Styles */
        .main-navigation {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-menu {
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .main-menu .nav-item {
            margin: 0 25px;
            position: relative;
        }

        .main-menu .nav-item a {
            color: #333;
            font-weight: 500;
            font-size: 16px;
            text-decoration: none;
            padding: 15px 0;
            transition: all 0.3s ease;
            position: relative;
            display: block;
            text-transform: capitalize;
        }

        .main-menu .nav-item a:hover,
        .main-menu .nav-item.active a {
            color: #007bff;
        }

        /* Dropdown arrow for Services */
        .custom-dropdown > a::after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            margin-left: 8px;
            transition: transform 0.3s ease;
            font-size: 12px;
        }

        .custom-dropdown:hover > a::after {
            transform: rotate(180deg);
        }

        /* Header Right Side */
        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
            justify-content: flex-end;
        }

        .header-contact {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            line-height: 1.4;
        }

        .header-contact .contact-info {
            display: flex;
            align-items: center;
        }

        .header-contact .phone-icon {
            width: 45px;
            height: 45px;
            background: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .header-contact .phone-icon i {
            color: #fff;
            font-size: 18px;
        }

        .header-contact .contact-text {
            display: flex;
            flex-direction: column;
        }

        .header-contact .contact-label {
            font-size: 12px;
            color: #999;
            margin-bottom: 2px;
        }

        .header-contact .contact-number {
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        .header-search {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: #007bff;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .header-search:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        .header-search i {
            font-size: 16px;
            color: #fff;
        }

        .header-cta-btn {
            background: #007bff;
            color: #fff !important;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            border: none;
            white-space: nowrap;
            text-transform: capitalize;
        }

        .header-cta-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
            text-decoration: none;
            color: #fff !important;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        /* Dropdown Styles */
        .custom-dropdown {
            position: relative;
        }

        .custom-dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateX(-50%) translateY(20px);
            transition: all 0.4s ease;
            list-style: none;
            padding: 15px 0;
            margin: 0;
            min-width: 250px;
            z-index: 1000;
            border: 1px solid #f1f3f4;
        }

        .custom-dropdown:hover .custom-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .custom-dropdown-menu li {
            padding: 0;
        }

        .custom-dropdown-menu li a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #333 !important;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
            font-weight: 500;
        }

        .custom-dropdown-menu li a:hover {
            background: #f8f9fa;
            color: #007bff !important;
            padding-left: 30px;
        }

        .custom-dropdown-menu li a i {
            margin-right: 10px;
            width: 16px;
            color: #007bff;
            font-size: 14px;
        }

        /* Mobile Menu Styles */
        .navbar-toggler {
            border: none;
            outline: none;
            padding: 8px 12px;
            color: #333;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 5px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-toggler-icon::before {
            content: "\f0c9";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 18px;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .header {
                background: #fff;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .middle-header {
                padding: 12px 0;
            }

            .main-menu .nav-item a,
            .header-contact,
            .navbar-toggler {
                color: #333 !important;
            }

            .main-navigation {
                flex-direction: column;
                width: 100%;
                margin-top: 25px;
                background: #f8f9fa;
                border-radius: 10px;
                padding: 20px;
            }
            
            .main-menu {
                flex-direction: column;
                width: 100%;
                margin-bottom: 20px;
            }
            
            .main-menu .nav-item {
                margin: 5px 0;
                width: 100%;
                text-align: center;
            }
            
            .main-menu .nav-item a {
                color: #333 !important;
                padding: 12px 20px;
                border-bottom: 1px solid #e9ecef;
                display: block;
                border-radius: 5px;
            }

            .main-menu .nav-item:last-child a {
                border-bottom: none;
            }

            .main-menu .nav-item a:hover {
                background: #fff;
                color: #007bff !important;
            }
            
            .header-right {
                flex-direction: column;
                align-items: center;
                gap: 15px;
                margin-top: 20px;
                width: 100%;
            }

            .header-contact {
                color: #333 !important;
                justify-content: center;
            }

            .header-cta-btn {
                width: 100%;
                max-width: 250px;
                text-align: center;
                padding: 15px 20px;
            }
            
            .custom-dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                background: #fff;
                margin: 10px 0;
                border-radius: 8px;
                border: 1px solid #e9ecef;
            }

            .navbar-collapse {
                background: transparent;
                margin-top: 0;
                padding: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .navbar-collapse.show {
                display: block !important;
            }

            .header-contact .phone-icon {
                width: 35px;
                height: 35px;
            }

            .header-contact .contact-text {
                align-items: flex-start;
            }
        }

        /* Hero Section Spacing */
        .hero-section, .main-content {
            padding-top: 100px;
        }

        @media (max-width: 991px) {
            .hero-section, .main-content {
                padding-top: 85px;
            }
        }

        /* LifeSure Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            color: #333;
            line-height: 1.3;
        }

        /* LifeSure Button Styles */
        .btn-primary {
            background: #007bff;
            border: 1px solid #007bff;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: capitalize;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        .btn-outline-primary {
            background: transparent;
            border: 2px solid #007bff;
            color: #007bff;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: capitalize;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #007bff;
            border-color: #007bff;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
    </style>
</head>

<body id="bg" style="">
    <!-- Boxed Layout -->
    <div id="page" class="site boxed-layout">
        <!-- Header - LifeSure Theme Exact Match -->
        <header class="lifesure-header" id="header">
            <div class="lifesure-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="d-flex w-100 align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{ url('/') }}" class="lifesure-logo">
                                    <i class="fas fa-shield-alt"></i>LifeSure
                                </a>
                            </div>

                            <!-- Mobile menu toggle -->
                            <button class="navbar-toggler d-lg-none" type="button">
                                <span class="navbar-toggler-icon">
                                    <i class="fas fa-bars"></i>
                                </span>
                            </button>

                            <!-- Main Navigation - Center -->
                            <div class="navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('about-us') }}" class="nav-link">About Us</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" id="servicesDropdown" role="button" data-bs-toggle="dropdown">
                                            Services
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($services as $key => $value)
                                            <li>
                                                <a href="{{ url('our-service/' . $value->id) }}" class="dropdown-item">
                                                    <i class="fa {{ $value->icon }}"></i>
                                                    {{ $value->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('tracking') }}" class="nav-link">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.branches') }}" class="nav-link">FAQ's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('contact-us') }}" class="nav-link">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Header Right Side -->
                            <div class="d-none d-lg-flex align-items-center">
                                <!-- Phone Number with LifeSure Style -->
                                <div class="lifesure-contact">
                                    <div class="contact-info">
                                        <div class="phone-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="contact-text">
                                            <div class="contact-label">Call to Our Experts</div>
                                            <div class="contact-number">Free: {{ $contact_info->phone1 ?? '+234 800 000 0000' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Get A Quote Button -->
                                <a href="{{ url('contact-us') }}" class="lifesure-cta-btn">
                                    Get A Quote
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
                                        </div>
                                        <div class="contact-text">
                                            <span class="contact-label">Call to Our Experts</span>
                                            <span class="contact-number">Free: {{ $contact_info->phone1 ?? '+234 800 000 0000' }}</span>
                                        </div>
                                    </div>
                                </a>
                                
                                <!-- Search Icon -->
                                <a href="{{ url('tracking') }}" class="header-search" title="Search">
                                    <i class="fas fa-search"></i>
                                </a>
                                
                                <!-- Get Quote Button -->
                                <a href="{{ url('merchant/register') }}" class="header-cta-btn">
                                    Get a Quote
                                </a>
                            </div>

                            <!-- Mobile Menu Toggle -->
                            <button class="navbar-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>

                        <!-- Mobile Navigation Menu -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <div class="main-navigation d-lg-none">
                                <ul class="main-menu">
                                    <li class="nav-item">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('about-us') }}">About Us</a>
                                    </li>
                                    <li class="nav-item custom-dropdown">
                                        <a href="javascript:void(0)">Services</a>
                                        <ul class="custom-dropdown-menu">
                                            @foreach ($services as $key => $value)
                                            <li>
                                                <a href="{{ url('our-service/' . $value->id) }}">
                                                    <i class="fa {{ $value->icon }}"></i>
                                                    {{ $value->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ url('tracking') }}">
                                                    <i class="fas fa-search-location"></i>
                                                    Package Tracking
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('tracking') }}">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.branches') }}">FAQ's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('contact-us') }}">Contact</a>
                                    </li>
                                </ul>
                                
                                <div class="header-right">
                                    <a href="tel:{{ $contact_info->phone1 ?? '+2348000000000' }}" class="header-contact">
                                        <div class="contact-info">
                                            <div class="phone-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="contact-text">
                                                <span class="contact-number">{{ $contact_info->phone1 ?? '+234 800 000 0000' }}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('merchant/register') }}" class="header-cta-btn">
                                        Get a Quote
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!--/ End Header -->




        @yield('content')

        <?php /*
        <!-- Footer -->
        <footer class="footer" style="background-image: url({{asset('frontEnd/images/footer.svg')}});">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Footer Links -->
                            <div class="single-widget f-link widget">
                                <h3 class="widget-title">Services</h3>
                                <ul>
                                    <li><a href="{{url('/')}}">Home Delivery</a></li>
                                    <li><a href="{{url('/')}}">Warehousing</a></li>
                                    <li><a href="{{url('/')}}">Pick and Drop</a></li>
                                </ul>
                            </div>
                            <!--/ End Footer Links -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Footer Links -->
                            <div class="single-widget f-link widget">
                                <h3 class="widget-title">Earn</h3>
                                <ul>
                                    <li><a href="{{url('/')}}">Become Merchant</a></li>
                                    <li><a href="{{url('/')}}">Become Rider</a></li>
                                    <li><a href="{{url('/')}}">Become Delivery Man</a></li>
                                </ul>
                            </div>
                            <!--/ End Footer Links -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Footer Links -->
                            <div class="single-widget f-link widget">
                                <h3 class="widget-title">Company</h3>
                                <ul>
                                    <li><a href="{{url('about-us')}}">About Us</a></li>
                                    <li><a href="{{url('contact-us')}}">Contact us</a></li>
                                    <li><a href="{{url('/')}}">Our Goal</a></li>
                                                                        <li><a href="{{route('frontend.understanding-tracking-status')}}">Understanding Tracking Status</a></li>

                                </ul>
                            </div>
                            <!--/ End Footer Links -->
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Footer Contact -->
                            <div class="single-widget footer_contact widget">
                                <h3 class="widget-title">Contact</h3>
                                <p>Don’t miss any updates of our Offer</p>
                                <div class="newsletter"  style="border-color: #0a0603;">
                                    <form action="" class="d-flex flex-nowrap">
                                        <div class="form-group h-100 m-0 p-2 w-100">
                                            <input type="email" placeholder="Email Address" class="form-control px-1 bg-transparent h-100 border-0 without-focus"/>
                                        </div>
                                        <button type="button" class=" btn font-20 font-light m-1" style="background-color: #0a0603;color:white">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <!--/ End Footer Contact -->
                        </div>
                    </div>

                </div>
            </div>
            
            
            
            
            
        
            <!-- Copyright -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="copyright-content">
                                <div class="img-logo text-left">
                                    <a href="{{url('/')}}">
                                    @foreach($whitelogo as $wlogo)
                                        <img src="{{asset($wlogo->image)}}" alt="">
                                    @endforeach
                                    </a>
                                </div>
                                
                                
                                <ul class="address-widget-list">
                                    <li class="footer-mobile-number" style="color: #0a0603;"><i class="fa fa-phone" style="color: #0a0603;"></i>{{ $contact_info->phone1 ?? '+234 800 000 0000' }}</li>
                                    <li class="footer-mobile-number" style="color: #0a0603;"><i class="fa fa-mobile-phone" style="color: #0a0603;"></i></i>{{ $contact_info->phone2 ?? '+234 800 000 0001' }}</li>
                                    <li class="footer-mobile-number" style="color: #0a0603;"><i class="fa fa-envelope" style="color: #0a0603;"></i> {{ $contact_info->email ?? 'info@zidrop.com' }}</li>
                                    <li class="footer-mobile-number" style="color: #0a0603;"><i class="fa fa-map-marker" style="color: #0a0603;"></i>{{ $contact_info->address ?? 'Lagos, Nigeria' }}</li>
                                </ul>
                                
                                
                            </div>
                        </div>
                        
                        <div class="col-sm-5">
                            <div class="align-items-center copyright-content d-flex justify-content-center">
                                <!-- Copyright Text -->
                                <p style="color: #0a0603;">© Copyright Zidrop Logistics 2021.</p>
                            </div>
                        </div>
               
                        
                        
                        <div class="col-sm-3">
                            <div class="align-items-center copyright-content d-flex justify-content-end">
                                
                                <ul class="social-widget-list">
                                    @foreach($socialmedia as $key=>$value)
                                    <li class="footer-mobile-number"><a href="{{$value->link}}"><i class="{{$value->icon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--/ End Copyright -->
            
            
            
            
   

        </footer>

        */
        ?>


        <!-- LifeSure Style Footer - Exact Match -->
        <footer class="lifesure-footer">
            <div class="container">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-logo">
                            <i class="fas fa-shield-alt"></i>LifeSure
                        </div>
                        <p>Nigeria's leading logistics company providing reliable, efficient, and cost-effective delivery solutions. Experience the future of logistics with ZiDrop.</p>
                    </div>

                    <!-- About Us Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>About Us</h5>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about-us') }}">About Us</a></li>
                            <li><a href="{{ url('tracking') }}">Features</a></li>
                            <li><a href="{{ route('frontend.branches') }}">FAQ's</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Services Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>Services</h5>
                        <ul>
                            @foreach ($services->take(5) as $service)
                            <li><a href="{{ url('our-service/' . $service->id) }}">{{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Instagram Gallery -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>Instagram Gallery</h5>
                        <div class="instagram-gallery">
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="instagram-item">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>SignUp</h5>
                        <p>Free: {{ $contact_info->phone1 ?? '+234 800 000 0000' }}</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Your email address" required>
                            <button type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p>&copy; {{ date('Y') }} ZiDrop Express Alliance Limited. All rights reserved.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="social-links">
                                @foreach($socialmedia as $social)
                                <a href="{{ $social->link }}" target="_blank">
                                    <i class="{{ $social->icon }}"></i>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="footer-widget">
                                <div class="footer-logo mb-4">
                                    @if(count($whitelogo) > 0)
                                        @foreach($whitelogo as $wlogo)
                                            <img src="{{asset($wlogo->image)}}" alt="ZiDrop" style="max-height: 45px;">
                                        @endforeach
                                    @else
                                        <h4 style="color: #007bff; font-size: 32px; font-weight: 700;">
                                            <i class="fas fa-shield-alt me-2"></i>ZiDrop
                                        </h4>
                                    @endif
                                </div>
                                <p class="text-light mb-4" style="font-size: 16px; line-height: 1.8; color: #ccc;">
                                    Nigeria's leading logistics company providing reliable, efficient, and cost-effective delivery solutions. Experience the future of logistics with ZiDrop.
                                </p>
                                <div class="social-links">
                                    @foreach($socialmedia as $social)
                                        @if (!empty($social->link))
                                            <a href="{{ $social->link }}" class="social-link me-3" target="_blank"
                                               style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #007bff; border-radius: 50%; color: white; transition: all 0.3s; text-decoration: none;">
                                                <i class="{{ $social->icon }}" style="font-size: 16px;"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Links -->
                        <div class="col-lg-2 col-md-6 mb-5">
                            <div class="footer-widget">
                                <h5 class="footer-widget-title text-white mb-4" style="font-weight: 600; font-size: 18px;">About Us</h5>
                                <ul class="footer-links" style="list-style: none; padding: 0;">
                                    <li class="mb-3">
                                        <a href="{{ url('/') }}" class="footer-link">Home</a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="{{ url('about-us') }}" class="footer-link">About Us</a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="{{ url('tracking') }}" class="footer-link">Features</a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="{{ route('frontend.branches') }}" class="footer-link">FAQ's</a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="{{ url('contact-us') }}" class="footer-link">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Services -->
                        <div class="col-lg-2 col-md-6 mb-5">
                            <div class="footer-widget">
                                <h5 class="footer-widget-title text-white mb-4" style="font-weight: 600; font-size: 18px;">Services</h5>
                                <ul class="footer-links" style="list-style: none; padding: 0;">
                                    @foreach($services->take(5) as $service)
                                    <li class="mb-3">
                                        <a href="{{ url('our-service/' . $service->id) }}" class="footer-link">{{ $service->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Instagram Gallery -->
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="footer-widget">
                                <h5 class="footer-widget-title text-white mb-4" style="font-weight: 600; font-size: 18px;">Instagram Gallery</h5>
                                <div class="instagram-gallery">
                                    <div class="row g-2">
                                        @for($i = 1; $i <= 6; $i++)
                                        <div class="col-4">
                                            <div class="instagram-item" style="position: relative; overflow: hidden; border-radius: 8px; height: 80px; background: #333;">
                                                <a href="#" class="d-block h-100" style="background: linear-gradient(45deg, #007bff, #0056b3); display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                                    <i class="fab fa-instagram" style="color: white; font-size: 24px; opacity: 0.8;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <!-- Newsletter -->
                                <div class="newsletter-signup mt-4">
                                    <h6 class="text-white mb-3" style="font-weight: 600;">SignUp</h6>
                                    <div class="newsletter-form">
                                        <div class="input-group">
                                            <input type="email" class="form-control" placeholder="Your email address"
                                                   style="border: 1px solid #444; border-radius: 5px 0 0 5px; padding: 12px 15px; background: #333; color: white; font-size: 14px;">
                                            <button class="btn" type="button" 
                                                    style="background: #007bff; border: 1px solid #007bff; border-radius: 0 5px 5px 0; padding: 12px 20px; color: white;">
                                                <i class="fa fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Bottom -->
                    <div class="footer-bottom mt-5 pt-4" style="border-top: 1px solid #333;">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="copyright-text">
                                    <p class="text-light mb-0" style="font-size: 14px; color: #ccc;">
                                        &copy; {{ date('Y') }} ZiDrop Express Alliance Limited. All rights reserved.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="footer-contact-info">
                                    <?php $contactInfos = DB::table('contacts')->get(); ?>
                                    @foreach ($contactInfos as $info)
                                    <a href="tel:{{ $info->phone1 }}" class="footer-contact-link" style="color: #ccc; text-decoration: none; font-size: 14px;">
                                        Free: {{ $info->phone1 }}
                                    </a>
                                    @break
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- LifeSure Footer CSS Styles -->
        <style>
            /* Footer Styles - LifeSure Match */
            .footer-section {
                margin-top: 0;
            }

            .main-footer {
                background: #222 !important;
            }

            .social-link:hover {
                background: #0056b3 !important;
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
            }
            
            .footer-link {
                color: #ccc !important;
                text-decoration: none;
                transition: all 0.3s ease;
                display: inline-block;
                font-size: 14px;
                line-height: 1.6;
            }

            .footer-link:hover {
                color: #007bff !important;
                text-decoration: none;
                padding-left: 5px;
            }

            .footer-contact-link:hover {
                color: #007bff !important;
            }

            .newsletter-form .form-control::placeholder {
                color: #999;
            }

            .newsletter-form .form-control:focus {
                box-shadow: none;
                border-color: #007bff;
                background: #333;
                color: white;
            }

            .newsletter-form .btn:hover {
                background: #0056b3 !important;
                border-color: #0056b3 !important;
                transform: translateY(-1px);
            }

            .instagram-item a:hover {
                transform: scale(1.05);
                transition: all 0.3s ease;
            }

            .footer-widget-title {
                position: relative;
                padding-bottom: 15px;
            }

            .footer-widget-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 2px;
                background: #007bff;
                border-radius: 2px;
            }

            @media (max-width: 768px) {
                .main-footer {
                    padding: 60px 0 30px;
                }
                
                .footer-widget {
                    text-align: center;
                    margin-bottom: 40px;
                }

                .footer-bottom {
                    text-align: center;
                }

                .footer-bottom .col-md-6 {
                    margin-bottom: 15px;
                }

                .social-links {
                    justify-content: center;
                }

                .newsletter-form .input-group {
                    flex-direction: column;
                }

                .newsletter-form .form-control {
                    border-radius: 5px !important;
                    margin-bottom: 10px;
                }

                .newsletter-form .btn {
                    border-radius: 5px !important;
                    width: 100%;
                }

                .footer-widget-title::after {
                    left: 50%;
                    transform: translateX(-50%);
                }
            }

            @media (max-width: 991px) {
                .footer-widget {
                    text-align: center;
                    margin-bottom: 40px;
                }

                .instagram-gallery {
                    max-width: 300px;
                    margin: 0 auto;
                }
            }
        </style>




        <!-- Jquery JS -->
        <script src="{{ asset('frontEnd/') }}/js/jquery.min.js"></script>
        <script src="{{ asset('frontEnd/') }}/js/jquery-migrate-3.0.0.js"></script>
        <!-- Popper JS -->
        <script src="{{ asset('frontEnd/') }}/js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('frontEnd/') }}/js/bootstrap.min.js"></script>
        <!-- Modernizr JS -->
        <script src="{{ asset('frontEnd/') }}/js/modernizr.min.js"></script>
        <!-- ScrollUp JS -->
        <script src="{{ asset('frontEnd/') }}/js/scrollup.js"></script>
        <!-- FacnyBox JS -->
        <script src="{{ asset('frontEnd/') }}/js/jquery-fancybox.min.js"></script>
        <!-- Cube Portfolio JS -->
        <script src="{{ asset('frontEnd/') }}/js/cubeportfolio.min.js"></script>
        <!-- Slick Nav JS -->
        <script src="{{ asset('frontEnd/') }}/js/slicknav.min.js"></script>
        <!-- Slick Slider JS -->
        <script src="{{ asset('frontEnd/') }}/js/owl-carousel.min.js"></script>
        <!-- Easing JS -->
        <script src="{{ asset('frontEnd/') }}/js/easing.js"></script>
        <!-- Magnipic Popup JS -->
        <script src="{{ asset('frontEnd/') }}/js/magnific-popup.min.js"></script>
        <!-- Active JS -->
        <script src="{{ asset('frontEnd/') }}/js/counter.js"></script>
        <script src="{{ asset('frontEnd/') }}/js/active.js"></script>
        <script src="{{ asset('backEnd/') }}/dist/js/toastr.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('.select2').select2();
        </script>
      
        <script>
            // Comma Seperate Numeric Value 
            // Select all elements with the class 'CommaSeperateValueSet'
            const productValueInputs = document.getElementsByClassName('CommaSeperateValueSet');

            // Loop through each element and add an event listener
            Array.from(productValueInputs).forEach((productValueInput) => {
                productValueInput.addEventListener('input', function(e) {
                    let value = e.target.value;

                    // Remove any non-numeric characters, including commas
                    value = value.replace(/,/g, '');

                    // Format the number with commas
                    const formattedValue = Number(value).toLocaleString('en-US');

                    // Update the input field
                    e.target.value = formattedValue;
                });
            });

            function convertCommaSeparatedToNumber(value) {
                if (!value) return 0; // Return 0 for empty or undefined values
                // Convert the value to a string, remove commas, and parse as a number
                return Number(String(value).replace(/,/g, '')) || 0;
            }
        </script>

        {!! Toastr::message() !!}


        <script src="{{ asset('js/common.js') }}"></script>
        
        <!-- LifeSure Theme JavaScript -->
        <script src="{{ asset('js/lifesure-theme.js') }}"></script>
        
        @yield('custom_js_script')

        <script>
            // LifeSure Header Scroll Effect
            document.addEventListener('DOMContentLoaded', function() {
                const header = document.querySelector('.header');
                const navbar = document.querySelector('.navbar');
                
                window.addEventListener('scroll', function() {
                    const scrollPosition = window.scrollY;

                    if (scrollPosition > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                });

                // Mobile menu toggle functionality
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');

                if (navbarToggler && navbarCollapse) {
                    navbarToggler.addEventListener('click', function() {
                        navbarCollapse.classList.toggle('show');
                    });
                }

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
                        navbarCollapse.classList.remove('show');
                    }
                });

                // Close mobile menu when clicking on a link
                const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        navbarCollapse.classList.remove('show');
                    });
                });
            });
        </script>
</body>


</html>
<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "109961004701121");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5974a3d50d1bb37f1f7a5788/1fl29dl6p';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->