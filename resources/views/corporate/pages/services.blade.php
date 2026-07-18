@extends('corporate.layouts.app')

@section('title', 'Our Services - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Our Services</h1>
            <p class="lead mb-0">Comprehensive technology solutions for your business needs</p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">What We Offer</span>
            <h2>Our Services</h2>
            <p>We provide a wide range of technology services to help your business thrive in the digital age.</p>
        </div>
        
        <div class="row">
            @php
                $services = [
                    ['icon' => 'fas fa-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern frameworks like Laravel, React, and Vue.js.'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile App Development', 'desc' => 'Native and cross-platform mobile applications for iOS and Android.'],
                    ['icon' => 'fas fa-cloud', 'title' => 'Cloud Solutions', 'desc' => 'Scalable cloud infrastructure, migration, and management services.'],
                    ['icon' => 'fas fa-robot', 'title' => 'AI & Machine Learning', 'desc' => 'Smart AI-powered solutions to automate and enhance your business processes.'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'Cyber Security', 'desc' => 'Comprehensive security solutions to protect your digital assets.'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Data Analytics', 'desc' => 'Transform data into actionable insights with advanced analytics.'],
                    ['icon' => 'fas fa-shopping-cart', 'title' => 'E-commerce Solutions', 'desc' => 'Complete online store solutions with payment integration.'],
                    ['icon' => 'fas fa-cogs', 'title' => 'Custom Software', 'desc' => 'Tailored software solutions designed for your specific needs.'],
                    ['icon' => 'fas fa-headset', 'title' => 'IT Support', 'desc' => '24/7 technical support and maintenance services.'],
                ];
            @endphp
            
            @foreach($services as $index => $service)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <h4>{{ $service['title'] }}</h4>
                        <p>{{ $service['desc'] }}</p>
                        <a href="{{ route('front.contact') }}" class="service-link">
                            Get Quote <i class="fas fa-arrow-right"></i>
                        </a>
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
            <h2>Need a Custom Solution?</h2>
            <p>Let's discuss your specific requirements and find the perfect solution for your business.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Request Consultation <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
