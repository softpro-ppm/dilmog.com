@extends('layouts.app')

@section('title', $notice->title)

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Announcement Details</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/notice">Announcements</a></li>
            <li class="breadcrumb-item active text-primary">Details</li>
        </ol>    
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title h3 mb-3">{{ $notice->title }}</h1>
                    <div class="text-muted small mb-4">
                        {{ $notice->created_at->format('Y-m-d H:i:s') }}
                    </div>
                    <div class="card-text">
                        {!! $notice->text !!}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('notice.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left me-2"></i>Back to Announcements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 