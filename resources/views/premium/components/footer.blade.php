<!-- Premium Footer -->
<footer class="premium-footer">
    <!-- CTA Section -->
    <section class="footer-cta">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <div class="cta-text">
                    <h2>Ready to Transform Your Business?</h2>
                    <p>Let's discuss your project and create something extraordinary together.</p>
                </div>
                <div class="cta-buttons">
                    <a href="{{ route('front.contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-calendar-check me-2"></i> Book Free Consultation
                    </a>
                    <a href="{{ route('front.projects') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-rocket me-2"></i> Start Your Project
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Footer -->
    <div class="footer-main">
        <div class="container">
            <div class="row g-5">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about">
                        <a href="{{ route('front.home') }}" class="footer-logo">
                            @if($companyProfile && $companyProfile->logo)
                                <img src="{{ asset($companyProfile->logo) }}" alt="{{ $companyProfile->company_name ?? 'KONOK' }}">
                            @else
                                <span class="logo-text">KONOK<span class="logo-dot">.</span></span>
                            @endif
                        </a>
                        <p class="footer-desc">
                            {{ Str::limit($companyProfile->description ?? 'Leading Digital Transformation Company delivering innovative solutions for businesses worldwide.', 200) }}
                        </p>
                        <div class="footer-social">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><a href="{{ route('front.home') }}#about">About Us</a></li>
                            <li><a href="{{ route('front.services') }}">Services</a></li>
                            <li><a href="{{ route('front.projects') }}">Portfolio</a></li>
                            <li><a href="{{ route('front.blog') }}">Blog</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-links">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="{{ route('front.services') }}">Web Development</a></li>
                            <li><a href="{{ route('front.services') }}">Laravel Development</a></li>
                            <li><a href="{{ route('front.services') }}">Mobile Apps</a></li>
                            <li><a href="{{ route('front.services') }}">ERP Solutions</a></li>
                            <li><a href="{{ route('front.services') }}">AI Solutions</a></li>
                            <li><a href="{{ route('front.services') }}">Cloud Solutions</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <h4>Contact Us</h4>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $siteSetting->address ?? 'Dhaka, Bangladesh' }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:{{ $siteSetting->phone ?? '+880 1XXX-XXXXXX' }}">{{ $siteSetting->phone ?? '+880 1XXX-XXXXXX' }}</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $siteSetting->email ?? 'info@konok.io' }}">{{ $siteSetting->email ?? 'info@konok.io' }}</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Sat - Thu: 9:00 AM - 6:00 PM</span>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-newsletter">
                        <h5>Subscribe to Newsletter</h5>
                        <form action="{{ route('front.subscribe') }}" method="POST" class="newsletter-form">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" placeholder="Your email address" required>
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'KONOK' }}. All rights reserved.</p>
                </div>
                <div class="footer-legal">
                    <a href="{{ route('front.privacy') }}">Privacy Policy</a>
                    <a href="{{ route('front.terms') }}">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>
