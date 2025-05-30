@extends('layouts.app')

@section('content')
<!-- LifeSure Modern Office Locations Start -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Offices</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Offices</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Office Locations Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Office Locations</h4>
            <h1 class="display-4 mb-4">Find Us Near You</h1>
            <p class="mb-0">We have offices located in various regions to serve you better. Visit us at any of our locations for assistance and support.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="Head Office">
                        <div class="service-icon p-3">
                            <i class="fa fa-building fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Head Office</a>
                            <p class="mb-4">123 Main Street, City Center, Country</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="Branch Office">
                        <div class="service-icon p-3">
                            <i class="fa fa-map-marker-alt fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Regional Office</a>
                            <p class="mb-4">456 Another Street, Suburb, Country</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('LifeSure-1.0.0/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="Regional Office">
                        <div class="service-icon p-3">
                            <i class="fa fa-map fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Branch Office</a>
                            <p class="mb-4">789 Some Avenue, District, Country</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Office Locations End -->
<!-- LifeSure Modern Office Locations End -->
@endsection
