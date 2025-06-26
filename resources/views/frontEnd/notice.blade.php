@extends('layouts.app')

@section('title', 'Announcements')

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Announcements</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-primary">Announcements</li>
        </ol>    
    </div>
</div>

<!-- Notice Section -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @forelse($notices as $notice)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title h4 mb-3">{{ $notice->title }}</h3>
                    <div class="text-muted small mb-3">
                        {{ $notice->created_at->format('Y-m-d H:i:s') }}
                    </div>
                    @if(strlen($notice->text) > 200)
                    <div class="mt-3">
                        <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-link text-primary p-0">Read More</a>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <h4 class="text-muted">No announcements available at the moment.</h4>
            </div>
            @endforelse

            @if($notices->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $notices->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 