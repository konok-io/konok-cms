@extends('corporate.layouts.app')

@section('title', 'KONOK - Key of Next Online Knowledge')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="hero-content">
                    <span class="hero-badge">
                        <i class="fas fa-rocket me-2"></i> Innovating for Tomorrow
                    </span>
                    <h1>
                        Transforming Ideas Into
                        <span class="gradient-text">Digital Excellence</span>
                    </h1>
                    <p>
                        {{ $companyProfile->tagline ?? 'KEY OF NEXT ONLINE KNOWLEDGE - We empower businesses through cutting-edge technology solutions, helping you navigate the digital landscape with confidence.' }}
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('front.services') }}" class="btn btn-hero-primary">
                            Explore Services <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('front.contact') }}" class="btn btn-hero-secondary">
                            <i class="fas fa-play-circle me-2"></i> Contact Us
                        </a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <div class="number counter" data-count="500">0</div>
                            <div class="label">Projects Completed</div>
                        </div>
                        <div class="hero-stat">
                            <div class="number counter" data-count="150">0</div>
                            <div class="label">Happy Clients</div>
                        </div>
                        <div class="hero-stat">
                            <div class="number counter" data-count="50">0</div>
                            <div class="label">Team Members</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image text-center">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&h=500&fit=crop" 
                         alt="KONOK Digital Solutions" 
                         class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=450&fit=crop" 
                         alt="About KONOK" 
                         class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="about-content">
                    <span class="about-badge">About KONOK</span>
                    <h2>Empowering Businesses Through Technology</h2>
                    <p>
                        {{ $companyProfile->description ?? 'KEY OF NEXT ONLINE KNOWLEDGE (KONOK) is a leading technology solutions provider dedicated to helping businesses embrace digital transformation. With years of experience and a passion for innovation, we deliver exceptional results that drive growth and success.' }}
                    </p>
                    <p>
                        Our team of experts combines deep technical knowledge with creative problem-solving to deliver solutions that truly make a difference. From web development to AI integration, we cover the entire spectrum of modern technology services.
                    </p>
                    
                    <div class="about-features">
                        <div class="about-feature">
                            <i class="fas fa-check"></i>
                            <span>24/7 Support</span>
                        </div>
                        <div class="about-feature">
                            <i class="fas fa-check"></i>
                            <span>Expert Team</span>
                        </div>
                        <div class="about-feature">
                            <i class="fas fa-check"></i>
                            <span>Quality Assured</span>
                        </div>
                        <div class="about-feature">
                            <i class="fas fa-check"></i>
                            <span>On-Time Delivery</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('front.about') }}" class="btn btn-primary-corporate mt-4">
                        Learn More About Us <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="section-padding" style="background: var(--gray-50);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="fas fa-eye fa-3x text-primary"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p class="text-muted">
                            {{ $companyProfile->vision ?? 'To be the most trusted technology partner for businesses worldwide, setting new standards of excellence in digital innovation and delivering solutions that shape the future.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="fas fa-bullseye fa-3x text-primary"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p class="text-muted">
                            {{ $companyProfile->mission ?? 'To empower businesses with cutting-edge technology solutions that drive efficiency, growth, and competitive advantage while maintaining the highest standards of quality and customer satisfaction.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">What We Offer</span>
            <h2>Our Services</h2>
            <p>Comprehensive technology solutions tailored to meet your business needs and drive digital transformation.</p>
        </div>
        
        <div class="row">
            @php
                $services = [
                    ['icon' => 'fas fa-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern frameworks and best practices.'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Apps', 'desc' => 'Native and cross-platform mobile applications for iOS and Android.'],
                    ['icon' => 'fas fa-cloud', 'title' => 'Cloud Solutions', 'desc' => 'Scalable cloud infrastructure and migration services.'],
                    ['icon' => 'fas fa-robot', 'title' => 'AI Integration', 'desc' => 'Smart AI-powered solutions to automate and enhance your business processes.'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'Cyber Security', 'desc' => 'Comprehensive security solutions to protect your digital assets.'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Data Analytics', 'desc' => 'Transform data into actionable insights with advanced analytics.'],
                ];
            @endphp
            
            @foreach($services as $index => $service)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <h4>{{ $service['title'] }}</h4>
                        <p>{{ $service['desc'] }}</p>
                        <a href="{{ route('front.services') }}" class="service-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
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
<section class="team-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Our People</span>
            <h2>Meet Our Leadership</h2>
            <p>Dedicated professionals committed to driving innovation and excellence in everything we do.</p>
        </div>
        
        <div class="row">
            @php
                $teamMembers = [
                    ['name' => 'Muhammad Rashed Hossain', 'title' => 'Founder & CEO', 'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Sarah Johnson', 'title' => 'Chief Technology Officer', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Michael Chen', 'title' => 'Director of Operations', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Emily Williams', 'title' => 'Head of Design', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face'],
                ];
            @endphp
            
            @foreach($teamMembers as $index => $member)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
<section class="testimonials-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p>Don't just take our word for it - hear what our clients have to say about working with us.</p>
        </div>
        
        <div class="row">
            @php
                $testimonials = [
                    [
                        'content' => 'KONOK transformed our online presence completely. Their expertise in web development and dedication to quality exceeded our expectations. Highly recommended!',
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
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
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
                                <h5>{{ $testimonial['name'] }}</h5>
                                <span>{{ $testimonial['title'] }}</span>
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
        <div class="cta-content" data-aos="zoom-in">
            <h2>Ready to Transform Your Business?</h2>
            <p>Let's discuss how we can help you achieve your digital goals. Get in touch today for a free consultation.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Start Your Project <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
