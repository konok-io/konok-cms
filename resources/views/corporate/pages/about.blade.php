@extends('corporate.layouts.app')

@section('title', 'About Us - KONOK')

@section('content')

@if($companyProfile->description)
<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">{{ $companyProfile->company_name ?? 'About Us' }}</h1>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            @if($companyProfile->about_image)
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image">
                    <img src="{{ asset($companyProfile->about_image) }}" 
                         alt="About {{ $companyProfile->company_name ?? 'KONOK' }}" 
                         class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
            @endif
            <div class="col-lg-{{ $companyProfile->about_image ? '6' : '12' }}" data-aos="fade-left">
                <div class="about-content {{ $companyProfile->about_image ? '' : 'text-center mx-auto' }}" style="{{ $companyProfile->about_image ? '' : 'max-width: 800px;' }}">
                    <h2>{{ $companyProfile->company_name ?? 'Who We Are' }}</h2>
                    <div style="font-size: 1.1rem; line-height: 1.8; color: #555;">
                        {!! $companyProfile->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Vision & Mission -->
@if($companyProfile->vision || $companyProfile->mission)
<section class="section-padding" style="background: var(--gray-50);">
    <div class="container">
        <div class="row">
            @if($companyProfile->vision)
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="fas fa-eye fa-3x text-primary"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p class="text-muted">{!! $companyProfile->vision !!}</p>
                    </div>
                </div>
            </div>
            @endif
            
            @if($companyProfile->mission)
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="fas fa-bullseye fa-3x text-primary"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p class="text-muted">{!! $companyProfile->mission !!}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Team Section -->
@if(isset($leadership) && $leadership->count() > 0)
<section class="section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Our Team</span>
            <h2>Meet Our Team</h2>
        </div>
        
        <div class="row">
            @foreach($leadership as $member)
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="team-card text-center h-100">
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
                    <div class="team-content">
                        <h4>{{ $member->name }}</h4>
                        <p class="text-primary mb-1">{{ $member->designation }}</p>
                        @if($member->short_bio)
                            <p class="team-bio">{{ Str::limit($member->short_bio, 80) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
