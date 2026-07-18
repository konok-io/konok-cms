@extends('corporate.layouts.app')

@section('title', $service->meta_title ?? $service->name . ' - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.services') }}" class="text-white-50">Services</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>
            <h1 class="mb-3" style="color: white;">{{ $service->name }}</h1>
            @if($service->category)
                <span class="badge bg-light text-primary">{{ $service->category->name }}</span>
            @endif
        </div>
    </div>
</section>

<!-- Service Detail Section -->
<section class="service-detail-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="service-detail-card pe-lg-4">
                    <!-- Service Icon -->
                    @if($service->icon)
                    <div class="service-detail-icon mb-4">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    @endif
                    
                    <!-- Service Image -->
                    @if($service->image)
                    <div class="service-image mb-4">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="img-fluid rounded">
                    </div>
                    @endif
                    
                    <h2 class="mb-3">{{ $service->name }}</h2>
                    
                    @if($service->short_description)
                    <p class="lead text-muted mb-4">{{ $service->short_description }}</p>
                    @endif
                    
                    <!-- Description -->
                    @if($service->description)
                    <div class="service-description mb-4">
                        {!! $service->description !!}
                    </div>
                    @endif
                    
                    <!-- Features -->
                    @if($service->features && is_array($service->features) && count($service->features) > 0)
                    <div class="service-features mb-4">
                        <h4 class="mb-3"><i class="fas fa-list-check me-2 text-primary"></i>Key Features</h4>
                        <ul class="feature-list">
                            @foreach($service->features as $feature)
                            <li><i class="fas fa-check-circle text-success me-2"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <!-- Benefits -->
                    @if($service->benefits && is_array($service->benefits) && count($service->benefits) > 0)
                    <div class="service-benefits mb-4">
                        <h4 class="mb-3"><i class="fas fa-star me-2 text-primary"></i>Benefits</h4>
                        <div class="row">
                            @foreach($service->benefits as $benefit)
                            <div class="col-md-6 mb-2">
                                <div class="benefit-item">
                                    <i class="fas fa-arrow-right text-primary me-2"></i>
                                    {{ $benefit }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <!-- Contact Card -->
                    <div class="sidebar-card mb-4">
                        <h4 class="mb-3">Get a Quote</h4>
                        <p class="text-muted mb-3">Interested in this service? Contact us for a custom quote.</p>
                        <a href="{{ route('front.contact') }}" class="btn btn-primary w-100">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                    
                    <!-- Related Services -->
                    @if($relatedServices->count() > 0)
                    <div class="sidebar-card">
                        <h4 class="mb-3">Related Services</h4>
                        <ul class="related-services-list">
                            @foreach($relatedServices as $related)
                            <li>
                                <a href="{{ route('front.service', $related->slug) }}">
                                    <i class="{{ $related->icon ?? 'fas fa-cogs' }} me-2"></i>
                                    {{ $related->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <h2>Ready to Get Started?</h2>
            <p>Let's discuss how our {{ $service->name }} can help your business grow.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Request Consultation <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .service-detail-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
    }
    
    .service-detail-icon i {
        font-size: 2rem;
    }
    
    .service-detail-card {
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .service-description {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #555;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
    }
    
    .feature-list li {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
    .benefit-item {
        padding: 8px 0;
    }
    
    .sidebar-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .related-services-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .related-services-list li {
        border-bottom: 1px solid #eee;
    }
    
    .related-services-list li:last-child {
        border-bottom: none;
    }
    
    .related-services-list a {
        display: flex;
        align-items: center;
        padding: 12px 0;
        color: #555;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .related-services-list a:hover {
        color: var(--primary-color);
        padding-left: 5px;
    }
</style>
@endpush
