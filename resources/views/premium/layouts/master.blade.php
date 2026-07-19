<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
      (function(){
        try{
          var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);
          var l=m?m[1]:'';
          var rtl=['ar','ur','fa','he','ps','sd'];
          var isRtl=rtl.indexOf(l)>=0;
          if(isRtl){
            document.documentElement.setAttribute('dir','rtl');
            document.documentElement.classList.add('rtl');
          } else {
            document.documentElement.classList.add('ltr');
          }
        }catch(e){}
      })();
    </script>

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
        
        $siteSetting = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $siteSetting = \App\Models\Setting::first();
            }
        } catch (\Throwable $e) {}
    @endphp

    <title>@yield('title', ($companyProfile->company_name ?? 'KONOK'))</title>
    <meta name="description" content="@yield('meta_description', ($seoMeta->meta_description ?? 'Leading Digital Transformation Company'))">
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" id="bs-ltr">
    
    <script>
      (function(){try{
        var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);var l=m?m[1]:'';
        var rtl=['ar','ur','fa','he','ps','sd'];
        if(rtl.indexOf(l)>=0){
          var ltr=document.getElementById('bs-ltr');
          if(ltr) ltr.href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css';
          document.documentElement.setAttribute('dir','rtl');
          document.documentElement.classList.add('rtl');
        } else {
          document.documentElement.classList.add('ltr');
        }
      }catch(e){}})();
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Premium Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">

    <style>
        /* Hide Google Translate Bar */
        .goog-te-banner-frame, .skiptranslate iframe, #goog-gt-tt {
            display: none !important;
        }
        body { top: 0 !important; }
        .goog-te-menu-value span { display: none !important; }
    </style>
    
    @stack('styles')
</head>
<body>

    <!-- Header -->
    @include('premium.components.header')

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('premium.components.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/premium.js') }}"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    confirmButtonColor: '#2563EB',
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
        
        // Counter Animation
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const update = () => {
                current += step;
                if (current < target) {
                    el.textContent = Math.floor(current) + (el.getAttribute('data-suffix') || '');
                    requestAnimationFrame(update);
                } else {
                    el.textContent = target + (el.getAttribute('data-suffix') || '');
                }
            };
            update();
        }
        
        // Intersection Observer for counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        if (!counter.classList.contains('counted')) {
                            counter.classList.add('counted');
                            animateCounter(counter);
                        }
                    });
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.stats-grid, .stats-card').forEach(el => {
            counterObserver.observe(el);
        });
    </script>

    <!-- Google Translate -->
    <script type="text/javascript">
      function googleTranslateElementInit(){
        new google.translate.TranslateElement({pageLanguage:'en',includedLanguages:'en,ar,bn,ur,hi,tl',layout:google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay:false},'google_translate_element');
      }
      function pickLang(lang){
        var host = location.hostname;
        var val = '/en/' + lang;
        var rtl=['ar','ur','fa','he','ps','sd'];
        document.cookie = 'googtrans=' + val + ';path=/';
        document.cookie = 'googtrans=' + val + ';path=/;domain=' + host;
        document.cookie = 'googtrans=' + val + ';path=/;domain=.' + host;
        if(rtl.indexOf(lang)>=0){
          document.documentElement.setAttribute('dir','rtl');
          document.documentElement.classList.remove('ltr');
          document.documentElement.classList.add('rtl');
        } else {
          document.documentElement.setAttribute('dir','ltr');
          document.documentElement.classList.remove('rtl');
          document.documentElement.classList.add('ltr');
        }
        if(lang === 'en'){
          document.cookie = 'googtrans=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT';
          document.cookie = 'googtrans=;path=/;domain=' + host + ';expires=Thu, 01 Jan 1970 00:00:00 GMT';
          document.cookie = 'googtrans=;path=/;domain=.' + host + ';expires=Thu, 01 Jan 1970 00:00:00 GMT';
        }
        location.reload();
      }
      
      window.addEventListener('load', function(){
        setTimeout(function(){
          var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);
          var l=m?m[1]:'';
          var rtl=['ar','ur','fa','he','ps','sd'];
          if(rtl.indexOf(l)>=0){
            document.documentElement.setAttribute('dir','rtl');
            document.documentElement.classList.remove('ltr');
            document.documentElement.classList.add('rtl');
          }
        }, 100);
      });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
