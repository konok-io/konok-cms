@extends('corporate.layouts.app')

@section('title', 'About Us - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">About KONOK</h1>
            <p class="lead mb-0">Empowering businesses through innovative technology solutions</p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&h=450&fit=crop" 
                         alt="About KONOK" 
                         class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">
                    <span class="about-badge">Who We Are</span>
                    <h2>{{ $companyProfile->company_name ?? 'KEY OF NEXT ONLINE KNOWLEDGE' }}</h2>
                    <p>{{ $companyProfile->description ?? 'KONOK is a leading technology solutions provider dedicated to helping businesses embrace digital transformation. With years of experience and a passion for innovation, we deliver exceptional results that drive growth and success.' }}</p>
                    <p>Our team of experts combines deep technical knowledge with creative problem-solving to deliver solutions that truly make a difference.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
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
                        <p class="text-muted">{{ $companyProfile->vision ?? 'To be the most trusted technology partner for businesses worldwide, setting new standards of excellence in digital innovation.' }}</p>
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
                        <p class="text-muted">{{ $companyProfile->mission ?? 'To empower businesses with cutting-edge technology solutions that drive efficiency, growth, and competitive advantage.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Our Values</span>
            <h2>Core Values</h2>
            <p>The principles that guide everything we do</p>
        </div>
        
        <div class="row">
            @php
                $values = [
                    ['icon' => 'fas fa-lightbulb', 'title' => 'Innovation', 'desc' => 'We constantly push boundaries to deliver cutting-edge solutions.'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Integrity', 'desc' => 'We build trust through transparency and ethical practices.'],
                    ['icon' => 'fas fa-users', 'title' => 'Collaboration', 'desc' => 'We work together to achieve shared success.'],
                    ['icon' => 'fas fa-star', 'title' => 'Excellence', 'desc' => 'We strive for the highest quality in everything we do.'],
                    ['icon' => 'fas fa-heart', 'title' => 'Customer Focus', 'desc' => 'Your success is our top priority.'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Growth', 'desc' => 'We continuously learn and improve.'],
                ];
            @endphp
            
            @foreach($values as $index => $value)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="{{ $value['icon'] }}"></i>
                        </div>
                        <h4>{{ $value['title'] }}</h4>
                        <p>{{ $value['desc'] }}</p>
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
            <h2>Ready to Work With Us?</h2>
            <p>Let's discuss how we can help you achieve your goals.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Contact Us <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
