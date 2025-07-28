<!-- Design and Development by ZiDrop Team-->
@extends('frontEnd.layouts.master')
@section('title', 'ZIDROP | Nigeria’s Pay on Delivery Logistics Company | Express Delivery')
@section('meta_description', 'ZiDrop Logistics offers Nigeria’s trusted Pay on Delivery service. Track & manage shipments easily with the ZiDrop Go App. As Quick As A Click.')

@section('canonical', url('https://zidrop.com/'))


@section('og_title', 'Fast Ecommerce Logistics for Smart Reliable, Efficient Deliveries')
@section('og_type', 'website')
@section('og_image', asset('https://zidrop.com/uploads/logo/Logo-For-Zidrop-Logistics%20(1).png'))
@section('og_url', url('https://zidrop.com/'))

@section('twitter_card', 'summary_large_image')
@section('twitter_site', '@zidroplogistics')
@section('twitter_title', 'Fast Ecommerce Logistics for Smart Reliable, Efficient Deliveries')
@section('twitter_description',
    'Zidrop Logistics provides reliable, efficient, and cost-effective logistics solutions
    tailored to meet your transportation, warehousing, and distribution needs.')
@section('twitter_image', asset('https://zidrop.com/uploads/logo/Logo-For-Zidrop-Logistics%20(1).png'))

@section('hreflangs')
    <link rel="alternate" href="{{ url('/') }}" hreflang="en">
    <link rel="alternate" href="{{ url('/') }}" hreflang="hi">
    <link rel="alternate" href="{{ url('/') }}" hreflang="x-default">
@endsection

@php
    // In case it's not already set earlier in your view:
    $currentUrl = url()->current();
@endphp

@section('schema')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "ZiDrop | Nigeria’s Leading Logistics Company | As Quick as a Click",
      "description": "Zidrop Logistics provides reliable, efficient, and cost-effective logistics solutions tailored to meet your transportation, warehousing, and distribution needs.",
      "url": "{{ $currentUrl }}",
      "publisher": {
        "@type": "Organization",
        "name": "ZiDrop Logistics",
        "logo": {
          "@type": "ImageObject",
          "url": "https://zidrop.com/uploads/logo/Logo-For-Zidrop-Logistics%20(1).png"
        }
      }
    }
    </script>
@endsection


@section('content')

    <!-- LifeSure Hero Section -->
    <section class="lifesure-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="welcome-text">WELCOME TO LIFESURE</div>
                    <h1>Life Insurance Makes You Happy</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <div class="btn-group">
                        <a href="#" class="btn-primary">
                            <i class="fas fa-play"></i>
                            Watch Video
                        </a>
                        <a href="#" class="btn-outline">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LifeSure Features Section -->
    <section class="lifesure-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-feature-card">
                        <div class="lifesure-feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Trusted Company</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-feature-card">
                        <div class="lifesure-feature-icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <h4>Anytime Money Back</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-feature-card">
                        <div class="lifesure-feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4>Flexible Plans</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-feature-card">
                        <div class="lifesure-feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Fast Support</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LifeSure Services Section -->
    <section class="lifesure-services">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2>More Information</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-service-card">
                        <div class="card-body">
                            <h5>Life Insurance</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-service-card">
                        <div class="card-body">
                            <h5>Health Insurance</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-service-card">
                        <div class="card-body">
                            <h5>Car Insurance</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-service-card">
                        <div class="card-body">
                            <h5>Home Insurance</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn-primary" style="margin-top: 30px;">More Services</a>
                </div>
            </div>
        </div>
    </section>

    <!-- LifeSure Blog Section -->
    <section class="lifesure-blog">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2>Latest News</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="lifesure-blog-card">
                        <div class="card-body">
                            <div class="lifesure-blog-meta">
                                <span><i class="fas fa-folder"></i> Business</span>
                                <span><i class="fas fa-user"></i> Martin.C</span>
                                <span><i class="fas fa-calendar"></i> 30 Dec 2025</span>
                                <span><i class="fas fa-comments"></i> 6 Comments</span>
                            </div>
                            <h5>Which allows you to pay down insurance bills</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn-link">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="lifesure-blog-card">
                        <div class="card-body">
                            <div class="lifesure-blog-meta">
                                <span><i class="fas fa-folder"></i> Business</span>
                                <span><i class="fas fa-user"></i> Martin.C</span>
                                <span><i class="fas fa-calendar"></i> 30 Dec 2025</span>
                                <span><i class="fas fa-comments"></i> 6 Comments</span>
                            </div>
                            <h5>Leverage agile frameworks to provide</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn-link">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="lifesure-blog-card">
                        <div class="card-body">
                            <div class="lifesure-blog-meta">
                                <span><i class="fas fa-folder"></i> Business</span>
                                <span><i class="fas fa-user"></i> Martin.C</span>
                                <span><i class="fas fa-calendar"></i> 30 Dec 2025</span>
                                <span><i class="fas fa-comments"></i> 6 Comments</span>
                            </div>
                            <h5>Leverage agile frameworks to provide</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn-link">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LifeSure Testimonials Section -->
    <section class="lifesure-testimonials">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2>What Our Clients Say</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-testimonial-card">
                        <div class="lifesure-testimonial-avatar">
                            DJ
                        </div>
                        <h5>David James</h5>
                        <div class="profession">Profession</div>
                        <p>"Excellent service and professional team. Highly recommended for all your insurance needs."</p>
                        <div class="lifesure-testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-testimonial-card">
                        <div class="lifesure-testimonial-avatar">
                            SM
                        </div>
                        <h5>Sarah Miller</h5>
                        <div class="profession">Business Owner</div>
                        <p>"Outstanding customer service and quick claim processing. Very satisfied with their professional approach."</p>
                        <div class="lifesure-testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-testimonial-card">
                        <div class="lifesure-testimonial-avatar">
                            MJ
                        </div>
                        <h5>Michael Johnson</h5>
                        <div class="profession">Engineer</div>
                        <p>"Reliable, trustworthy, and always available when you need them. Great insurance company!"</p>
                        <div class="lifesure-testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="lifesure-testimonial-card">
                        <div class="lifesure-testimonial-avatar">
                            LB
                        </div>
                        <h5>Lisa Brown</h5>
                        <div class="profession">Doctor</div>
                        <p>"Professional team with excellent customer support. They made insurance simple and affordable."</p>
                        <div class="lifesure-testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            color: #666;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .btn-feature {
            background: transparent;
            color: #007bff;
            border: 2px solid #007bff;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-feature:hover {
            background: #007bff;
            color: white;
            text-decoration: none;
        }

        /* Services Section - LifeSure Style */
        .services-section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-subtitle {
            color: #007bff;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .section-main-title {
            font-size: 3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .service-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .service-content {
            padding: 30px;
        }

        .service-content h4 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .service-content p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        /* Blog Section - LifeSure Style */
        .blog-section {
            background: white;
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .blog-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .blog-meta {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .blog-category {
            background: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .blog-content {
            padding: 30px;
        }

        .blog-date {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #999;
        }

        .blog-content h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
            line-height: 1.4;
        }

        .blog-content p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        /* Testimonials Section - LifeSure Style */
        .testimonials-section {
            background: #f8f9fa;
        }

        .testimonial-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .testimonial-avatar {
            margin-bottom: 25px;
        }

        .testimonial-avatar img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .testimonial-content h5 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .testimonial-position {
            color: #999;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .testimonial-rating {
            margin-bottom: 25px;
        }

        .testimonial-text {
            color: #666;
            line-height: 1.7;
            font-style: italic;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .form-control:focus {
            border: 1px solid #ccc !important;
            box-shadow: 0 0 0 .0rem rgba(0, 123, 255, .25) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .section-main-title {
                font-size: 2rem;
            }

            .feature-card {
                margin-bottom: 30px;
            }

            .services-section {
                padding: 60px 0;
            }

            .features-section {
                padding: 60px 0;
            }

            .blog-section {
                padding: 60px 0;
            }

            .testimonials-section {
                padding: 60px 0;
            }
        }
    </style>

    <!-- Hero Section - LifeSure Style -->
    <section class="hero-section">
        <div class="hero-bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="hero-subtitle">WELCOME TO LIFESURE</div>
                        <h1 class="hero-title">Life Insurance Makes You Happy</h1>
                        <p class="hero-description">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <div class="hero-buttons">
                            <a href="#services" class="btn-hero-primary">Learn More</a>
                            <a href="#" class="btn-hero-secondary">
                                <i class="fas fa-play"></i> Watch Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section - LifeSure 4 Feature Cards -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4>Trusted Company</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-feature">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h4>Anytime Money Back</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-feature">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4>Flexible Plans</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-feature">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Fast Support</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...</p>
                        <a href="#" class="btn-feature">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - LifeSure Style -->
    <section class="services-section" id="services" style="background: #f8f9fa; padding: 100px 0;">
        <div class="container">
            <div class="section-title">
                <div class="section-subtitle">More Information</div>
                <h2 class="section-main-title">Life Insurance</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('{{ asset('frontEnd/images/service-1.jpg') }}');">
                        </div>
                        <div class="service-content">
                            <h4>Life Insurance</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('{{ asset('frontEnd/images/service-2.jpg') }}');">
                        </div>
                        <div class="service-content">
                            <h4>Health Insurance</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('{{ asset('frontEnd/images/service-3.jpg') }}');">
                        </div>
                        <div class="service-content">
                            <h4>Car Insurance</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('{{ asset('frontEnd/images/service-4.jpg') }}');">
                        </div>
                        <div class="service-content">
                            <h4>Home Insurance</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">More Services</a>
            </div>
        </div>
    </section>
    <!-- Blog Section - LifeSure Style -->
    <section class="blog-section" style="padding: 100px 0;">
        <div class="container">
            <div class="section-title">
                <div class="section-subtitle">From Our Blog</div>
                <h2 class="section-main-title">Latest News & Articles</h2>
                <p>Stay updated with the latest insights and trends in the insurance industry</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image" style="background-image: url('{{ asset('frontEnd/images/blog-1.jpg') }}');">
                            <div class="blog-meta">
                                <span class="blog-category">Business</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-date">
                                <span class="author">Martin.C</span>
                                <span class="date">30 Dec 2025</span>
                                <span class="comments">6 Comments</span>
                            </div>
                            <h4>Which allows you to pay down insurance bills</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image" style="background-image: url('{{ asset('frontEnd/images/blog-2.jpg') }}');">
                            <div class="blog-meta">
                                <span class="blog-category">Business</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-date">
                                <span class="author">Martin.C</span>
                                <span class="date">30 Dec 2025</span>
                                <span class="comments">6 Comments</span>
                            </div>
                            <h4>Leverage agile frameworks to provide</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-card">
                        <div class="blog-image" style="background-image: url('{{ asset('frontEnd/images/blog-3.jpg') }}');">
                            <div class="blog-meta">
                                <span class="blog-category">Business</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-date">
                                <span class="author">Martin.C</span>
                                <span class="date">30 Dec 2025</span>
                                <span class="comments">6 Comments</span>
                            </div>
                            <h4>Leverage agile frameworks to provide</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section - LifeSure Style -->
    <section class="testimonials-section" style="background: #f8f9fa; padding: 100px 0;">
        <div class="container">
            <div class="section-title">
                <div class="section-subtitle">Testimonials</div>
                <h2 class="section-main-title">What Our Clients Say</h2>
                <p>See what our satisfied customers have to say about our services</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img src="{{ asset('frontEnd/images/testimonial-1.jpg') }}" alt="David James" class="rounded-circle">
                            </div>
                            <h5>David James</h5>
                            <p class="testimonial-position">Profession</p>
                            <div class="testimonial-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="testimonial-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img src="{{ asset('frontEnd/images/testimonial-2.jpg') }}" alt="Sarah Johnson" class="rounded-circle">
                            </div>
                            <h5>Sarah Johnson</h5>
                            <p class="testimonial-position">Business Owner</p>
                            <div class="testimonial-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="testimonial-text">"Excellent service and very professional team. Highly recommend their insurance solutions to everyone."</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img src="{{ asset('frontEnd/images/testimonial-3.jpg') }}" alt="Michael Brown" class="rounded-circle">
                            </div>
                            <h5>Michael Brown</h5>
                            <p class="testimonial-position">Manager</p>
                            <div class="testimonial-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="testimonial-text">"Outstanding customer service and competitive rates. They made the insurance process simple and straightforward."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontEnd.layouts._notice_modal')

    <!-- Global Notice Modal -->
    @if (!empty($globNotice))
        <div class="modal fade" id="globalNoticeModal" tabindex="-1" role="dialog" aria-labelledby="globalNoticeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="globalNoticeModalLabel">{{ $globNotice->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $globNotice->notice !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('custom_js_script')
    <script>
        $(document).ready(function() {
            @if (!empty($globNotice))
                $('#globalNoticeModal').modal('show');
            @endif
        });
    </script>

@endsection
