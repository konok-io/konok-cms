@extends('corporate.layouts.app')

@section('title', 'Careers - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Join Our Team</h1>
            <p class="lead mb-0">We're looking for talented individuals to help us build the future of technology.</p>
        </div>
    </div>
</section>

<!-- Careers Section -->
<section class="careers-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Open Positions</span>
            <h2>Current Opportunities</h2>
            <p>Explore our open positions and find your perfect role.</p>
        </div>
        
        <div class="row">
            @forelse($careers as $index => $career)
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="career-card h-100">
                        <div class="career-card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h4 class="mb-0">{{ $career->title }}</h4>
                                @if($career->is_featured)
                                <span class="badge bg-warning text-dark">Featured</span>
                                @endif
                            </div>
                            
                            <div class="career-meta mb-3">
                                @if($career->department)
                                <span class="me-3"><i class="fas fa-building me-1"></i>{{ $career->department->name }}</span>
                                @endif
                                @if($career->location)
                                <span class="me-3"><i class="fas fa-map-marker-alt me-1"></i>{{ $career->location->name }}</span>
                                @endif
                                <span class="me-3"><i class="fas fa-briefcase me-1"></i>{{ ucfirst(str_replace('-', ' ', $career->employment_type ?? 'full-time')) }}</span>
                                <span><i class="fas fa-signal me-1"></i>{{ ucfirst($career->experience_level ?? 'any') }}</span>
                            </div>
                            
                            @if($career->short_description)
                            <p class="text-muted mb-3">{{ Str::limit(strip_tags($career->short_description), 150) }}</p>
                            @endif
                            
                            <a href="{{ route('front.contact') }}?job={{ $career->id }}" class="btn btn-outline-primary">
                                Apply Now <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No open positions at the moment. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Join Us Section -->
<section class="why-join-section section-padding bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Why KONOK</span>
            <h2>Why Join Our Team?</h2>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="why-card text-center h-100">
                    <div class="why-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Growth Opportunities</h4>
                    <p>Continuous learning and career advancement paths.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card text-center h-100">
                    <div class="why-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Great Team</h4>
                    <p>Collaborate with talented professionals from around the world.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card text-center h-100">
                    <div class="why-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h4>Attractive Benefits</h4>
                    <p>Competitive salary, health insurance, and remote work options.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
