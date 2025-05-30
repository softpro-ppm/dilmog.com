@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section -->
<div class="breadcrumbs" style="background:#db0022;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <div class="bread-menu">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                    <div class="bread-title">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Static Blog Section -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">From Blog</h4>
            <h1 class="display-4 mb-4">News And Updates</h1>
            <p class="mb-0">Stay updated with the latest news and insights from our blog. Explore articles on various topics and gain valuable knowledge.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Blog Image 1">
                        <div class="blog-categiry py-2 px-4">
                            <span>Business</span>
                        </div>
                    </div>
                    <div class="blog-content p-4">
                        <div class="blog-comment d-flex justify-content-between mb-3">
                            <div class="small"><span class="fa fa-user text-primary"></span> Admin</div>
                            <div class="small"><span class="fa fa-calendar text-primary"></span> May 30, 2025</div>
                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 5 Comments</div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">How to Grow Your Business</a>
                        <p class="mb-3">Discover effective strategies to expand your business and achieve success in a competitive market.</p>
                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog-2.jpg" class="img-fluid rounded-top w-100" alt="Blog Image 2">
                        <div class="blog-categiry py-2 px-4">
                            <span>Technology</span>
                        </div>
                    </div>
                    <div class="blog-content p-4">
                        <div class="blog-comment d-flex justify-content-between mb-3">
                            <div class="small"><span class="fa fa-user text-primary"></span> Admin</div>
                            <div class="small"><span class="fa fa-calendar text-primary"></span> May 29, 2025</div>
                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 3 Comments</div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">The Future of Technology</a>
                        <p class="mb-3">Explore the latest advancements in technology and their impact on various industries.</p>
                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog-3.jpg" class="img-fluid rounded-top w-100" alt="Blog Image 3">
                        <div class="blog-categiry py-2 px-4">
                            <span>Health</span>
                        </div>
                    </div>
                    <div class="blog-content p-4">
                        <div class="blog-comment d-flex justify-content-between mb-3">
                            <div class="small"><span class="fa fa-user text-primary"></span> Admin</div>
                            <div class="small"><span class="fa fa-calendar text-primary"></span> May 28, 2025</div>
                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 8 Comments</div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Tips for a Healthy Lifestyle</a>
                        <p class="mb-3">Learn practical tips to maintain a healthy lifestyle and improve your overall well-being.</p>
                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back-to-Top Button -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
@endsection