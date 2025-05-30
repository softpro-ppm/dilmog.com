@extends('layouts.app')

@section('content')
<!-- LifeSure Modern Service Design Start -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Air Parcel Services</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item active text-primary">Air Parcel</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Air Parcel Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Air Parcel Services</h4>
            <h1 class="display-4 mb-4">Fast and Reliable Air Parcel Delivery</h1>
            <p class="mb-0">Our air parcel services ensure swift and secure delivery of your packages across the globe. With real-time tracking and dedicated support, we make sure your parcels reach their destination on time.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Express Air Delivery">
                        <div class="service-icon p-3">
                            <i class="fa fa-plane fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Express Air Delivery</a>
                            <p class="mb-4">Fast and secure air delivery for urgent shipments worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Global Reach">
                        <div class="service-icon p-3">
                            <i class="fa fa-globe fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Global Reach</a>
                            <p class="mb-4">Deliver your parcels to any corner of the world with our extensive network.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="Real-Time Tracking">
                        <div class="service-icon p-3">
                            <i class="fa fa-map-marker-alt fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Real-Time Tracking</a>
                            <p class="mb-4">Track your parcels in real-time and stay updated on their status.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Air Parcel Service End -->
<!-- LifeSure Modern Service Design End -->
@endsection
