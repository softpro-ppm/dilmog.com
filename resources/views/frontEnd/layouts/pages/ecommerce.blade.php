@extends('layouts.app')

@section('content')
<!-- LifeSure Modern Service Design Start -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">E-commerce Services</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item active text-primary">E-commerce</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- E-commerce Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">E-commerce Services</h4>
            <h1 class="display-4 mb-4">We Provide Best E-commerce Solutions</h1>
            <p class="mb-0">Our e-commerce logistics services are tailored to meet the needs of online businesses. We offer seamless integration, fast delivery, and reliable support to ensure your customers are always satisfied.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Order Fulfillment">
                        <div class="service-icon p-3">
                            <i class="fa fa-box fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Order Fulfillment</a>
                            <p class="mb-4">Efficient and accurate order processing and delivery for your e-commerce business.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Inventory Management">
                        <div class="service-icon p-3">
                            <i class="fa fa-warehouse fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Inventory Management</a>
                            <p class="mb-4">Keep track of your stock levels and ensure timely restocking with our solutions.</p>
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
                            <p class="mb-4">Dedicated support to assist your customers and resolve their queries promptly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- E-commerce Service End -->
<!-- LifeSure Modern Service Design End -->
@endsection
