@extends('corporate.layouts.app')

@section('title', $blog->meta_title ?? $blog->title . ' - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.blog') }}" class="text-white-50">Blog</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ Str::limit($blog->title, 30) }}</li>
                </ol>
            </nav>
            <h1 class="mb-3" style="color: white;">{{ $blog->title }}</h1>
            <div class="blog-meta text-white-50">
                <span class="me-3"><i class="fas fa-calendar me-1"></i>{{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->created_at->format('F d, Y') }}</span>
                <span class="me-3"><i class="fas fa-eye me-1"></i>{{ $blog->views ?? 0 }} views</span>
                @if($blog->category)
                <span><i class="fas fa-folder me-1"></i>{{ $blog->category->name }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-detail-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="blog-article">
                    @if($blog->featured_image)
                    <div class="blog-featured-image mb-4">
                        <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                    </div>
                    @endif
                    
                    <!-- Short Description -->
                    @if($blog->short_description)
                    <div class="blog-excerpt lead text-muted mb-4">
                        {{ $blog->short_description }}
                    </div>
                    @endif
                    
                    <!-- Main Content -->
                    <div class="blog-content">
                        {!! $blog->description ?? $blog->content !!}
                    </div>
                    
                    <!-- Tags -->
                    @if($blog->meta_keywords)
                    <div class="blog-tags mt-4 pt-4 border-top">
                        <strong>Tags:</strong>
                        @foreach(explode(',', $blog->meta_keywords) as $tag)
                        <a href="#" class="badge bg-secondary me-1">{{ trim($tag) }}</a>
                        @endforeach
                    </div>
                    @endif
                    
                    <!-- Share Buttons -->
                    <div class="blog-share mt-4 pt-4 border-top">
                        <strong class="me-3">Share:</strong>
                        <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-info me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </article>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Related Posts -->
                    @if($relatedBlogs->count() > 0)
                    <div class="sidebar-card mb-4">
                        <h4 class="mb-3">Related Posts</h4>
                        <ul class="related-posts-list">
                            @foreach($relatedBlogs as $related)
                            <li>
                                <a href="{{ route('front.blog.show', $related->slug) }}">
                                    @if($related->featured_image)
                                    <img src="{{ asset($related->featured_image) }}" alt="{{ $related->title }}" class="related-post-thumb">
                                    @endif
                                    <div class="related-post-content">
                                        <h5>{{ $related->title }}</h5>
                                        <span class="text-muted small">{{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <!-- CTA -->
                    <div class="sidebar-card bg-primary text-white">
                        <h4>Need Help?</h4>
                        <p>Have questions about our services? We're here to help!</p>
                        <a href="{{ route('front.contact') }}" class="btn btn-light w-100">
                            <i class="fas fa-envelope me-2"></i>Contact Us
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
    .blog-article {
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .blog-content {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #444;
    }
    
    .blog-content p {
        margin-bottom: 1.5rem;
    }
    
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1rem 0;
    }
    
    .blog-sidebar .sidebar-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .related-posts-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .related-posts-list li {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }
    
    .related-posts-list li:last-child {
        border-bottom: none;
    }
    
    .related-posts-list a {
        display: flex;
        gap: 15px;
        text-decoration: none;
        color: inherit;
    }
    
    .related-post-thumb {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }
    
    .related-post-content h5 {
        font-size: 0.95rem;
        margin-bottom: 5px;
        line-height: 1.3;
        color: #333;
    }
</style>
@endpush
