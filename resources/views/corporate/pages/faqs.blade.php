@extends('corporate.layouts.app')

@section('title', 'FAQ - KONOK')

@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-color)); padding: 120px 0 80px;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="mb-3" style="color: white;">Frequently Asked Questions</h1>
            <p class="lead mb-0">Find answers to common questions about our services and processes.</p>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <span class="subtitle">Have Questions?</span>
                    <h2>Frequently Asked Questions</h2>
                </div>
                
                @forelse($faqs as $category => $items)
                <div class="faq-category mb-5" data-aos="fade-up">
                    @if($category && $category !== '')
                    <h3 class="faq-category-title mb-3">
                        <i class="fas fa-folder-open me-2 text-primary"></i>
                        {{ $category }}
                    </h3>
                    @endif
                    
                    <div class="accordion" id="faqAccordion{{ $loop->index }}">
                        @foreach($items as $index => $faq)
                        <div class="accordion-item mb-3">
                            <h4 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#faq{{ $faq->id }}" 
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $faq->question }}
                                </button>
                            </h4>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                 aria-labelledby="heading{{ $faq->id }}"
                                 data-bs-parent="#faqAccordion{{ $loop->parent->index }}">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <p class="text-muted">No FAQs available at the moment. Please check back later.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <h2>Still Have Questions?</h2>
            <p>Can't find what you're looking for? Contact us directly.</p>
            <a href="{{ route('front.contact') }}" class="btn btn-cta">
                Contact Us <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
