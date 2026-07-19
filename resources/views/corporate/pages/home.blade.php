@extends('corporate.layouts.app')

@section('title', $companyProfile->company_name ?? 'KONOK' . ' - Digital Transformation Company')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg-shapes">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        Digital Transformation Partner
                    </div>
                    <h1 class="hero-title">
                        {{ $companyProfile->tagline ?? 'Transforming Ideas Into' }} 
                        <span class="text-gradient">Digital Reality</span>
                    </h1>
                    <p class="hero-desc">
                        {{ Str::limit($companyProfile->description ?? 'We build cutting-edge digital solutions that drive growth, enhance efficiency, and create exceptional experiences for businesses worldwide.', 180) }}
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('front.contact') }}" class="btn btn-primary-corporate btn-lg">
                            Start Your Project <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('front.projects') }}" class="btn btn-outline-corporate btn-lg">
                            <i class="fas fa-play-circle me-2"></i> View Our Work
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image-wrapper">
                    <img src="{{ $companyProfile->about_image ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop' }}" 
                         alt="Digital Solutions" 
                         class="img-fluid">
                    <div class="floating-card" style="top: 20%; left: -40px;">
                        <i class="fas fa-rocket"></i>
                        <div>
                            <strong>Fast Delivery</strong>
                            <span>On-time project delivery</span>
                        </div>
                    </div>
                    <div class="floating-card" style="bottom: 20%; right: -40px;">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <strong>100% Secure</strong>
                            <span>Enterprise-grade security</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-number counter" data-count="150" data-suffix="+">0</div>
                <div class="stat-label">Projects Delivered</div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <div class="stat-number counter" data-count="80" data-suffix="+">0</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number counter" data-count="25" data-suffix="+">0</div>
                <div class="stat-label">Expert Team</div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-number counter" data-count="6" data-suffix="+">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted Brands -->
<section class="brands-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-layer-group me-2"></i> Our Technology Stack</span>
            <h2>Powered By Industry Leaders</h2>
            <p>We use cutting-edge technologies to build powerful, scalable solutions</p>
        </div>
        <div class="brands-grid">
            <div class="brand-item" data-aos="fade-up" data-aos-delay="0">
                <i class="fab fa-laravel"></i>
                <span>Laravel</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="50">
                <i class="fab fa-php"></i>
                <span>PHP</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="100">
                <i class="fab fa-react"></i>
                <span>React</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="150">
                <i class="fab fa-vuejs"></i>
                <span>Vue.js</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="200">
                <i class="fab fa-node-js"></i>
                <span>Node.js</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="250">
                <i class="fab fa-aws"></i>
                <span>AWS</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="300">
                <i class="fab fa-docker"></i>
                <span>Docker</span>
            </div>
            <div class="brand-item" data-aos="fade-up" data-aos-delay="350">
                <i class="fas fa-database"></i>
                <span>MySQL</span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image-wrapper">
                    <img src="{{ $companyProfile->about_image ?? 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=600&h=400&fit=crop' }}" 
                         alt="About KONOK" 
                         class="img-fluid">
                    <div class="experience-badge">
                        <div class="number">{{ $companyProfile->founded_year ? date('Y') - $companyProfile->founded_year : '6+' }}</div>
                        <div class="text">Years of<br>Excellence</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="section-header left">
                    <span class="section-badge"><i class="fas fa-building me-2"></i> About Us</span>
                    <h2>{{ $companyProfile->company_name ?? 'Who We Are' }}</h2>
                </div>
                <p class="lead mb-4">
                    {!! $companyProfile->description ?? 'We are a passionate team of developers, designers, and strategists dedicated to transforming businesses through innovative digital solutions.' !!}
                </p>
                
                @php
                    $featuresRaw = $companyProfile->home_features ?? null;
                    if (is_string($featuresRaw)) {
                        $featuresRaw = json_decode($featuresRaw, true) ?? [];
                    }
                    $features = $featuresRaw ?: [
                        ['icon' => 'fas fa-lightbulb', 'title' => 'Innovation Driven'],
                        ['icon' => 'fas fa-handshake', 'title' => 'Client Focused'],
                        ['icon' => 'fas fa-check-circle', 'title' => 'Quality Assured'],
                        ['icon' => 'fas fa-link', 'title' => 'Long Term Partnership'],
                    ];
                @endphp
                
                <div class="about-features">
                    @foreach($features as $feature)
                    <div class="about-feature-item">
                        <i class="{{ $feature['icon'] ?? 'fas fa-check' }}"></i>
                        <span>{{ $feature['title'] ?? '' }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('front.about') }}" class="btn btn-primary-corporate">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-cogs me-2"></i> What We Offer</span>
            <h2>Our Premium Services</h2>
            <p>Comprehensive digital solutions tailored to accelerate your business growth</p>
        </div>
        
        <div class="row g-4">
            @php
                $servicesList = [
                    ['icon' => 'fas fa-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern frameworks.'],
                    ['icon' => 'fab fa-laravel', 'title' => 'Laravel Development', 'desc' => 'Enterprise-grade Laravel solutions.'],
                    ['icon' => 'fas fa-building', 'title' => 'ERP Solutions', 'desc' => 'Streamline operations with custom ERP.'],
                    ['icon' => 'fas fa-users-cog', 'title' => 'CRM Solutions', 'desc' => 'Manage customer relationships effectively.'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Apps', 'desc' => 'Native and cross-platform applications.'],
                    ['icon' => 'fas fa-robot', 'title' => 'AI Solutions', 'desc' => 'Intelligent automation for your business.'],
                    ['icon' => 'fas fa-cloud', 'title' => 'Cloud Solutions', 'desc' => 'Scalable cloud infrastructure.'],
                    ['icon' => 'fas fa-palette', 'title' => 'UI/UX Design', 'desc' => 'Beautiful, user-centric designs.'],
                ];
            @endphp
            
            @foreach($servicesList as $index => $service)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="{{ $service['icon'] }}"></i>
                    </div>
                    <h4>{{ $service['title'] }}</h4>
                    <p>{{ $service['desc'] }}</p>
                    <a href="{{ route('front.services') }}" class="service-link">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-tasks me-2"></i> How We Work</span>
            <h2>Our Development Process</h2>
            <p>A systematic approach to deliver exceptional results every time</p>
        </div>
        
        <div class="row g-4">
            @php
                $processes = [
                    ['icon' => 'fas fa-comments', 'title' => 'Discovery', 'desc' => 'We analyze your requirements and understand your vision.'],
                    ['icon' => 'fas fa-clipboard-list', 'title' => 'Planning', 'desc' => 'We create detailed roadmaps and specifications.'],
                    ['icon' => 'fas fa-palette', 'title' => 'Design', 'desc' => 'We craft beautiful, user-centric interfaces.'],
                    ['icon' => 'fas fa-code', 'title' => 'Development', 'desc' => 'We build robust, scalable solutions.'],
                    ['icon' => 'fas fa-vial', 'title' => 'Testing', 'desc' => 'Rigorous QA ensures quality.'],
                    ['icon' => 'fas fa-rocket', 'title' => 'Deployment', 'desc' => 'We launch and provide ongoing support.'],
                ];
            @endphp
            
            @foreach($processes as $index => $process)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="process-card">
                    <span class="process-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="process-icon">
                        <i class="{{ $process['icon'] }}"></i>
                    </div>
                    <h4>{{ $process['title'] }}</h4>
                    <p>{{ $process['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-briefcase me-2"></i> Our Work</span>
            <h2>Featured Projects</h2>
            <p>Showcasing our finest solutions and successful collaborations</p>
        </div>
        
        <div class="row g-4">
            @php
                $projects = [
                    ['title' => 'Saudi Retail ERP', 'category' => 'ERP Solutions', 'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop', 'stats' => ['50+ Users', '500K+ Products', '99.9% Uptime']],
                    ['title' => 'Foundation Management System', 'category' => 'Web Application', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop', 'stats' => ['100+ Branches', '10K+ Members', 'Real-time']],
                    ['title' => 'E-Commerce Platform', 'category' => 'E-Commerce', 'image' => 'https://images.unsplash.com/photo-1556742111-a301076d9d18?w=600&h=400&fit=crop', 'stats' => ['10K+ Orders', '50K+ Products', '4.9 Rating']],
                ];
            @endphp
            
            @foreach($projects as $index => $project)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}">
                        <div class="portfolio-overlay">
                            <a href="{{ route('front.projects') }}" class="btn btn-light-corporate btn-sm">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">{{ $project['category'] }}</span>
                        <h4>{{ $project['title'] }}</h4>
                        <div class="portfolio-stats">
                            @foreach($project['stats'] as $stat)
                            <span class="stat-tag">{{ $stat }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('front.projects') }}" class="btn btn-dark-corporate btn-lg">
                View All Projects <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="tech-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-code me-2"></i> Technologies</span>
            <h2>Our Tech Stack</h2>
            <p>We use industry-leading technologies to build powerful solutions</p>
        </div>
        
        <div class="tech-grid">
            @php
                $techs = [
                    ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'level' => 95],
                    ['name' => 'PHP', 'icon' => 'fab fa-php', 'level' => 90],
                    ['name' => 'React', 'icon' => 'fab fa-react', 'level' => 85],
                    ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs', 'level' => 80],
                    ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'level' => 75],
                    ['name' => 'Flutter', 'icon' => 'fas fa-mobile-alt', 'level' => 70],
                    ['name' => 'MySQL', 'icon' => 'fas fa-database', 'level' => 90],
                    ['name' => 'PostgreSQL', 'icon' => 'fas fa-server', 'level' => 85],
                ];
            @endphp
            
            @foreach($techs as $tech)
            <div class="tech-item">
                <div class="tech-icon">
                    <i class="{{ $tech['icon'] }}"></i>
                </div>
                <div class="tech-info">
                    <h5>{{ $tech['name'] }}</h5>
                    <div class="tech-progress">
                        <div class="progress-bar" style="width: {{ $tech['level'] }}%"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-quote-left me-2"></i> Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p>Real feedback from our valued clients and partners</p>
        </div>
        
        <div class="row g-4">
            @php
                $testimonials = [
                    ['name' => 'Ahmed Al-Rashid', 'company' => 'TechCorp Saudi', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'KONOK delivered an exceptional ERP solution that transformed our retail operations.'],
                    ['name' => 'Sarah Johnson', 'company' => 'StartupXYZ', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'Working with KONOK was a game-changer for our startup.'],
                    ['name' => 'Mohammad Hasan', 'company' => 'Logistics Plus', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'The CRM solution KONOK built increased our sales team productivity by 40%.'],
                ];
            @endphp
            
            @foreach($testimonials as $index => $testimonial)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        @for($i = 0; $i < $testimonial['rating']; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <p class="testimonial-text">{{ $testimonial['text'] }}</p>
                    <div class="testimonial-author">
                        <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}">
                        <div class="author-info">
                            <h5>{{ $testimonial['name'] }}</h5>
                            <span>{{ $testimonial['company'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><i class="fas fa-users me-2"></i> Our Team</span>
            <h2>Meet The Experts</h2>
            <p>Dedicated professionals committed to your success</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            @php
                $team = [
                    ['name' => 'Rafiqul Islam', 'role' => 'Founder & CEO', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Nusrat Jahan', 'role' => 'Chief Technology Officer', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Kamal Ahmed', 'role' => 'Lead Developer', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop&crop=face'],
                    ['name' => 'Tanvir Hossain', 'role' => 'UI/UX Designer', 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&h=300&fit=crop&crop=face'],
                ];
            @endphp
            
            @foreach($team as $index => $member)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>{{ $member['name'] }}</h4>
                        <p>{{ $member['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2>Ready to Transform Your Business?</h2>
            <p>Let's discuss your project and create something extraordinary together.</p>
            <div class="cta-buttons">
                <a href="{{ route('front.contact') }}" class="btn btn-light-corporate btn-lg">
                    <i class="fas fa-calendar-check me-2"></i> Book Free Consultation
                </a>
                <a href="{{ route('front.projects') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-rocket me-2"></i> Start Your Project
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
