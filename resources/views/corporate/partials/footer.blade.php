<footer class="corporate-footer">
    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3>Subscribe to Our Newsletter</h3>
                    <p>Get the latest updates, news and insights delivered to your inbox.</p>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('front.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                            <button type="submit" class="btn btn-subscribe">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Footer -->
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-about">
                        @if($companyProfile && $companyProfile->logo)
                            <img src="{{ asset('storage/' . $companyProfile->logo) }}" alt="{{ $companyProfile->company_name }}" class="footer-logo mb-3" height="50">
                        @else
                            <h4 class="footer-brand">{{ $companyProfile->short_name ?? 'KONOK' }}</h4>
                        @endif
                        <p>{{ $companyProfile->tagline ?? 'KEY OF NEXT ONLINE KNOWLEDGE - Empowering businesses through innovative technology solutions.' }}</p>
                        <div class="footer-social">
                            @php
                                try {
                                    if (\Illuminate\Support\Facades\Schema::hasTable('social_links')) {
                                        $socialLinks = \App\Models\SocialLink::active()->ordered()->get();
                                        foreach($socialLinks as $link) {
                                            echo '<a href="' . $link->url . '" target="_blank" title="' . ucfirst($link->platform) . '"><i class="' . \App\Models\SocialLink::getPlatformIcon($link->platform) . '"></i></a>';
                                        }
                                    }
                                } catch (\Throwable $e) {}
                            @endphp
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                        <li><a href="{{ route('front.services') }}">Services</a></li>
                        <li><a href="{{ route('front.solutions') }}">Solutions</a></li>
                        <li><a href="{{ route('front.projects') }}">Projects</a></li>
                        <li><a href="{{ route('front.careers') }}">Careers</a></li>
                        <li><a href="{{ route('front.contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        @php
                            try {
                                if (\Illuminate\Support\Facades\Schema::hasTable('services')) {
                                    $footerServices = \App\Models\Service::active()->ordered()->limit(6)->get();
                                    foreach($footerServices as $service) {
                                        echo '<li><a href="' . route('front.service', $service->slug) . '">' . $service->name . '</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="#">Web Development</a></li>';
                                    echo '<li><a href="#">Mobile Apps</a></li>';
                                    echo '<li><a href="#">Cloud Solutions</a></li>';
                                    echo '<li><a href="#">AI Integration</a></li>';
                                }
                            } catch (\Throwable $e) {
                                echo '<li><a href="#">Web Development</a></li>';
                                echo '<li><a href="#">Mobile Apps</a></li>';
                                echo '<li><a href="#">Cloud Solutions</a></li>';
                            }
                        @endphp
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Contact Us</h5>
                    <div class="footer-contact">
                        @if($siteSetting)
                            @if($siteSetting->address)
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $siteSetting->address }}</span>
                                </div>
                            @endif
                            @if($siteSetting->phone)
                                <div class="contact-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{ $siteSetting->phone }}</span>
                                </div>
                            @endif
                            @if($siteSetting->email)
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $siteSetting->email }}</span>
                                </div>
                            @endif
                        @else
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Dhaka, Bangladesh</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>+880 1XXX-XXXXXX</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>info@konok.io</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'KONOK' }}. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer-legal">
                        <li><a href="{{ route('front.privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('front.terms') }}">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
