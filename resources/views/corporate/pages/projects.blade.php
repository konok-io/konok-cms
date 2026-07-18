@extends('corporate.layouts.app')

@section('title', 'Our Projects - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Our Projects</h1>
            <p class="lead mb-0">Explore our portfolio of successful projects and see how we've helped businesses grow.</p>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="projects-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Our Work</span>
            <h2>Featured Projects</h2>
            <p>Discover how we've helped various businesses achieve their digital goals.</p>
        </div>
        
        <!-- Category Filter -->
        @if(isset($categories) && $categories->count() > 0)
        <div class="text-center mb-4">
            <div class="btn-group" role="group">
                <a href="{{ route('front.projects') }}" class="btn btn-outline-primary active">All</a>
                @foreach($categories as $cat)
                <a href="#" class="btn btn-outline-primary">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>
        @endif
        
        <div class="row g-4">
            @forelse($projects as $index => $project)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="project-card h-100">
                        @if($project->featured_image)
                        <div class="project-image">
                            <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" class="img-fluid">
                            <div class="project-overlay">
                                <a href="{{ route('front.project', $project->slug) }}" class="btn btn-light">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="project-image" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-project-diagram fa-4x text-white opacity-50"></i>
                        </div>
                        @endif
                        <div class="project-content">
                            @if($project->category)
                            <span class="project-category">{{ $project->category->name }}</span>
                            @endif
                            <h4>{{ $project->title }}</h4>
                            <p>{{ Str::limit(strip_tags($project->short_description ?? ''), 100) }}</p>
                            <a href="{{ route('front.project', $project->slug) }}" class="project-link">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state py-5">
                        <i class="fas fa-folder-open fa-4x text-muted mb-4"></i>
                        <h4>Projects Coming Soon</h4>
                        <p class="text-muted">We're working on exciting projects. Please check back later.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
