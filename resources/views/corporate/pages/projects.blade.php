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
        
        <div class="row">
            @forelse($projects as $index => $project)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                    <p class="text-muted">No projects available at the moment. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
