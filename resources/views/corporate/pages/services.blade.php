@extends('corporate.layouts.app')

@section('title', $category ? $category->name . ' - KONOK' : 'Our Services - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">{{ $category ? $category->name : 'Our Services' }}</h1>
            <p class="lead mb-0">{{ $category ? $category->description : 'Comprehensive technology solutions for your business needs' }}</p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section-padding">
    <div class="container">
        @if(!$category)
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">What We Offer</span>
            <h2>Our Services</h2>
            <p>We provide a wide range of technology services to help your business thrive in the digital age.</p>
        </div>
        @endif
        
        <!-- Service Category Tabs -->
        @if($category === null && isset($categories) && $categories->count() > 0)
        <ul class="nav nav-pills mb-5 justify-content-center" id="serviceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab">
                    All Services
                </button>
            </li>
            @foreach($categories as $cat)
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('front.service.category', $cat->slug) }}" role="tab">
                    <i class="{{ $cat->icon ?? 'fas fa-folder' }} me-1"></i>
                    {{ $cat->name }}
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        
        <div class="row g-4">
            @forelse($services as $index => $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-card-v2 h-100">
                        @if($service->image)
                        <div class="service-card-image">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="img-fluid">
                            <div class="service-card-overlay"></div>
                        </div>
                        @else
                        <div class="service-card-icon">
                            <div class="icon-wrapper">
                                <i class="{{ $service->icon ?? 'fas fa-cogs' }}"></i>
                            </div>
                        </div>
                        @endif
                        <div class="service-card-content">
                            <h4>{{ $service->name }}</h4>
                            <p>{{ $service->short_description ?? Str::limit(strip_tags($service->description ?? ''), 120) }}</p>
                            <a href="{{ route('front.service', $service->slug) }}" class="service-card-link">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state py-5">
                        <i class="fas fa-tools fa-4x text-muted mb-4"></i>
                        <h4>Services Coming Soon</h4>
                        <p class="text-muted">We're preparing amazing services for you. Please check back later.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <h2>Need a Custom Solution?</h2>
            <p>Let's discuss your specific requirements and find the perfect solution for your business.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Request Consultation <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
