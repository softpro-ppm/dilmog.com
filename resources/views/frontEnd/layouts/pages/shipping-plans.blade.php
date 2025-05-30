@extends('layouts.app')

@section('content')
<!-- Shipping Plans Page Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Shipping Plans</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Shipping Plans</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Shipping Plans Content Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Shipping Plans</h4>
            <h1 class="display-4 mb-4">Choose the Best Plan for Your Needs</h1>
            <p class="mb-0">We offer flexible shipping plans to cater to your unique requirements. Select from Basic, Premium, or Custom plans to ensure seamless delivery experiences.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Basic Plan">
                        <div class="service-icon p-3">
                            <i class="fa fa-truck fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Basic Plan</a>
                            <p class="mb-4">Affordable shipping solutions for small businesses and individuals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Premium Plan">
                        <div class="service-icon p-3">
                            <i class="fa fa-shipping-fast fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Premium Plan</a>
                            <p class="mb-4">Fast and reliable shipping for businesses with high-volume needs.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="Custom Plan">
                        <div class="service-icon p-3">
                            <i class="fa fa-cogs fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Custom Plan</a>
                            <p class="mb-4">Tailored shipping solutions to meet your specific requirements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shipping Plans Content End -->
@endsection
