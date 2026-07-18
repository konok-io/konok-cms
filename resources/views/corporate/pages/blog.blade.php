@extends('corporate.layouts.app')

@section('title', ucfirst('$page') . ' - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">@yield('page-title', ucfirst('$page'))</h1>
            <p class="lead mb-0">Explore our {{ '$page' }} and discover how we can help your business grow.</p>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="text-center">
            <p class="text-muted">This page is under construction. Please check back soon!</p>
            <a href="{{ route('home') }}" class="btn btn-primary-corporate mt-3">
                <i class="fas fa-home me-2"></i> Back to Home
            </a>
        </div>
    </div>
</section>

@endsection
