@extends('layouts.app')

@section('content')
<!-- LifeSure Modern Service Design Start -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Domestic Services</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item active text-primary">Domestic</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Domestic Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Domestic Services</h4>
            <h1 class="display-4 mb-4">We Provide Best Domestic Services</h1>
            <p class="mb-0">Our domestic logistics services ensure fast, reliable, and secure delivery of your parcels within the country. We offer door-to-door pickup and delivery, real-time tracking, and dedicated customer support to make your experience seamless and hassle-free.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Express Delivery">
                        <div class="service-icon p-3">
                            <i class="fa fa-truck fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Express Delivery</a>
                            <p class="mb-4">Fast and secure delivery of parcels across the country with real-time tracking.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Door-to-Door Pickup">
                        <div class="service-icon p-3">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Door-to-Door Pickup</a>
                            <p class="mb-4">Convenient pickup and delivery from your doorstep to any location nationwide.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="Customer Support">
                        <div class="service-icon p-3">
                            <i class="fa fa-headset fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">24/7 Customer Support</a>
                            <p class="mb-4">Our support team is available round the clock to assist you with your logistics needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Domestic Service End -->
<!-- LifeSure Modern Service Design End -->
@endsection
