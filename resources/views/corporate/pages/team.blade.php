@extends('corporate.layouts.app')

@section('title', 'Our Team - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Meet Our Team</h1>
            <p class="lead mb-0">The talented people behind our success.</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section section-padding">
    <div class="container">
        
        <!-- Leadership Team -->
        @if(isset($leadership) && $leadership->count() > 0)
        <div class="team-group mb-5">
            <div class="section-title" data-aos="fade-up">
                <span class="subtitle">Leadership</span>
                <h2>Our Leadership Team</h2>
            </div>
            
            <div class="row">
                @foreach($leadership as $member)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="team-card text-center h-100">
                        @if($member->photo)
                        <div class="team-image">
                            <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="img-fluid">
                        </div>
                        @else
                        <div class="team-image-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        <div class="team-content">
                            <h4>{{ $member->name }}</h4>
                            <p class="text-primary mb-1">{{ $member->designation }}</p>
                            @if($member->department)
                            <p class="text-muted small mb-2">{{ $member->department }}</p>
                            @endif
                            @if($member->short_bio)
                            <p class="team-bio">{{ Str::limit($member->short_bio, 80) }}</p>
                            @endif
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="team-email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Management Team -->
        @if(isset($management) && $management->count() > 0)
        <div class="team-group mb-5">
            <div class="section-title" data-aos="fade-up">
                <span class="subtitle">Management</span>
                <h2>Management Team</h2>
            </div>
            
            <div class="row">
                @foreach($management as $member)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="team-card text-center h-100">
                        @if($member->photo)
                        <div class="team-image">
                            <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="img-fluid">
                        </div>
                        @else
                        <div class="team-image-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        <div class="team-content">
                            <h4>{{ $member->name }}</h4>
                            <p class="text-primary mb-1">{{ $member->designation }}</p>
                            @if($member->department)
                            <p class="text-muted small mb-2">{{ $member->department }}</p>
                            @endif
                            @if($member->short_bio)
                            <p class="team-bio">{{ Str::limit($member->short_bio, 80) }}</p>
                            @endif
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="team-email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Technical Team -->
        @if(isset($technical) && $technical->count() > 0)
        <div class="team-group">
            <div class="section-title" data-aos="fade-up">
                <span class="subtitle">Technical</span>
                <h2>Technical Team</h2>
            </div>
            
            <div class="row">
                @foreach($technical as $member)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="team-card text-center h-100">
                        @if($member->photo)
                        <div class="team-image">
                            <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="img-fluid">
                        </div>
                        @else
                        <div class="team-image-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        <div class="team-content">
                            <h4>{{ $member->name }}</h4>
                            <p class="text-primary mb-1">{{ $member->designation }}</p>
                            @if($member->department)
                            <p class="text-muted small mb-2">{{ $member->department }}</p>
                            @endif
                            @if($member->short_bio)
                            <p class="team-bio">{{ Str::limit($member->short_bio, 80) }}</p>
                            @endif
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="team-email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        @if((!isset($leadership) || $leadership->count() === 0) && (!isset($management) || $management->count() === 0) && (!isset($technical) || $technical->count() === 0))
        <div class="text-center">
            <p class="text-muted">Team information will be available soon.</p>
        </div>
        @endif
    </div>
</section>

@endsection
