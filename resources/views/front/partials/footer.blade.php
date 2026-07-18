<footer class="site-footer mt-auto">
    {{-- CTA Section --}}
    <div class="footer-cta">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-3 gap-md-4">
                        <div class="cta-icon">
                            <i class="fa-solid fa-rocket"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Ready to start a project?</h4>
                            <p class="mb-0 opacity-75">Let's collaborate and bring your vision to life with modern web solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('home') }}#contact" class="btn btn-accent-custom">
                        <i class="fa-solid fa-paper-plane me-2"></i>Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Footer Content --}}
    <div class="footer-main pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                {{-- Brand Column --}}
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand">
                        <div class="footer-logo mb-3">
                            <span class="logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                            <span class="logo-text">{{ $siteSetting->site_name ?? 'Portfolio' }}</span>
                        </div>
                        <p class="mb-4 pe-lg-4">Building thoughtful, modern web experiences — from idea to launch. I specialize in creating elegant solutions that drive results.</p>
                        
                        <h6 class="footer-heading">Follow Me</h6>
                        <div class="footer-social">
                            @if($siteSetting->facebook ?? false)
                                <a href="{{ $siteSetting->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if($siteSetting->twitter ?? false)
                                <a href="{{ $siteSetting->twitter }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                            @endif
                            @if($siteSetting->linkedin ?? false)
                                <a href="{{ $siteSetting->linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                            @endif
                            @if($siteSetting->github ?? false)
                                <a href="{{ $siteSetting->github }}" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                            @endif
                            @if($siteSetting->instagram ?? false)
                                <a href="{{ $siteSetting->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Quick Links Column --}}
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-heading">Navigation</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ route('home') }}#about">About</a></li>
                        <li><a href="{{ route('home') }}#services">Services</a></li>
                        <li><a href="{{ route('projects.index') }}">Portfolio</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="{{ route('home') }}#contact">Contact</a></li>
                    </ul>
                </div>

                {{-- Services Column --}}
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-heading">Services</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ route('home') }}#services">Web Development</a></li>
                        <li><a href="{{ route('home') }}#services">UI/UX Design</a></li>
                        <li><a href="{{ route('home') }}#services">Brand Identity</a></li>
                        <li><a href="{{ route('home') }}#services">Consulting</a></li>
                    </ul>
                </div>

                {{-- Contact & Newsletter Column --}}
                <div class="col-lg-4 col-md-6">
                    <h6 class="footer-heading">Get In Touch</h6>
                    <div class="footer-contact">
                        @if($siteSetting->email ?? false)
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div>
                                    <span class="contact-label">Email</span>
                                    <a href="mailto:{{ $siteSetting->email }}">{{ $siteSetting->email }}</a>
                                </div>
                            </div>
                        @endif
                        @if($siteSetting->phone ?? false)
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                                <div>
                                    <span class="contact-label">Phone</span>
                                    <a href="tel:{{ $siteSetting->phone }}">{{ $siteSetting->phone }}</a>
                                </div>
                            </div>
                        @endif
                        @if($siteSetting->address ?? false)
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div>
                                    <span class="contact-label">Location</span>
                                    <span>{{ $siteSetting->address }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <h6 class="footer-heading mt-4">Newsletter</h6>
                    <p class="small opacity-75 mb-3">Subscribe for updates on new projects and insights.</p>
                    @if(session('newsletter_success'))
                        <div class="alert alert-success py-2 px-3 small mb-2">{{ session('newsletter_success') }}</div>
                    @endif
                    <form class="newsletter-form" action="{{ route('subscribe.store') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" aria-label="Email" required>
                            <button class="btn btn-subscribe" type="submit">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom py-4">
        <div class="container">
            <div class="row align-items-center g-3">
                <div class="col-md-6">
                    <p class="copyright mb-0">
                        &copy; {{ date('Y') }} <span class="text-white">{{ $siteSetting->site_name ?? 'Portfolio CMS' }}</span>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-badges">
                        <span class="badge-item">
                            <i class="fa-brands fa-laravel me-1"></i>Built with Laravel
                        </span>
                        <span class="badge-item">
                            <i class="fa-solid fa-code me-1"></i>Crafted with Care
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
