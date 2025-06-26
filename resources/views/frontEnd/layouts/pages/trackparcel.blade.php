@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="background-image: url('/assets/img/bg-breadcrumb.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Track Parcel</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Track Parcel</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Tracking Details Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Tracking Timeline -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tracking History</h5>
                    </div>
                    <div class="card-body">
                        <div class="tracking-timeline">
                            @foreach($trackInfos as $trackInfo)
                            <div class="tracking-step mb-4">
                                <div class="d-flex">
                                    <div class="tracking-step-left me-3 text-center" style="min-width: 100px;">
                                        <div class="text-primary fw-bold">{{date('h:i A', strtotime($trackInfo->created_at))}}</div>
                                        <div class="small text-muted">{{date('M d, Y', strtotime($trackInfo->created_at))}}</div>
                                    </div>
                                    <div class="tracking-step-right flex-grow-1">
                                        <div class="p-3 bg-light rounded">
                                            {{$trackInfo->note}}
                                        </div>
								</div>
								</div>
							</div>
							@endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parcel Details -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Parcel Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Tracking Number</label>
                                    <h6 class="mb-3">{{$trackparcel->trackingCode}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Status</label>
                                    <h6 class="mb-3">
                                        @php
                                            $status = $trackparcel->status;
                                            if ($status == 1) {
                                                $statusClass = 'text-warning';
                                                $statusLabel = 'Pending';
                                            } elseif ($status == 2) {
                                                $statusClass = 'text-info';
                                                $statusLabel = 'Processing';
                                            } elseif ($status == 3) {
                                                $statusClass = 'text-primary';
                                                $statusLabel = 'On the way';
                                            } elseif ($status == 4) {
                                                $statusClass = 'text-success';
                                                $statusLabel = 'Delivered';
                                            } elseif ($status == 5) {
                                                $statusClass = 'text-danger';
                                                $statusLabel = 'Returned';
                                            } else {
                                                $statusClass = 'text-secondary';
                                                $statusLabel = 'Unknown';
                                            }
                                        @endphp
                                        <span class="{{ $statusClass }}">{{ $statusLabel }}</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Recipient Name</label>
                                    <h6 class="mb-3">{{$trackparcel->recipientName}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Recipient Phone</label>
                                    <h6 class="mb-3">{{$trackparcel->recipientPhone}}</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Delivery Address</label>
                                    <h6 class="mb-3">{{$trackparcel->recipientAddress}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Pickup Location</label>
                                    <h6 class="mb-3">{{$trackparcel->pickupcity->title}} / {{$trackparcel->pickuptown->title}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Delivery Location</label>
                                    <h6 class="mb-3">{{$trackparcel->deliverycity->title}} / {{$trackparcel->deliverytown->title}}</h6>
							</div>
							</div>
                            @if(!empty($trackparcel->deliverymanId))
                            @php
                                $deliverymanInfo = App\Deliveryman::find($trackparcel->deliverymanId);
                            @endphp
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Delivery Agent</label>
                                    <h6 class="mb-3">{{$deliverymanInfo->name}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Agent Phone</label>
                                    <h6 class="mb-3">{{$deliverymanInfo->phone}}</h6>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <label class="text-muted mb-1">Last Updated</label>
                                    <h6 class="mb-3">{{date('M d, Y h:i A', strtotime($trackparcel->updated_at))}}</h6>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tracking Details End -->

<style>
.tracking-timeline {
    position: relative;
    padding-left: 20px;
}

.tracking-timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.tracking-step {
    position: relative;
}

.tracking-step::before {
    content: '';
    position: absolute;
    left: -24px;
    top: 50%;
    transform: translateY(-50%);
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #0151ab;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #0151ab;
}

.tracking-step:last-child::before {
    background: #28a745;
    box-shadow: 0 0 0 2px #28a745;
}

.detail-item label {
    font-size: 0.875rem;
}

.detail-item h6 {
    font-size: 1rem;
    font-weight: 500;
}

.banner-input-group {
    max-width: 600px;
    margin: 0 auto;
}

.banner-input-group-inner {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 4px;
}

.banner-input {
    border: none;
    background: #fff;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 1rem;
}

.banner-track-btn {
    padding: 12px 24px;
    font-weight: 500;
    border-radius: 6px;
    margin-left: 8px;
}

@media (max-width: 768px) {
    .tracking-timeline {
        padding-left: 15px;
    }
    
    .tracking-step::before {
        left: -19px;
    }
    
    .banner-input-group {
        padding: 0 15px;
    }
}

.header-banner {
    background-image: url('/LifeSure-1.0.0/img/banner.webp');
    background-size: cover;
    background-position: center;
    height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

$('.container').hide(); 

$(window).on('load', function () {
    $('.container').show('slow'); 
    let maxDepth = 20; // prevent infinite loops
    let count = 0;

    while (count < maxDepth) {
        let removedAny = false;

        $('.addpercel-inner b').each(function () {
            const $b = $(this);
            const children = $b.children();

            // 1. <b><b>...</b></b>
            if (children.length === 1 && children.prop('tagName') === 'B') {
                $b.contents().unwrap();
                removedAny = true;
                return;
            }

            // 2. <b><div></div></b> and no text
            const isOnlyBlocks = children.length > 0 && $b.text().trim() === '' &&
                [...children].every(el =>
                    ['DIV', 'SECTION', 'P', 'H4', 'UL', 'OL', 'LI', 'SPAN'].includes(el.tagName)
                );
            if (isOnlyBlocks) {
                $b.contents().unwrap();
                removedAny = true;
                return;
            }

            // 3. empty <b></b>
            if ($b.text().trim() === '' && children.length === 0) {
                $b.remove();
                removedAny = true;
                return;
            }

            // 4. fallback: unwrap <b> in general under .addpercel-inner
            $b.contents().unwrap();
            removedAny = true;
        });

        if (!removedAny) break;
        count++; 
    }

    // After cleaning, now get the cleaned HTML
    let cleanedHtml = $('.addpercel-inner').html();

    // Example: Now you can load or use this cleaned HTML
    // $('#some-container').html(cleanedHtml);
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.sticky-header');

    window.addEventListener('scroll', function () {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / documentHeight) * 100;

        if (scrollPercent > 10) {
            header.style.position = 'fixed';
            header.style.top = '0';
            header.style.width = '100%';
            header.style.zIndex = '100'; // Make sure stays on top
        } else {
            header.style.position = 'sticky';
            header.style.top = '0';
            header.style.width = '100%';
        }
    });
});
</script>



