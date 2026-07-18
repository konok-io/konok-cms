@extends('corporate.layouts.app')

@section('title', $project->meta_title ?? $project->title . ' - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.projects') }}" class="text-white-50">Projects</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ Str::limit($project->title, 30) }}</li>
                </ol>
            </nav>
            <h1 class="mb-3" style="color: white;">{{ $project->title }}</h1>
            @if($project->category)
            <span class="badge bg-light text-primary">{{ $project->category->name }}</span>
            @endif
        </div>
    </div>
</section>

<!-- Project Detail Section -->
<section class="project-detail-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="project-detail-card">
                    <!-- Featured Image -->
                    @if($project->featured_image)
                    <div class="project-featured-image mb-4">
                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" class="img-fluid rounded">
                    </div>
                    @endif
                    
                    <!-- Project Info -->
                    <div class="project-info mb-4">
                        <h2 class="mb-3">{{ $project->title }}</h2>
                        
                        @if($project->short_description)
                        <p class="lead text-muted">{{ $project->short_description }}</p>
                        @endif
                    </div>
                    
                    <!-- Description -->
                    @if($project->description)
                    <div class="project-description mb-4">
                        {!! $project->description !!}
                    </div>
                    @endif
                    
                    <!-- Technologies -->
                    @if($project->technologies)
                    <div class="project-technologies mb-4">
                        <h4><i class="fas fa-code me-2 text-primary"></i>Technologies Used</h4>
                        <div class="tech-tags">
                            @foreach(explode(',', $project->technologies) as $tech)
                            <span class="badge bg-secondary me-2 mb-2">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Project Meta -->
                    <div class="project-meta bg-light p-4 rounded mb-4">
                        <div class="row">
                            @if($project->client_name)
                            <div class="col-md-4 mb-3">
                                <strong><i class="fas fa-user me-2 text-primary"></i>Client</strong>
                                <p class="mb-0">{{ $project->client_name }}</p>
                            </div>
                            @endif
                            @if($project->status)
                            <div class="col-md-4 mb-3">
                                <strong><i class="fas fa-tasks me-2 text-primary"></i>Status</strong>
                                <p class="mb-0 text-capitalize">{{ $project->status }}</p>
                            </div>
                            @endif
                            @if($project->project_url)
                            <div class="col-md-4 mb-3">
                                <strong><i class="fas fa-link me-2 text-primary"></i>Project URL</strong>
                                <p class="mb-0"><a href="{{ $project->project_url }}" target="_blank">Visit Project <i class="fas fa-external-link-alt ms-1"></i></a></p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <!-- Project Gallery -->
                    @if($project->galleries && $project->galleries->count() > 0)
                    <div class="sidebar-card mb-4">
                        <h4 class="mb-3">Project Gallery</h4>
                        <div class="project-gallery">
                            @foreach($project->galleries as $gallery)
                            <a href="{{ asset($gallery->image) }}" class="gallery-item" data-lightbox="project-gallery">
                                <img src="{{ asset($gallery->image) }}" alt="Gallery Image" class="img-fluid rounded mb-2">
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- CTA -->
                    <div class="sidebar-card bg-primary text-white">
                        <h4>Start Your Project</h4>
                        <p>Ready to work with us? Let's discuss your next project!</p>
                        <a href="{{ route('front.contact') }}" class="btn btn-light w-100">
                            <i class="fas fa-envelope me-2"></i>Get in Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .project-detail-card {
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .project-description {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #555;
    }
    
    .project-sidebar .sidebar-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .project-gallery {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    
    .gallery-item {
        display: block;
    }
    
    .gallery-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .tech-tags .badge {
        font-size: 0.85rem;
        padding: 8px 15px;
    }
</style>
@endpush
