<!-- Premium Header -->
<header class="premium-header" id="header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-left">
                    <a href="tel:{{ $siteSetting->phone ?? '+880 1XXX-XXXXXX' }}">
                        <i class="fas fa-phone-alt"></i>
                        {{ $siteSetting->phone ?? '+880 1XXX-XXXXXX' }}
                    </a>
                    <a href="mailto:{{ $siteSetting->email ?? 'info@konok.io' }}">
                        <i class="fas fa-envelope"></i>
                        {{ $siteSetting->email ?? 'info@konok.io' }}
                    </a>
                </div>
                <div class="top-bar-right">
                    @php
                        try {
                            if (\Illuminate\Support\Facades\Schema::hasTable('social_links')) {
                                $socialLinks = \App\Models\SocialLink::active()->ordered()->get();
                            }
                        } catch (\Throwable $e) {}
                    @endphp
                    <div class="social-links">
                        @if(isset($socialLinks))
                            @foreach($socialLinks as $link)
                                <a href="{{ $link->url }}" target="_blank" aria-label="{{ $link->platform }}">
                                    <i class="{{ $link->icon ?? 'fab fa-globe' }}"></i>
                                </a>
                            @endforeach
                        @else
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                    <div class="lang-switcher">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav" id="mainNav">
        <div class="container">
            <div class="nav-container">
                <!-- Logo -->
                <a href="{{ route('front.home') }}" class="nav-logo">
                    @if($companyProfile && $companyProfile->logo)
                        <img src="{{ asset($companyProfile->logo) }}" alt="{{ $companyProfile->company_name ?? 'KONOK' }}">
                    @else
                        <span class="logo-text">KONOK<span class="logo-dot">.</span></span>
                    @endif
                </a>

                <!-- Desktop Navigation -->
                <ul class="nav-menu" id="navMenu">
                    <li class="nav-item">
                        <a href="{{ route('front.home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.home') }}#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="{{ route('front.services') }}" class="nav-link">
                            Services <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <div class="dropdown-column">
                                    <h4>Development</h4>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-code"></i> Web Development</a>
                                    <a href="{{ route('front.services') }}"><i class="fab fa-laravel"></i> Laravel Development</a>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-mobile-alt"></i> Mobile Apps</a>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-robot"></i> AI Solutions</a>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Enterprise</h4>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-building"></i> ERP Solutions</a>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-users-cog"></i> CRM Solutions</a>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-cloud"></i> Cloud Solutions</a>
                                    <a href="{{ route('front.services') }}"><i class="fas fa-palette"></i> UI/UX Design</a>
                                </div>
                                <div class="dropdown-column dropdown-featured">
                                    <div class="featured-card">
                                        <h5>Ready to Transform?</h5>
                                        <p>Let's discuss your project</p>
                                        <a href="{{ route('front.contact') }}" class="btn btn-primary btn-sm">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="{{ route('front.projects') }}" class="nav-link">
                            Portfolio <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="dropdown-list">
                                <li><a href="{{ route('front.projects') }}"><i class="fas fa-th-large"></i> All Projects</a></li>
                                @php
                                    try {
                                        if (\Illuminate\Support\Facades\Schema::hasTable('project_categories')) {
                                            $projectCategories = \App\Models\ProjectCategory::active()->ordered()->limit(6)->get();
                                            foreach($projectCategories as $cat) {
                                                echo '<li><a href="'.route('front.projects').'?category='.$cat->slug.'"><i class="fas fa-folder"></i> '.$cat->name.'</a></li>';
                                            }
                                        }
                                    } catch (\Throwable $e) {}
                                @endphp
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="{{ route('front.industries') }}" class="nav-link">
                            Industries <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="dropdown-list">
                                <li><a href="{{ route('front.industries') }}"><i class="fas fa-globe"></i> All Industries</a></li>
                                @php
                                    try {
                                        if (\Illuminate\Support\Facades\Schema::hasTable('industries')) {
                                            $industries = \App\Models\Industry::active()->ordered()->limit(8)->get();
                                            foreach($industries as $industry) {
                                                echo '<li><a href="'.route('front.industry', $industry->slug).'"><i class="fas fa-industry"></i> '.$industry->name.'</a></li>';
                                            }
                                        }
                                    } catch (\Throwable $e) {}
                                @endphp
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.blog') }}" class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.careers') }}" class="nav-link {{ request()->is('careers*') ? 'active' : '' }}">Career</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.contact') }}" class="nav-link {{ request()->is('contact*') ? 'active' : '' }}">Contact</a>
                    </li>
                </ul>

                <!-- Nav Actions -->
                <div class="nav-actions">
                    <button class="search-btn" id="searchBtn" aria-label="Search">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ route('front.contact') }}" class="btn btn-primary-gradient">
                        Get Started <i class="fas fa-arrow-right"></i>
                    </a>
                    <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-content">
            <ul class="mobile-nav">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li><a href="{{ route('front.home') }}#about">About</a></li>
                <li class="has-submenu">
                    <a href="{{ route('front.services') }}">Services <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('front.services') }}">Web Development</a></li>
                        <li><a href="{{ route('front.services') }}">Laravel Development</a></li>
                        <li><a href="{{ route('front.services') }}">Mobile Apps</a></li>
                        <li><a href="{{ route('front.services') }}">AI Solutions</a></li>
                        <li><a href="{{ route('front.services') }}">ERP Solutions</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('front.projects') }}">Portfolio</a></li>
                <li><a href="{{ route('front.industries') }}">Industries</a></li>
                <li><a href="{{ route('front.blog') }}">Blog</a></li>
                <li><a href="{{ route('front.careers') }}">Career</a></li>
                <li><a href="{{ route('front.contact') }}">Contact</a></li>
            </ul>
            <div class="mobile-menu-cta">
                <a href="{{ route('front.contact') }}" class="btn btn-primary-gradient btn-block">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="search-modal-overlay" id="searchModal">
        <div class="search-modal-content">
            <button class="search-close" id="searchClose"><i class="fas fa-times"></i></button>
            <form action="{{ route('front.blog') }}" method="GET" class="search-form">
                <div class="search-input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search..." autofocus>
                </div>
                <button type="submit" class="btn btn-primary-gradient">Search</button>
            </form>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchBtn = document.getElementById('searchBtn');
    const searchModal = document.getElementById('searchModal');
    const searchClose = document.getElementById('searchClose');
    
    if (searchBtn && searchModal) {
        searchBtn.addEventListener('click', () => {
            searchModal.classList.add('active');
            searchModal.querySelector('input').focus();
        });
        
        searchClose?.addEventListener('click', () => {
            searchModal.classList.remove('active');
        });
        
        searchModal.addEventListener('click', (e) => {
            if (e.target === searchModal) {
                searchModal.classList.remove('active');
            }
        });
    }
    
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', () => {
            mobileToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
        
        // Submenu toggle
        mobileMenu.querySelectorAll('.has-submenu > a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                link.parentElement.classList.toggle('active');
            });
        });
    }
    
    // Header scroll effect
    const header = document.getElementById('header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScroll = currentScroll;
    });
});
</script>
