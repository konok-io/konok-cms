<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $seoMeta = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('seo_settings')) {
                $seoMeta = \App\Models\SeoSetting::first();
            }
        } catch (\Throwable $e) {}
        
        $companyProfile = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_profiles')) {
                $companyProfile = \App\Models\CompanyProfile::first();
            }
        } catch (\Throwable $e) {}
    @endphp

    <title>@yield('title', ($companyProfile->company_name ?? 'KONOK'))</title>
    <meta name="description" content="@yield('meta_description', ($seoMeta->meta_description ?? ''))">
    <meta name="keywords" content="@yield('meta_keywords', ($seoMeta->meta_keywords ?? ''))">
    <meta name="author" content="{{ $companyProfile->company_name ?? 'KONOK' }}">

    <meta property="og:title" content="@yield('title', ($companyProfile->company_name ?? 'KONOK'))">
    <meta property="og:description" content="@yield('meta_description', ($seoMeta->meta_description ?? ''))">
    <meta property="og:type" content="website">
    @if($seoMeta && $seoMeta->og_image)
        <meta property="og:image" content="{{ asset('storage/' . $seoMeta->og_image) }}">
    @endif

    @if($siteSetting && $siteSetting->favicon)
        <link rel="icon" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @elseif($companyProfile && $companyProfile->favicon)
        <link rel="icon" href="{{ asset('storage/' . $companyProfile->favicon) }}">
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" id="bs-ltr">
    <script>
      (function(){try{
        var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);var l=m?m[1]:'';
        var rtl=['ar','ur','fa','he','ps','sd'];
        if(rtl.indexOf(l)>=0){
          var ltr=document.getElementById('bs-ltr');
          if(ltr) ltr.href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css';
        }
      }catch(e){}})();
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Corporate Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/corporate.css') }}">

    <script>
      document.documentElement.setAttribute('dir', 'ltr');
    </script>
    
    @stack('styles')
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="top-bar-left">
                        <span><i class="fas fa-phone-alt"></i> {{ $siteSetting->phone ?? '+880 1XXX-XXXXXX' }}</span>
                        <span><i class="fas fa-envelope"></i> {{ $siteSetting->email ?? 'info@konok.io' }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top-bar-right">
                        <div class="social-links-top">
                            @php
                                try {
                                    if (\Illuminate\Support\Facades\Schema::hasTable('social_links')) {
                                        $socialLinks = \App\Models\SocialLink::active()->ordered()->limit(5)->get();
                                        foreach($socialLinks as $link) {
                                            echo '<a href="' . $link->url . '" target="_blank"><i class="' . \App\Models\SocialLink::getPlatformIcon($link->platform) . '"></i></a>';
                                        }
                                    }
                                } catch (\Throwable $e) {}
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header / Navbar -->
    <header class="corporate-header" id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if($companyProfile && $companyProfile->logo)
                        <img src="{{ asset('storage/' . $companyProfile->logo) }}" alt="{{ $companyProfile->company_name }}" height="45">
                    @else
                        <span class="brand-text">KONOK</span>
                    @endif
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        
                        <!-- About Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item" href="{{ route('front.about') }}">Company Overview</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.team') }}">Our Team</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.careers') }}">Careers</a></li>
                            </ul>
                        </li>
                        
                        <!-- Services Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="{{ route('front.services') }}">All Services</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @php
                                    try {
                                        if (\Illuminate\Support\Facades\Schema::hasTable('service_categories')) {
                                            $serviceCategories = \App\Models\ServiceCategory::active()->ordered()->limit(5)->get();
                                            foreach($serviceCategories as $category) {
                                                echo '<li><a class="dropdown-item" href="' . route('front.service.category', $category->slug) . '">' . $category->name . '</a></li>';
                                            }
                                        }
                                    } catch (\Throwable $e) {}
                                @endphp
                            </ul>
                        </li>
                        
                        <!-- Solutions Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="solutionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Solutions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="solutionsDropdown">
                                <li><a class="dropdown-item" href="{{ route('front.solutions') }}">All Solutions</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @php
                                    $solutionTypes = ['ERP', 'POS', 'CRM', 'HRM', 'Accounting', 'Cloud', 'AI', 'Cyber Security'];
                                    foreach($solutionTypes as $type) {
                                        echo '<li><a class="dropdown-item" href="' . route('front.solution.type', strtolower(str_replace(' ', '-', $type))) . '">' . $type . '</a></li>';
                                    }
                                @endphp
                            </ul>
                        </li>
                        
                        <!-- Industries Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="industriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Industries
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="industriesDropdown">
                                <li><a class="dropdown-item" href="{{ route('front.industries') }}">All Industries</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @php
                                    try {
                                        if (\Illuminate\Support\Facades\Schema::hasTable('industries')) {
                                            $industries = \App\Models\Industry::active()->ordered()->limit(8)->get();
                                            foreach($industries as $industry) {
                                                echo '<li><a class="dropdown-item" href="' . route('front.industry', $industry->slug) . '">' . $industry->name . '</a></li>';
                                            }
                                        }
                                    } catch (\Throwable $e) {}
                                @endphp
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}" href="{{ route('front.projects') }}">Projects</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('front.blog') }}">Blog</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="nav-cta ms-lg-3">
                        <a href="{{ route('front.contact') }}" class="btn btn-primary-corporate">Get Started</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('corporate.partials.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/corporate.js') }}"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    confirmButtonColor: '#0066CC',
                });
            });
        </script>
    @endif

    @stack('scripts')

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
