@extends('layouts.app')
@section('title', 'Terms & Conditions')
@section('content')

    <!-- Banner Section Start (from Domestic Page) -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Terms & Conditions</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary">Terms & Conditions</li>
            </ol>
        </div>
    </div>
    <!-- Banner Section End -->

    <!--Quicktech Carrier Section Start -->
    <section id="quickTech-carrier" class="section-padding bg-gray">
        <div class="container">
            <!-- <div class="section-header text-center">
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Terms & Conditions</h2>
                <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
            </div> -->
            <div class="row mt-5">
                <div class="col-sm-12">
                    <object data="{{ asset('frontEnd/ZIDROP-LOGISTICS-E-COMMERCE-SERVICE-AGREEMENT-FORM.pdf') }}"
                        style="width: 100%;height:100vh;">
                    </object>
                </div>
            </div>
        </div>
    </section>
@endsection
