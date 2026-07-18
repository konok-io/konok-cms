@extends('corporate.layouts.app')

@section('title', isset($type) ? ucfirst($type) . ' Solutions - KONOK' : 'Solutions - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">{{ isset($type) ? ucfirst($type) . ' Solutions' : 'Our Solutions' }}</h1>
            <p class="lead mb-0">Comprehensive solutions tailored to your business needs.</p>
        </div>
    </div>
</section>

<!-- Solutions Section -->
<section class="solutions-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">What We Offer</span>
            <h2>Our Solutions</h2>
            <p>Discover our comprehensive suite of technology solutions.</p>
        </div>
        
        <div class="row">
            @forelse($solutions as $index => $solution)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="solution-card h-100">
                        <div class="solution-icon">
                            <i class="{{ $solution->icon ?? 'fas fa-lightbulb' }}"></i>
                        </div>
                        <h4>{{ $solution->title }}</h4>
                        <p>{{ Str::limit(strip_tags($solution->description ?? ''), 120) }}</p>
                        @if($solution->features && is_array($solution->features))
                        <ul class="solution-features">
                            @foreach(array_slice($solution->features, 0, 3) as $feature)
                            <li><i class="fas fa-check me-2"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <a href="{{ route('front.contact') }}" class="solution-link">
                            Get Started <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No solutions available at the moment. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
