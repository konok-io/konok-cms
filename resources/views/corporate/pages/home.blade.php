@extends('corporate.layouts.app')

@section('title', 'KONOK - ' . ($companyProfile->tagline ?? 'Key of Next Online Knowledge'))

@section('content')

<!-- Hero Section (Dynamic) -->
@if($companyProfile->tagline || $companyProfile->description)
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content pe-lg-5">
                    <h1 class="display-3 fw-bold mb-4">
                        {{ $companyProfile->tagline ?? 'Digital Excellence' }}
                    </h1>
                    <p class="lead mb-5" style="color: var(--gray-600);">
                        {{ Str::limit($companyProfile->description ?? '', 200) }}
                    </p>
                    <div class="hero-buttons d-flex flex-wrap gap-3">
                        <a href="{{ route('front.services') }}" class="btn btn-primary-corporate btn-lg px-4">
                            Explore Services <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('front.contact') }}" class="btn btn-lg px-4" style="background: white; color: var(--text-primary); border: 1px solid var(--gray-200); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <i class="fas fa-phone-alt me-2"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
            @if($companyProfile->about_image || $companyProfile->image)
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image position-relative">
                    <img src="{{ asset($companyProfile->about_image ?? $companyProfile->image) }}" 
                         alt="KONOK" 
                         class="img-fluid rounded-4" style="box-shadow: var(--shadow-xl);">
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- About Section (Dynamic from CompanyProfile) -->
@if($companyProfile->description)
<section class="about-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="row align-items-center g-5">
            @if($companyProfile->about_image)
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image position-relative">
                    <img src="{{ asset($companyProfile->about_image) }}" 
                         alt="About {{ $companyProfile->company_name ?? 'KONOK' }}" 
                         class="img-fluid rounded-3" style="box-shadow: var(--shadow-lg);">
                </div>
            </div>
            @endif
            <div class="col-lg-{{ $companyProfile->about_image ? '6' : '12' }}" data-aos="fade-left" data-aos-delay="200">
                <div class="about-content {{ $companyProfile->about_image ? '' : 'text-center mx-auto' }}" style="{{ $companyProfile->about_image ? '' : 'max-width: 800px;' }}">
                    <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--text-primary);">
                        {{ $companyProfile->company_name ?? 'About Us' }}
                    </h2>
                    <div style="color: var(--gray-600); font-size: 1.1rem; line-height: 1.8;">
                        {!! $companyProfile->description !!}
                    </div>
                    <a href="{{ route('front.about') }}" class="btn btn-primary-corporate mt-5">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Vision & Mission (Dynamic) -->
@if($companyProfile->vision || $companyProfile->mission)
<section class="section-padding" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="row g-4">
            @if($companyProfile->vision)
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card h-100 border-0 rounded-3 overflow-hidden" style="background: var(--bg-card); box-shadow: var(--shadow-md);">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-2" style="width: 72px; height: 72px; background: var(--gradient-primary);">
                                <i class="fas fa-eye fa-2x text-white"></i>
                            </span>
                        </div>
                        <h3 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-primary);">Our Vision</h3>
                        <p style="color: var(--gray-600); font-size: 1.05rem; line-height: 1.8;">{!! $companyProfile->vision !!}</p>
                    </div>
                </div>
            </div>
            @endif
            
            @if($companyProfile->mission)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 rounded-3 overflow-hidden" style="background: var(--bg-card); box-shadow: var(--shadow-md);">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-2" style="width: 72px; height: 72px; background: var(--gradient-accent);">
                                <i class="fas fa-bullseye fa-2x text-white"></i>
                            </span>
                        </div>
                        <h3 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-primary);">Our Mission</h3>
                        <p style="color: var(--gray-600); font-size: 1.05rem; line-height: 1.8;">{!! $companyProfile->mission !!}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Services Section (Dynamic) -->
@if(isset($services) && $services->count() > 0)
<section class="services-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle"><i class="fas fa-cogs me-2"></i> What We Offer</span>
            <h2>Our Services</h2>
            <p>Comprehensive technology solutions tailored to meet your business needs.</p>
        </div>
        
        <div class="row g-4">
            @foreach($services->take(4) as $index => $service)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="service-card-v2 h-100" style="background: var(--bg-card); border: 1px solid var(--gray-200);">
                    @if($service->image)
                    <div class="service-card-image">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="img-fluid">
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
                        <p>{{ $service->short_description ?? Str::limit(strip_tags($service->description ?? ''), 80) }}</p>
                        <a href="{{ route('front.service', $service->slug) }}" class="service-card-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Team Section (Dynamic) -->
@if(isset($leadership) && $leadership->count() > 0)
<section class="team-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle"><i class="fas fa-users me-2"></i> Our People</span>
            <h2>Meet Our Team</h2>
            <p>Dedicated professionals committed to driving innovation and excellence.</p>
        </div>
        
        <div class="row g-4">
            @foreach($leadership->take(4) as $index => $member)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="team-card" style="background: var(--bg-card); border: 1px solid var(--gray-200);">
                    <div class="team-image">
                        @if($member->photo)
                            <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop&crop=face" alt="{{ $member->name }}">
                        @endif
                        <div class="team-social">
                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if($member->email)
                                <a href="mailto:{{ $member->email }}"><i class="fas fa-envelope"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>{{ $member->name }}</h4>
                        <p class="designation">{{ $member->designation }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section (Dynamic) -->
@if(isset($testimonials) && $testimonials->count() > 0)
<section class="testimonials-section section-padding" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle"><i class="fas fa-quote-left me-2"></i> Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p>Hear what our clients have to say about working with us.</p>
        </div>
        
        <div class="row g-4">
            @foreach($testimonials->take(3) as $index => $testimonial)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="testimonial-card h-100" style="background: var(--bg-card); border: 1px solid var(--gray-200);">
                    <div class="testimonial-rating" style="color: var(--orange-color);">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <div class="testimonial-content">
                        <p>{{ $testimonial->content }}</p>
                    </div>
                    <div class="testimonial-author">
                        @if($testimonial->image)
                            <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face" alt="{{ $testimonial->name }}">
                        @endif
                        <div class="author-info">
                            <h5 style="color: var(--text-primary);">{{ $testimonial->name }}</h5>
                            <span style="color: var(--gray-500);">{{ $testimonial->position ?? '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Latest Blog Posts (Dynamic) -->
@if(isset($blogs) && $blogs->count() > 0)
<section class="blog-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle"><i class="fas fa-blog me-2"></i> Latest Articles</span>
            <h2>From Our Blog</h2>
            <p>Stay updated with the latest news, tutorials, and insights.</p>
        </div>
        
        <div class="row g-4">
            @foreach($blogs->take(3) as $index => $blog)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <article class="blog-card h-100">
                    @if($blog->featured_image)
                    <div class="blog-image">
                        <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid">
                    </div>
                    @endif
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar me-1"></i>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h4>{{ $blog->title }}</h4>
                        <p>{{ Str::limit(strip_tags($blog->short_description ?? ''), 80) }}</p>
                        <a href="{{ route('front.blog.show', $blog->slug) }}" class="blog-link">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
