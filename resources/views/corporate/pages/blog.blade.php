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
        
        <div class="row">
            @forelse($blogs as $index => $blog)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <article class="blog-card h-100">
                        @if($blog->featured_image)
                        <div class="blog-image">
                            <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid">
                            @if($blog->category)
                            <span class="blog-category-badge">{{ $blog->category->name }}</span>
                            @endif
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
                    <p class="text-muted">No blog posts available at the moment. Please check back later.</p>
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
