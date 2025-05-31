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

   

    <?php 

        // if ($_SERVER['REQUEST_URI'] === '/public/' || $_SERVER['REQUEST_URI'] === '/public') {
        //     header("Location: https://zidrop.com/", true, 301);
        //     exit;
        // }

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

    <!-- LifeSure Template Styles -->
    <link rel="stylesheet" href="{{ asset('LifeSure-1.0.0/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('LifeSure-1.0.0/css/style.css') }}">

    <!-- Meta Pixel Code -->

    
    <!-- End Meta Pixel Code -->
   
    @yield('styles')
    <style>
        .sticky-header {
            position: sticky;
            /* background-color: #ffffff96; */
            /* backdrop-filter: blur(10px); */
            top: 0;
            width: 100%;
            z-index: 100;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        .middle-header {
            position: relative;
            transition: none;
            box-shadow: 0 3px 12px 0 rgba(0, 0, 0, 0.1);
            z-index: 1000;
            backdrop-filter: none;
        }
    
        .middle-header.scrolled {
            /* background-color: #ffffff96; */
            background: rgb(255 255 255 / .7);
            backdrop-filter: blur(10px);

        }

        /* Optional: Add media queries if needed for specific responsive adjustments */
        @media (max-width: 768px) { /* Example breakpoint for mobile */
            .middle-header {
                transition: none;
            }
        }

        @media (min-width: 769px) { /* Example breakpoint for desktop */
            .middle-header {
                transition: none;
            }
        }
    </style>
</head>

<body id="bg" style="">
    <!-- Boxed Layout -->
    <div id="page" class="site boxed-layout">
        <!-- Header -->
        <header class="header sticky-header" >
            <!-- Middle Header -->
            <div class="middle-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="middle-inner">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-12">
                                        <!-- Logo -->
                                        <div class="logo">
                                            <!-- Image Logo -->
                                            <div class="img-logo">
                                                <a href="{{ url('/') }}">
                                                    @foreach ($whitelogo as $wlogo)
                                                        <img src="{{ asset($wlogo->image) }}" alt="">
                                                    @endforeach
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mobile-nav"></div>
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-12">
                                        <div class="menu-area">
                                            <!-- Main Menu -->
                                            <nav class="navbar navbar-expand-lg">
                                                <div class="navbar-collapse">
                                                    <div class="nav-inner">
                                                        <div class="menu-home-menu-container">
                                                            <!-- Naviagiton -->
                                                            <ul id="nav" class="nav main-menu menu navbar-nav">
                                                                <li class="nav-item"><a
                                                                        href="{{ url('/') }}">Home</a></li>
                                                                <li class="nav-item custom-dropdown"><a> Services <i
                                                                            class="fa fa-angle-down"
                                                                            aria-hidden="true"></i></a>
                                                                    <ul class="custom-dropdown-menu">
                                                                        @foreach ($services as $key => $value)
                                                                            <li><a
                                                                                    href="{{ url('our-service/' . $value->id) }}"><i
                                                                                        class="fa {{ $value->icon }}"></i>{{ $value->title }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                                <!-- <li class="nav-item"><a href="{{ url('price') }}">Charges</a></li> -->
                                                                <!-- <li><a href="{{ url('about-us') }}">About Us</a></li> -->
                                                                <!--<li class="nav-item"><a href="{{ url('merchant/register') }}">Pick & Drop</a></li>-->
                                                                <!--<li class="nav-item"><a href="{{ url('branches') }}">Branches</a></li>-->
                                                                <li class="nav-item"><a
                                                                        href="{{ url('tracking') }}">Tracking</a></li>

                                                                <!-- <li class="nav-item"><a href="{{ url('gallery') }}">Gallery</a></li> -->
                                                                <li class="nav-item"><a
                                                                        href="{{ url('notice') }}">Notice</a></li>
                                                                <li class="nav-item"><a
                                                                        href="{{ route('frontend.branches') }}">Hubs</a>
                                                                </li>
                                                                <li class="nav-item"><a
                                                                        href="{{ route('frontend.subscriptions') }}">Subscriptions</a>
                                                                </li>
                                                                {{-- <li class="nav-item"><a href="{{url('contact-us')}}">Contact Us</a></li> --}}
                                                            </ul>
                                                            <!--/ End Naviagiton -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </nav>
                                            <!--/ End Main Menu -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Middle Header -->

        </header>
        <!--/ End Header -->

        @yield('content')

        <!-- New footer started  -->

        <div class="container-fluid footer bg-dark py-5 wow fadeIn" data-wow-delay="0.2s"
            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
            <div class="container py-5">
                <div class="row g-5 mb-5 align-items-center">
                    <div class="col-lg-7">
                        <div class="position-relative mx-auto">
                            <input class="form-control w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Email address to Subscribe" fdprocessedid="eazn2d">
                            <button type="button"
                                class="btn btn-primary position-absolute top-0 end-0 py-2 px-4 mt-2 me-2"
                                fdprocessedid="4f9znp">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4">
                        @php
                        $socialMediaLinks = \Illuminate\Support\Facades\DB::table('socialmedia')->where('status', 1)->get();
                        @endphp
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                            @foreach ($socialMediaLinks as $social)
                                <a class="btn btn-light btn-md-square me-3" href="{{ $social->link }}">
                                    <i class="fa {{ $social->icon }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h3 class="text-white mb-4"><i class="fa fa-bolt text-primary me-3"></i>ZiDrop</h3>
                                <p class="mb-3" style="color: #666; font-weight: 400;">Our guiding principle is "As
                                    Quick as a Click." Manage, monitor, and supervise deliveries in real-time with the
                                    ZiDrop Application.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="{{ url('/') }}"> Home</a>
                            <a href="{{ url('about-us') }}"> About us</a>
                            <a href="{{ url('contact-us') }}"> Contact Us</a>
                            <a href="{{ url('contact-us') }}"> Our Goal</a>
                            <a href="{{ route('frontend.understanding-tracking-status') }}"> Understanding Tracking
                                Status</a>
                            <!-- <a href="{{ url('tracking') }}"> Tracking</a> -->

                            <a href="{{ url('gallery') }}">Gallery</a>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Earn</h4>
                            <a href="{{ url('/') }}"> Become Merchant</a>
                            <a href="{{ url('/') }}"> Become Rider</a>
                            <a href="{{ url('/') }}"> Become Delivery Man</a>
                        </div>
                    </div>

                    @php
                    $contactInfos = \Illuminate\Support\Facades\DB::table('contacts')->get();
                    @endphp
                    <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            @foreach ($contactInfos as $info)
                                <a href="#"><i class="fa fa-map-marker text-primary me-2"></i>
                                    {{ $info->address }}</a>
                                <a href="mailto:{{ $info->email }}"><i class="fa fa-envelope text-primary me-2"></i>
                                    {{ $info->email }}</a>
                                <!-- <a href="mailto:info@zidrop.com"><i class="fa fa-envelope text-primary me-2"></i> info@zidrop.com</a> -->
                                <a href="tel:{{ $info->phone1 }}"><i class="fa fa-phone text-primary me-2"></i>
                                    {{ $info->phone1 }}</a>
                                <a href="tel:{{ $info->phone2 }}" class="mb-3"><i
                                        class="fa fa-print text-primary me-2"></i> {{ $info->phone2 }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                    class="fa fa-copyright text-light me-2"></i>ZiDrop Express Alliance Limited</a>,
                            All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        Designed By <a class="border-bottom text-white" href="{{ url('/') }}"> ZiDrop Team</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- New footer end -->




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
        @yield('custom_js_script')

        <script>
           document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.middle-header');
            const scrollPosition = window.scrollY;

            if (scrollPosition > 30) { // Adjust scroll threshold as needed
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
        </script>

        <!-- Include WOW.js library BEFORE main.js and custom scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script>
            if (typeof WOW !== 'undefined') { new WOW().init(); }
        </script>

        <!-- Include CounterUp and dependencies BEFORE main.js and custom scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <script>
            $(document).ready(function() {
                if ($.fn.counterUp) {
                    $('.counter').counterUp({
                        delay: 10,
                        time: 1000
                    });
                }
            });
        </script>

        <!-- LifeSure Template Scripts (should come after plugins) -->
        <script src="{{ asset('LifeSure-1.0.0/js/main.js') }}"></script>
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
<!--End of Tawk.to Script-->