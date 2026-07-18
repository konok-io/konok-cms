@extends('corporate.layouts.app')

@section('title', $industry->name . ' Industry - KONOK')

@section('content')

@if($industry->description)
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
        </div>
    </div>
</section>

<!-- Industry Detail Section -->
<section class="industry-detail-section section-padding" style="background: #f8fafc;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="industry-detail-card" style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div class="industry-description">
                        {!! $industry->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@else

<!-- No Content State -->
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
            <h1 class="mb-3" style="color: white;">{!! $industry->name !!}</h1>
        </div>
    </div>
</section>

<section class="section-padding" style="background: #f8fafc; min-height: 50vh;">
    <div class="container">
        <div class="text-center py-5">
            <i class="fas fa-clock" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
            <h4 style="color: #666;">Content Coming Soon</h4>
            <p class="text-muted">This page is under development. Please check back later.</p>
            <a href="{{ route('front.industries') }}" class="btn btn-primary mt-3">
                <i class="fas fa-arrow-left me-2"></i>Back to Industries
            </a>
        </div>
    </div>
</section>

@endif

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
</style>
@endpush
