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
            <div class="lead">{!! $industry->description ?? '' !!}</div>
        </div>
    </div>
</section>

<!-- Industry Detail Section -->
<section class="industry-detail-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="industry-detail-card">
                    @if($industry->description)
                    <div class="industry-description mb-4">
                        {!! $industry->description !!}
                    </div>
                    @endif
                    
                    <!-- Solutions for this industry -->
                    @if(isset($solutions) && $solutions->count() > 0)
                    <div class="solutions-for-industry">
                        <h3><i class="fas fa-lightbulb me-2 text-primary"></i>Our Solutions for {!! $industry->name !!}</h3>
                        <div class="row mt-4">
                            @foreach($solutions as $solution)
                            <div class="col-md-6 mb-3">
                                <div class="solution-item">
                                    <i class="{{ $solution->icon ?? 'fas fa-check' }} me-2 text-primary"></i>
                                    {!! $solution->title !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
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
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    
    .industry-detail-card {
        background: white;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    }
    
    .industry-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }
    
    .solution-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        font-weight: 500;
    }
</style>
@endpush
