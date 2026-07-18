@extends('corporate.layouts.app')

@section('title', 'Industries - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Industries We Serve</h1>
            <p class="lead mb-0">Tailored technology solutions for various industries.</p>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="industries-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Our Expertise</span>
            <h2>Industries We Serve</h2>
            <p>We deliver specialized technology solutions across diverse industries.</p>
        </div>
        
        <div class="row g-4">
            @forelse($industries as $index => $industry)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="industry-card h-100">
                        <div class="industry-icon">
                            <i class="{{ $industry->icon ?? 'fas fa-industry' }}"></i>
                        </div>
                        <h4>{{ $industry->name }}</h4>
                        <p>{{ Str::limit(strip_tags($industry->description ?? ''), 100) }}</p>
                        <a href="{{ route('front.industry', $industry->slug) }}" class="industry-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state py-5">
                        <i class="fas fa-building fa-4x text-muted mb-4"></i>
                        <h4>Industries Coming Soon</h4>
                        <p class="text-muted">We're expanding our services to new industries. Please check back later.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
