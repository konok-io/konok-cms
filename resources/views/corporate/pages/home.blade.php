@extends('corporate.layouts.app')

@section('title', 'KONOK - Key of Next Online Knowledge')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content pe-lg-5">
                    <span class="hero-badge">
                        <i class="fas fa-sparkles me-2"></i> Innovating for Tomorrow
                    </span>
                    <h1 class="display-3 fw-bold mb-4">
                        Transforming Ideas Into
                        <span class="gradient-text">Digital Excellence</span>
                    </h1>
                    <p class="lead mb-5" style="color: var(--gray-300);">
                        {{ $companyProfile->tagline ?? 'KEY OF NEXT ONLINE KNOWLEDGE - We empower businesses through cutting-edge technology solutions, helping you navigate the digital landscape with confidence.' }}
                    </p>
                    <div class="hero-buttons d-flex flex-wrap gap-3">
                        <a href="{{ route('front.services') }}" class="btn btn-primary-corporate btn-lg px-4">
                            Explore Services <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('front.contact') }}" class="btn btn-lg px-4" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2); border-radius: var(--radius-lg);">
                            <i class="fas fa-phone-alt me-2"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image position-relative">
                    <div class="hero-shape"></div>
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&h=500&fit=crop" 
                         alt="KONOK Digital Solutions" 
                         class="img-fluid rounded-4 shadow-2xl">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image position-relative">
                    <div class="about-shape-1"></div>
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=450&fit=crop" 
                         alt="About KONOK" 
                         class="img-fluid rounded-4 shadow-xl position-relative">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="about-content ps-lg-5">
                    <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4" style="background: rgba(139, 69, 19, 0.08); color: var(--primary-color); font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1.5px;">
                        <i class="fas fa-building"></i> About KONOK
                    </span>
                    <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--dark-color);">Empowering Businesses Through Technology</h2>
                    <p style="color: var(--gray-600); font-size: 1.1rem; line-height: 1.8;">
                        {{ $companyProfile->description ?? 'KEY OF NEXT ONLINE KNOWLEDGE (KONOK) is a leading technology solutions provider dedicated to helping businesses embrace digital transformation.' }}
                    </p>
                    
                    <div class="about-features d-flex flex-wrap gap-3 mt-5">
                        <div class="feature-item d-flex align-items-center gap-3 p-3 rounded-3" style="background: var(--light-color); box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200);">
                            <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: var(--gradient-accent); color: white;">
                                <i class="fas fa-headset"></i>
                            </div>
                            <span style="font-weight: 600; color: var(--dark-color);">24/7 Support</span>
                        </div>
                        <div class="feature-item d-flex align-items-center gap-3 p-3 rounded-3" style="background: var(--light-color); box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200);">
                            <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: var(--gradient-accent); color: white;">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <span style="font-weight: 600; color: var(--dark-color);">Expert Team</span>
                        </div>
                        <div class="feature-item d-flex align-items-center gap-3 p-3 rounded-3" style="background: var(--light-color); box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200);">
                            <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: var(--gradient-accent); color: white;">
                                <i class="fas fa-award"></i>
                            </div>
                            <span style="font-weight: 600; color: var(--dark-color);">Quality Assured</span>
                        </div>
                        <div class="feature-item d-flex align-items-center gap-3 p-3 rounded-3" style="background: var(--light-color); box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200);">
                            <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: var(--gradient-accent); color: white;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <span style="font-weight: 600; color: var(--dark-color);">On-Time Delivery</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('front.about') }}" class="btn btn-primary-corporate mt-5">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="section-padding" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card h-100 border-0 rounded-4 overflow-hidden" style="box-shadow: var(--shadow-lg);">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 80px; height: 80px; background: var(--gradient-primary);">
                                <i class="fas fa-eye fa-2x text-white"></i>
                            </span>
                        </div>
                        <h3 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; color: var(--dark-color);">Our Vision</h3>
                        <p style="color: var(--gray-600); font-size: 1.05rem; line-height: 1.8;">
                            {{ $companyProfile->vision ?? 'To be the most trusted technology partner for businesses worldwide, setting new standards of excellence in digital innovation.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 rounded-4 overflow-hidden" style="box-shadow: var(--shadow-lg);">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 80px; height: 80px; background: var(--gradient-accent);">
                                <i class="fas fa-bullseye fa-2x text-white"></i>
                            </span>
                        </div>
                        <h3 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; color: var(--dark-color);">Our Mission</h3>
                        <p style="color: var(--gray-600); font-size: 1.05rem; line-height: 1.8;">
                            {{ $companyProfile->mission ?? 'To empower businesses with cutting-edge technology solutions that drive efficiency, growth, and competitive advantage.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section-padding" style="background: var(--light-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">
                <i class="fas fa-cogs me-2"></i> What We Offer
            </span>
            <h2>Our Services</h2>
            <p>Comprehensive technology solutions tailored to meet your business needs.</p>
        </div>
        
        <div class="row g-4">
            @php
                $services = [
                    ['icon' => 'fas fa-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern frameworks and best practices for optimal performance.'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Apps', 'desc' => 'Native and cross-platform mobile applications for iOS and Android platforms.'],
                    ['icon' => 'fas fa-cloud', 'title' => 'Cloud Solutions', 'desc' => 'Scalable cloud infrastructure and services for modern businesses.'],
                    ['icon' => 'fas fa-brain', 'title' => 'AI Integration', 'desc' => 'Smart AI-powered solutions to automate and optimize your business processes.'],
                ];
            @endphp
            
            @foreach($services as $index => $service)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-card-v2 h-100">
                        <div class="service-card-icon">
                            <div class="icon-wrapper">
                                <i class="{{ $service['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="service-card-content">
                            <h4>{{ $service['title'] }}</h4>
                            <p>{{ $service['desc'] }}</p>
                            <a href="{{ route('front.services') }}" class="service-card-link">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-number counter" data-count="500">0</div>
                    <div class="stat-label">Projects Delivered</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div class="stat-number counter" data-count="150">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number counter" data-count="50">0</div>
                    <div class="stat-label">Team Members</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stat-number counter" data-count="10">0</div>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section section-padding" style="background: var(--bg-primary);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">
                <i class="fas fa-users me-2"></i> Our People
            </span>
            <h2>Meet Our Leadership</h2>
            <p>Dedicated professionals committed to driving innovation and excellence.</p>
        </div>
        
        <div class="row g-4">
            @php
                $teamMembers = [
                    ['name' => 'Muhammad Rashed Hossain', 'title' => 'Founder & CEO', 'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Sarah Johnson', 'title' => 'Chief Technology Officer', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Michael Chen', 'title' => 'Director of Operations', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Emily Williams', 'title' => 'Head of Design', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face'],
                ];
            @endphp
            
            @foreach($teamMembers as $index => $member)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>{{ $member['name'] }}</h4>
                            <p class="designation">{{ $member['title'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section-padding" style="background: var(--light-color);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">
                <i class="fas fa-quote-left me-2"></i> Testimonials
            </span>
            <h2>What Our Clients Say</h2>
            <p>Hear what our clients have to say about working with us.</p>
        </div>
        
        <div class="row g-4">
            @php
                $testimonials = [
                    [
                        'content' => 'KONOK transformed our online presence completely. Their expertise in web development and dedication to quality exceeded our expectations.',
                        'name' => 'Ahmed Rahman',
                        'title' => 'CEO, TechStart Inc.',
                        'img' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face'
                    ],
                    [
                        'content' => 'The team at KONOK delivered our mobile app on time and with exceptional quality. Their attention to detail and customer service is outstanding.',
                        'name' => 'Fatima Khan',
                        'title' => 'Founder, HealthTech Solutions',
                        'img' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=100&h=100&fit=crop&crop=face'
                    ],
                    [
                        'content' => 'Working with KONOK was a game-changer for our business. Their cloud solutions helped us scale efficiently and reduce costs significantly.',
                        'name' => 'David Lee',
                        'title' => 'CTO, DataFlow Systems',
                        'img' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop&crop=face'
                    ],
                ];
            @endphp
            
            @foreach($testimonials as $index => $testimonial)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-rating" style="color: var(--warning-color);">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <div class="testimonial-content">
                            <p>{{ $testimonial['content'] }}</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}">
                            <div class="author-info">
                                <h5 style="color: var(--dark-color);">{{ $testimonial['name'] }}</h5>
                                <span style="color: var(--gray-500);">{{ $testimonial['title'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <h2>Ready to Transform Your Business?</h2>
            <p>Let's discuss how we can help you achieve your digital goals.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-primary-corporate btn-lg">
                Start Your Project <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .hero-shape {
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: var(--gradient-warm);
        border-radius: 50%;
        opacity: 0.2;
        z-index: -1;
    }
    
    .about-shape-1 {
        position: absolute;
        bottom: -30px;
        left: -30px;
        width: 150px;
        height: 150px;
        background: var(--gradient-accent);
        border-radius: 50%;
        opacity: 0.15;
        z-index: -1;
    }
</style>

@endsection
