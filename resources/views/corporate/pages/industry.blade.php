@extends('corporate.layouts.app')

@section('title', $industry->name . ' Industry - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.industries') }}" class="text-white-50">Industries</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{!! $industry->name !!}</li>
                </ol>
            </nav>
            <div class="industry-icon-large mb-3">
                <i class="{{ $industry->icon ?? 'fas fa-industry' }}"></i>
            </div>
            <h1 class="mb-3" style="color: white;">{!! $industry->name !!}</h1>
            <p class="lead" style="max-width: 600px; margin: 0 auto;">
                @if($industry->description)
                    {!! Str::limit(strip_tags($industry->description), 150) !!}
                @endif
            </p>
        </div>
    </div>
</section>

<!-- Industry Detail Section -->
<section class="industry-detail-section section-padding" style="background: #f8fafc;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                @if($industry->description)
                <div class="industry-detail-card" style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div class="industry-description">
                        {!! $industry->description !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="why-choose-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-title text-start">
                    <span class="subtitle">Why Choose Us</span>
                    <h2>Industry-Leading Expertise</h2>
                </div>
                <p class="mb-4" style="color: #666; line-height: 1.8;">
                    With years of experience serving the {!! $industry->name !!} sector, we understand the unique challenges and opportunities in your industry. Our team delivers tailored solutions that drive real results.
                </p>
                <div class="features-list">
                    <div class="feature-item d-flex align-items-start mb-3">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; background: rgba(10,132,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-shield-alt" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h6 style="margin: 0 0 5px; color: var(--dark-color);">Enterprise Security</h6>
                            <p class="mb-0 text-muted small">Bank-grade security for your sensitive data</p>
                        </div>
                    </div>
                    <div class="feature-item d-flex align-items-start mb-3">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; background: rgba(10,132,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-clock" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h6 style="margin: 0 0 5px; color: var(--dark-color);">24/7 Support</h6>
                            <p class="mb-0 text-muted small">Round-the-clock technical assistance</p>
                        </div>
                    </div>
                    <div class="feature-item d-flex align-items-start">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; background: rgba(10,132,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-chart-line" style="color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h6 style="margin: 0 0 5px; color: var(--dark-color);">Scalable Solutions</h6>
                            <p class="mb-0 text-muted small">Grow your business without limits</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="text-center p-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border-radius: 20px; color: white;">
                    <i class="{{ $industry->icon ?? 'fas fa-industry' }}" style="font-size: 5rem; margin-bottom: 20px; opacity: 0.9;"></i>
                    <h3 style="margin-bottom: 15px;">{!! $industry->name !!}</h3>
                    <p style="opacity: 0.9; margin-bottom: 0;">Digital Transformation Partner</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <h2>Ready to Transform Your {!! $industry->name !!} Business?</h2>
            <p>Let's discuss how we can help you leverage technology for your {!! $industry->name !!} operations.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Get Started <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .industry-icon-large {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .industry-description {
        font-size: 1.1rem;
        line-height: 1.9;
        color: #555;
    }
    
    .industry-description h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }
    
    .industry-description h5:first-child {
        margin-top: 0;
    }
    
    .industry-description p {
        margin-bottom: 1rem;
    }
    
    .industry-description ul {
        padding-left: 0;
        list-style: none;
        margin-bottom: 1.5rem;
    }
    
    .industry-description ul li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        line-height: 1.6;
    }
    
    .industry-description ul li::before {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        color: var(--primary-color);
    }
    
    .solution-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
    }
    
    .section-title {
        margin-bottom: 2rem;
    }
    
    .section-title h2 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-top: 0.5rem;
    }
    
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--dark-color), #1a1a2e);
    }
    
    .cta-content h2 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .cta-content p {
        color: rgba(255,255,255,0.8);
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }
    
    .btn-cta {
        background: var(--primary-color);
        color: white;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-cta:hover {
        background: var(--secondary-color);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(10,132,255,0.3);
        color: white;
    }
    
    .why-choose-section {
        background: white;
    }
</style>
@endpush
