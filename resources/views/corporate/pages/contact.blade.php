@extends('corporate.layouts.app')

@section('title', 'Contact Us - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Contact Us</h1>
            <p class="lead mb-0">Get in touch with our team - we're here to help</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-5 mb-5" data-aos="fade-right">
                <h2 class="mb-4">Let's Talk</h2>
                <p class="text-muted mb-5">Have a project in mind or need more information? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                
                <div class="contact-info">
                    @if($siteSetting)
                        @if($siteSetting->address)
                            <div class="d-flex mb-4">
                                <div class="me-3">
                                    <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">Address</h5>
                                    <p class="text-muted mb-0">{{ $siteSetting->address }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($siteSetting->phone)
                            <div class="d-flex mb-4">
                                <div class="me-3">
                                    <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">Phone</h5>
                                    <p class="text-muted mb-0">{{ $siteSetting->phone }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($siteSetting->email)
                            <div class="d-flex mb-4">
                                <div class="me-3">
                                    <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">Email</h5>
                                    <p class="text-muted mb-0">{{ $siteSetting->email }}</p>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Address</h5>
                                <p class="text-muted mb-0">Dhaka, Bangladesh</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Phone</h5>
                                <p class="text-muted mb-0">+880 1XXX-XXXXXX</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="service-icon" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="text-muted mb-0">info@konok.io</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="mt-5">
                    <h5 class="mb-3">Follow Us</h5>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <h3 class="mb-4">Send us a Message</h3>
                        <form action="{{ route('front.contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                       id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Your Message <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary-corporate w-100">
                                Send Message <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
