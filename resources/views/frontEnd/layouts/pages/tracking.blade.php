@extends('layouts.app')

@section('content')
<!-- LifeSure Modern Service Design Start -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tracking Services</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item active text-primary">Tracking</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Tracking Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Tracking Services</h4>
            <h1 class="display-4 mb-4">Convenient Tracking Solutions</h1>
            <p class="mb-0">Our Tracking services are designed to provide hassle-free transportation of your parcels. With flexible scheduling and reliable delivery, we ensure your items are picked up and dropped off on time.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Flexible Scheduling">
                        <div class="service-icon p-3">
                            <i class="fa fa-calendar-alt fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Flexible Scheduling</a>
                            <p class="mb-4">Schedule pickups and drop-offs at your convenience with our flexible options.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Reliable Delivery">
                        <div class="service-icon p-3">
                            <i class="fa fa-truck fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Reliable Delivery</a>
                            <p class="mb-4">Count on us for timely and secure delivery of your parcels.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="Real-Time Updates">
                        <div class="service-icon p-3">
                            <i class="fa fa-map-marker-alt fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Real-Time Updates</a>
                            <p class="mb-4">Stay informed with real-time tracking and updates on your parcels.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tracking Service End -->
<!-- LifeSure Modern Service Design End -->
@endsection
