<footer class="corporate-footer">
    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <div class="container">
            <div class="row align-items-center newsletter-content">
                <div class="col-lg-5">
                    <h3>Subscribe to Our Newsletter</h3>
                    <p>Get the latest updates, news and insights delivered to your inbox.</p>
                </div>
                <div class="col-lg-7">
                    <form action="{{ route('front.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn-subscribe">
                                <i class="fas fa-paper-plane me-2"></i>Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Footer -->
    <div class="footer-main">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info - 30% -->
                <div class="col-lg-4">
                    <div class="footer-column">
                        <div class="footer-column-content footer-about">
                            <div class="footer-brand">
                                <div class="footer-brand-icon">K</div>
                                <span class="footer-brand-text">{{ $companyProfile->short_name ?? 'KONOK' }}</span>
                            </div>
                            <p>{{ $companyProfile->tagline ?? 'KEY OF NEXT ONLINE KNOWLEDGE. Empowering businesses through innovative technology solutions.' }}</p>
                            <div class="footer-social">
                                @php
                                    try {
                                        if (\Illuminate\Support\Facades\Schema::hasTable('social_links')) {
                                            $socialLinks = \App\Models\SocialLink::active()->ordered()->get();
                                            foreach($socialLinks as $link) {
                                                echo '<a href="' . $link->url . '" target="_blank" title="' . ucfirst($link->platform) . '"><i class="' . \App\Models\SocialLink::getPlatformIcon($link->platform) . '"></i></a>';
                                            }
                                        } else {
                                            echo '<a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>';
                                            echo '<a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>';
                                            echo '<a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>';
                                            echo '<a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>';
                                        }
                                    } catch (\Throwable $e) {
                                        echo '<a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>';
                                        echo '<a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>';
                                        echo '<a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>';
                                        echo '<a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>';
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Remaining Columns - 70% -->
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Quick Links -->
                        <div class="col-md-4">
                            <div class="footer-column">
                                <div class="footer-column-content">
                                    <h5>Quick Links</h5>
                                    <ul class="footer-links">
                                        <li><a href="{{ route('front.about') }}"><i class="fas fa-chevron-right"></i>About Us</a></li>
                                        <li><a href="{{ route('front.services') }}"><i class="fas fa-chevron-right"></i>Services</a></li>
                                        <li><a href="{{ route('front.solutions') }}"><i class="fas fa-chevron-right"></i>Solutions</a></li>
                                        <li><a href="{{ route('front.projects') }}"><i class="fas fa-chevron-right"></i>Projects</a></li>
                                        <li><a href="{{ route('front.careers') }}"><i class="fas fa-chevron-right"></i>Careers</a></li>
                                        <li><a href="{{ route('front.contact') }}"><i class="fas fa-chevron-right"></i>Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Services -->
                        <div class="col-md-4">
                            <div class="footer-column">
                                <div class="footer-column-content">
                                    <h5>Services</h5>
                                    <ul class="footer-links">
                                        @php
                                            try {
                                                if (\Illuminate\Support\Facades\Schema::hasTable('services')) {
                                                    $footerServices = \App\Models\Service::active()->ordered()->limit(6)->get();
                                                    foreach($footerServices as $service) {
                                                        echo '<li><a href="' . route('front.service', $service->slug) . '"><i class="fas fa-chevron-right"></i>' . $service->name . '</a></li>';
                                                    }
                                                } else {
                                                    echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Web Development</a></li>';
                                                    echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Mobile Apps</a></li>';
                                                    echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Cloud Solutions</a></li>';
                                                    echo '<li><a href="#"><i class="fas fa-chevron-right"></i>AI Integration</a></li>';
                                                }
                                            } catch (\Throwable $e) {
                                                echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Web Development</a></li>';
                                                echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Mobile Apps</a></li>';
                                                echo '<li><a href="#"><i class="fas fa-chevron-right"></i>Cloud Solutions</a></li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="col-md-4">
                            <div class="footer-column">
                                <div class="footer-column-content">
                                    <h5>Contact Us</h5>
                                    <div class="footer-contact">
                                        @if($siteSetting && ($siteSetting->address || $siteSetting->phone || $siteSetting->email))
                                            @if($siteSetting->address)
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Address</span>
                                                    <span>{{ $siteSetting->address }}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($siteSetting->phone)
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Phone</span>
                                                    <span>{{ $siteSetting->phone }}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($siteSetting->email)
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Email</span>
                                                    <span>{{ $siteSetting->email }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Address</span>
                                                    <span>House 123, Road 45, Gulshan-2, Dhaka 1212, Bangladesh</span>
                                                </div>
                                            </div>
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Phone</span>
                                                    <span>+880 1700-000000</span>
                                                </div>
                                            </div>
                                            <div class="contact-item">
                                                <div class="contact-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="contact-text">
                                                    <span class="label">Email</span>
                                                    <span>info@konok.io</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-divider"></div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="footer-copyright">
                    © {{ date('Y') }} <a href="{{ route('home') }}">{{ $companyProfile->company_name ?? 'KONOK' }}</a>. All rights reserved.
                </p>
                <ul class="footer-legal">
                    <li><a href="{{ route('front.privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('front.terms') }}">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
