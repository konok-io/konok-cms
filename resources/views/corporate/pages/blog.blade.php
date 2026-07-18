@extends('corporate.layouts.app')

@section('title', 'Blog - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Our Blog</h1>
            <p class="lead mb-0">Insights, tutorials, and updates from our team of experts.</p>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="subtitle">Latest Articles</span>
            <h2>From Our Blog</h2>
            <p>Stay updated with the latest news, tutorials, and insights in technology.</p>
        </div>
        
        <div class="row g-4">
            @forelse($blogs as $index => $blog)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <article class="blog-card h-100">
                        @if($blog->featured_image)
                        <div class="blog-image">
                            <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid">
                            @if($blog->category)
                            <span class="blog-category-badge">{{ $blog->category->name }}</span>
                            @endif
                        </div>
                        @else
                        <div class="blog-image" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-blog fa-4x text-white opacity-50"></i>
                        </div>
                        @endif
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar me-1"></i>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                                <span><i class="fas fa-eye me-1"></i>{{ $blog->views ?? 0 }} views</span>
                            </div>
                            <h4>{{ $blog->title }}</h4>
                            <p>{{ Str::limit(strip_tags($blog->short_description ?? ''), 100) }}</p>
                            <a href="{{ route('front.blog.show', $blog->slug) }}" class="blog-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state py-5">
                        <i class="fas fa-newspaper fa-4x text-muted mb-4"></i>
                        <h4>Blog Posts Coming Soon</h4>
                        <p class="text-muted">We're writing amazing content. Please check back later.</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($blogs->hasPages())
        <div class="pagination-wrapper text-center mt-5">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>

@endsection
