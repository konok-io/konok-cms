@extends('premium.layouts.master')

@section('title', $companyProfile->company_name ?? 'KONOK' . ' - Digital Transformation Company')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
        <div class="hero-shape hero-shape-3"></div>
        <div class="hero-gradient"></div>
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        Digital Transformation Partner
                    </div>
                    <h1 class="hero-title">
                        {{ $companyProfile->tagline ?? 'Transforming Ideas Into' }} 
                        <span class="gradient-text">Digital Reality</span>
                    </h1>
                    <p class="hero-desc">
                        {{ Str::limit($companyProfile->description ?? 'We build cutting-edge digital solutions that drive growth, enhance efficiency, and create exceptional experiences for businesses worldwide.', 180) }}
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('front.contact') }}" class="btn btn-primary-gradient btn-lg me-3">
                            Start Your Project <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('front.projects') }}" class="btn btn-outline-dark btn-lg">
                            <i class="fas fa-play-circle me-2"></i> View Our Work
                        </a>
                    </div>
                    <div class="hero-trust">
                        <span>Trusted by</span>
                        <div class="trust-logos">
                            <span class="trust-item">80+</span>
                            <span class="trust-item">150+</span>
                            <span class="trust-item">6+</span>
                        </div>
                        <span>Happy Clients & Projects</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="hero-visual">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset($companyProfile->about_image ?? 'assets/img/hero-illustration.svg') }}" 
                             alt="Digital Solutions" 
                             class="hero-image">
                        <div class="floating-card card-1">
                            <i class="fas fa-rocket"></i>
                            <div>
                                <strong>Fast Delivery</strong>
                                <span>On-time project delivery</span>
                            </div>
                        </div>
                        <div class="floating-card card-2">
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
    </div>
    <div class="scroll-indicator">
        <a href="#stats">
            <span>Scroll Down</span>
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section" id="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-content">
                    <span class="counter" data-count="150" data-suffix="+">0</span>
                    <p>Projects Delivered</p>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <div class="stat-content">
                    <span class="counter" data-count="80" data-suffix="+">0</span>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <span class="counter" data-count="25" data-suffix="+">0</span>
                    <p>Expert Team</p>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-content">
                    <span class="counter" data-count="6" data-suffix="+">0</span>
                    <p>Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted Brands -->
<section class="brands-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Our Technology Stack</span>
            <h2>Powered By Industry Leaders</h2>
        </div>
        <div class="brands-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="brand-item">
                <i class="fab fa-laravel"></i>
                <span>Laravel</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-php"></i>
                <span>PHP</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-react"></i>
                <span>React</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-vuejs"></i>
                <span>Vue.js</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-node-js"></i>
                <span>Node.js</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-aws"></i>
                <span>AWS</span>
            </div>
            <div class="brand-item">
                <i class="fab fa-docker"></i>
                <span>Docker</span>
            </div>
            <div class="brand-item">
                <i class="fas fa-database"></i>
                <span>MySQL</span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-visual">
                    <div class="about-image-main">
                        <img src="{{ $companyProfile->about_image ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop' }}" 
                             alt="About KONOK">
                    </div>
                    <div class="about-experience-badge">
                        <div class="exp-number">{{ $companyProfile->founded_year ? date('Y') - $companyProfile->founded_year : '6+' }}</div>
                        <div class="exp-text">Years of<br>Excellence</div>
                    </div>
                    <div class="about-shape"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">
                    <span class="section-badge"><i class="fas fa-building me-2"></i> About Us</span>
                    <h2>{{ $companyProfile->company_name ?? 'Who We Are' }}</h2>
                    <p class="about-desc">
                        {!! $companyProfile->description ?? 'We are a passionate team of developers, designers, and strategists dedicated to transforming businesses through innovative digital solutions. With years of experience and a commitment to excellence, we help organizations leverage technology to achieve their goals.' !!}
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
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="{{ $feature['icon'] ?? 'fas fa-check' }}"></i>
                            </div>
                            <span>{{ $feature['title'] ?? '' }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <a href="{{ route('front.about') }}" class="btn btn-primary-gradient mt-4">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">What We Offer</span>
            <h2>Our Premium Services</h2>
            <p>Comprehensive digital solutions tailored to accelerate your business growth</p>
        </div>
        
        <div class="row g-4">
            @php
                $servicesList = [
                    ['icon' => 'fas fa-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern frameworks and cutting-edge technologies.'],
                    ['icon' => 'fab fa-laravel', 'title' => 'Laravel Development', 'desc' => 'Enterprise-grade Laravel solutions for robust, scalable, and secure applications.'],
                    ['icon' => 'fas fa-building', 'title' => 'ERP Solutions', 'desc' => 'Custom ERP systems to streamline operations and boost productivity.'],
                    ['icon' => 'fas fa-users-cog', 'title' => 'CRM Solutions', 'desc' => 'Powerful CRM systems to manage customer relationships effectively.'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Apps', 'desc' => 'Native and cross-platform mobile applications for iOS and Android.'],
                    ['icon' => 'fas fa-robot', 'title' => 'AI Solutions', 'desc' => 'Intelligent automation and AI-powered solutions for business optimization.'],
                    ['icon' => 'fas fa-cloud', 'title' => 'Cloud Solutions', 'desc' => 'Scalable cloud infrastructure and migration services on AWS, GCP, Azure.'],
                    ['icon' => 'fas fa-palette', 'title' => 'UI/UX Design', 'desc' => 'Beautiful, user-centric designs that enhance user experience and engagement.'],
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
                    <div class="service-card-bg"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">How We Work</span>
            <h2>Our Development Process</h2>
            <p>A systematic approach to deliver exceptional results every time</p>
        </div>
        
        <div class="process-timeline">
            <div class="process-line"></div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="process-number">01</div>
                        <div class="process-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4>Discovery</h4>
                        <p>We analyze your requirements, goals, and challenges to understand your vision completely.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="process-number">02</div>
                        <div class="process-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h4>Planning</h4>
                        <p>We create detailed roadmaps, wireframes, and technical specifications for your project.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="process-number">03</div>
                        <div class="process-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h4>Design</h4>
                        <p>Our designers craft beautiful, user-centric interfaces that engage and convert.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="process-number">04</div>
                        <div class="process-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h4>Development</h4>
                        <p>Our developers build robust, scalable solutions using industry best practices.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="process-number">05</div>
                        <div class="process-icon">
                            <i class="fas fa-vial"></i>
                        </div>
                        <h4>Testing</h4>
                        <p>Rigorous QA ensures your product is bug-free, secure, and performs flawlessly.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="process-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="process-number">06</div>
                        <div class="process-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Deployment</h4>
                        <p>We launch your product and provide ongoing support to ensure continued success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section" id="portfolio">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="header-left">
                <span class="section-badge">Our Work</span>
                <h2>Featured Projects</h2>
                <p>Showcasing our finest solutions and successful collaborations</p>
            </div>
            <a href="{{ route('front.projects') }}" class="btn btn-outline-dark">
                View All Projects <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="portfolio-grid">
            @php
                $projects = [
                    ['title' => 'Saudi Retail ERP', 'category' => 'ERP Solutions', 'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop', 'stats' => ['50+ Users', '500K+ Products', '99.9% Uptime']],
                    ['title' => 'Foundation Management System', 'category' => 'Web Application', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop', 'stats' => ['100+ Branches', '10K+ Members', 'Real-time']],
                    ['title' => 'E-Commerce Platform', 'category' => 'E-Commerce', 'image' => 'https://images.unsplash.com/photo-1556742111-a301076d9d18?w=600&h=400&fit=crop', 'stats' => ['10K+ Orders', '50K+ Products', '4.9★ Rating']],
                ];
            @endphp
            
            @foreach($projects as $index => $project)
            <div class="portfolio-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="portfolio-image">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}">
                    <div class="portfolio-overlay">
                        <a href="{{ route('front.projects') }}" class="btn btn-light btn-sm">
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
            @endforeach
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="tech-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Technologies</span>
            <h2>Our Tech Stack</h2>
            <p>We use industry-leading technologies to build powerful solutions</p>
        </div>
        
        <div class="tech-grid" data-aos="fade-up" data-aos-delay="200">
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
                    ['name' => 'Docker', 'icon' => 'fab fa-docker', 'level' => 80],
                    ['name' => 'AWS', 'icon' => 'fab fa-aws', 'level' => 85],
                    ['name' => 'Google Cloud', 'icon' => 'fab fa-google', 'level' => 75],
                    ['name' => 'Firebase', 'icon' => 'fas fa-fire', 'level' => 80],
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
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p>Real feedback from our valued clients and partners</p>
        </div>
        
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                @php
                    $testimonials = [
                        ['name' => 'Ahmed Al-Rashid', 'company' => 'TechCorp Saudi', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'KONOK delivered an exceptional ERP solution that transformed our retail operations. Their professionalism and technical expertise are outstanding.'],
                        ['name' => 'Sarah Johnson', 'company' => 'StartupXYZ', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'Working with KONOK was a game-changer for our startup. They built a scalable platform that helped us secure our Series A funding.'],
                        ['name' => 'Mohammad Hasan', 'company' => 'Logistics Plus', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'The CRM solution KONOK built for us increased our sales team productivity by 40%. Their attention to detail and customer focus is remarkable.'],
                        ['name' => 'Fatima Khan', 'company' => 'EduLearn', 'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face', 'rating' => 5, 'text' => 'KONOK developed a comprehensive learning management system that our students love. The UI/UX is intuitive and the performance is excellent.'],
                    ];
                @endphp
                
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
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
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section" id="team">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Our Team</span>
            <h2>Meet The Experts</h2>
            <p>Dedicated professionals committed to your success</p>
        </div>
        
        <div class="team-grid">
            @php
                $team = [
                    ['name' => 'Rafiqul Islam', 'role' => 'Founder & CEO', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face', 'linkedin' => '#'],
                    ['name' => 'Nusrat Jahan', 'role' => 'Chief Technology Officer', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop&crop=face', 'linkedin' => '#'],
                    ['name' => 'Kamal Ahmed', 'role' => 'Lead Developer', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop&crop=face', 'linkedin' => '#'],
                    ['name' => 'Tanvir Hossain', 'role' => 'UI/UX Designer', 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&h=300&fit=crop&crop=face', 'linkedin' => '#'],
                ];
            @endphp
            
            @foreach($team as $index => $member)
            <div class="team-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="team-image">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                    <div class="team-social">
                        <a href="{{ $member['linkedin'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h4>{{ $member['name'] }}</h4>
                    <p>{{ $member['role'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section" id="blog">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="header-left">
                <span class="section-badge">Latest Updates</span>
                <h2>From Our Blog</h2>
                <p>Insights, tutorials, and industry news</p>
            </div>
            <a href="{{ route('front.blog') }}" class="btn btn-outline-dark">
                View All Posts <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="blog-grid">
            @php
                $blogs = [
                    ['title' => 'The Future of AI in Enterprise Software Development', 'category' => 'Technology', 'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=600&h=400&fit=crop', 'date' => 'Jan 15, 2025'],
                    ['title' => 'Building Scalable Microservices with Laravel', 'category' => 'Development', 'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&h=400&fit=crop', 'date' => 'Jan 10, 2025'],
                    ['title' => 'UX Best Practices for Enterprise Applications', 'category' => 'Design', 'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop', 'date' => 'Jan 5, 2025'],
                ];
            @endphp
            
            @foreach($blogs as $index => $blog)
            <article class="blog-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="blog-image">
                    <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}">
                    <span class="blog-category">{{ $blog['category'] }}</span>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span><i class="far fa-calendar me-1"></i> {{ $blog['date'] }}</span>
                        <span><i class="far fa-clock me-1"></i> 5 min read</span>
                    </div>
                    <h4>{{ $blog['title'] }}</h4>
                    <a href="{{ route('front.blog') }}" class="blog-link">
                        Read More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="industries-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>Industries We Serve</h2>
            <p>Tailored solutions for diverse industry verticals</p>
        </div>
        
        <div class="industries-grid" data-aos="fade-up" data-aos-delay="200">
            @php
                $industries = [
                    ['name' => 'Healthcare', 'icon' => 'fas fa-heartbeat'],
                    ['name' => 'Education', 'icon' => 'fas fa-graduation-cap'],
                    ['name' => 'Retail', 'icon' => 'fas fa-shopping-cart'],
                    ['name' => 'Finance', 'icon' => 'fas fa-chart-line'],
                    ['name' => 'Logistics', 'icon' => 'fas fa-truck'],
                    ['name' => 'Manufacturing', 'icon' => 'fas fa-industry'],
                ];
            @endphp
            
            @foreach($industries as $industry)
            <div class="industry-item">
                <i class="{{ $industry['icon'] }}"></i>
                <span>{{ $industry['name'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Testimonials Swiper
    const swiper = new Swiper('.testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
});
</script>
@endpush
