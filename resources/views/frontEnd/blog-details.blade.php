@extends('layouts.app')

@section('title', $blog->title_en)

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')

    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blog Details</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item active text-primary">Details</li>
            </ol>    
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mb-4">
                    <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->title_en }}">
                    <div class="card-body">
                        <h1 class="card-title mb-3">{{ $blog->title_en }}</h1>
                        <div class="mb-3 text-muted small">
                            <span class="me-3"><i class="fa fa-user text-primary"></i> Admin</span>
                            <span class="me-3"><i class="fa fa-calendar text-primary"></i> {{ $blog->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="card-text">
                            {!! $blog->text_en !!}
                        </div>
                    </div>
                </div>
                <a href="{{ route('blog.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Back to Blog</a>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection 