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
<section class="about-section section-padding" style="background: white;">
    <div class="container">
        <div class="row align-items-center g-5">
            @if($companyProfile->about_image)
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <div class="about-image-wrapper" style="position: relative;">
                        <img src="{{ $companyProfile->about_image }}" 
                             alt="About {{ $companyProfile->company_name ?? 'KONOK' }}" 
                             class="img-fluid rounded-3" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
                        <!-- Experience Badge -->
                        <div class="position-absolute" style="bottom: -20px; right: -20px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; padding: 20px 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(10, 132, 255, 0.3);">
                            <div style="font-size: 2rem; font-weight: 700; line-height: 1;">{{ $companyProfile->founded_year ? date('Y') - $companyProfile->founded_year : '10+' }}</div>
                            <div style="font-size: 0.85rem; opacity: 0.9;">Years of<br>Experience</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-{{ $companyProfile->about_image ? '6' : '12' }}" data-aos="fade-left" data-aos-delay="200">
                <div class="about-content pe-lg-4 {{ $companyProfile->about_image ? '' : 'text-center mx-auto' }}" style="{{ $companyProfile->about_image ? '' : 'max-width: 800px;' }}">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4" style="background: linear-gradient(135deg, rgba(10, 132, 255, 0.1), rgba(99, 102, 241, 0.1));">
                        <i class="fas fa-building" style="color: var(--primary-color);"></i>
                        <span style="color: var(--primary-color); font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">About Us</span>
                    </div>
                    <h2 style="font-size: 2.2rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--text-primary); line-height: 1.3;">
                        {{ $companyProfile->company_name ?? 'Who We Are' }}
                    </h2>
                    <div style="color: #666; font-size: 1.05rem; line-height: 1.9; margin-bottom: 2rem;">
                        {!! Str::limit($companyProfile->description, 400) !!}
                    </div>
                    
                    @php
                        $featuresRaw = $companyProfile->home_features;
                        if (is_string($featuresRaw)) {
                            $featuresRaw = json_decode($featuresRaw, true) ?? [];
                        }
                        $features = $featuresRaw ?: [
                            ['icon' => 'fas fa-headset', 'title' => '24/7 Support'],
                            ['icon' => 'fas fa-users-cog', 'title' => 'Expert Team'],
                            ['icon' => 'fas fa-award', 'title' => 'Quality Assured'],
                            ['icon' => 'fas fa-clock', 'title' => 'On-Time Delivery'],
                        ];
                    @endphp
                    
                    <div class="row g-3">
                        @foreach($features as $feature)
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-2" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; flex-shrink: 0;">
                                    <i class="{{ $feature['icon'] ?? 'fas fa-check' }}"></i>
                                </div>
                                <span style="font-weight: 600; color: var(--text-primary); font-size: 0.9rem;">{{ $feature['title'] ?? '' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('front.about') }}" class="btn btn-primary-corporate">
                            Learn More About Us <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
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
                        @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <div class="testimonial-content">
                        <p>{{ $testimonial->review }}</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}">
                        <div class="author-info">
                            <h5 style="color: var(--text-primary);">{{ $testimonial->client_name }}</h5>
                            <span style="color: var(--gray-500);">{{ $testimonial->company ?? '' }}</span>
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
