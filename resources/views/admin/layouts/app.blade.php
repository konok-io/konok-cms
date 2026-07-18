<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | Admin — {{ $siteSetting->site_name ?? 'KONOK' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" id="bs-ltr">
    <script>
      (function(){try{
        var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);var l=m?m[1]:'';
        var rtl=['ar','ur','fa','he','ps','sd'];
        if(rtl.indexOf(l)>=0){var ltr=document.getElementById('bs-ltr');if(ltr) ltr.href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css';}
      }catch(e){}})();
    </script>
    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- DataTables with Bootstrap 5 styling --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <script>
      // RTL support for RTL languages
      (function(){try{var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);var l=m?m[1]:'en';var rtl=['ar','ur','fa','he','ps','sd'];document.documentElement.setAttribute('dir',rtl.indexOf(l)>=0?'rtl':'ltr');}catch(e){}})();
    </script>
    <style>
      /* language switch */
      .gtranslate-wrap{position:relative}
      .gt-btn{display:inline-flex;align-items:center;gap:7px;font-size:.9rem;font-weight:500;color:#333;background:#fff;border:1px solid #e2e2e8;border-radius:20px;padding:7px 14px;cursor:pointer;transition:border-color .18s,background .18s}
      {width:38px;height:38px;justify-content:center;border-radius:50%;padding:0}
      .gt-btn:hover{border-color:#0A84FF}
      .lang-menu{position:absolute;top:44px;right:0;z-index:1050;background:#fff;border:1px solid #e2e2e8;border-radius:12px;padding:6px;display:none;box-shadow:0 24px 60px -30px rgba(0,0,0,.3);max-height:360px;overflow:auto;min-width:170px}
      body.gt-open .lang-menu{display:block}
      .lang-menu button{display:block;width:100%;text-align:left;background:none;border:0;color:#333;font-size:14.5px;padding:9px 14px;border-radius:8px;cursor:pointer}
      .lang-menu button:hover{background:#f4f4f9}
      .goog-te-banner-frame,.skiptranslate iframe{display:none!important}
      body{top:0!important}
      font font{background:transparent!important;box-shadow:none!important}
    </style>
    @stack('styles')
</head>
<body class="admin-body"
      data-flash-success="{{ session('success') }}"
      data-flash-error="{{ session('error') }}">

<div class="admin-wrapper">

    {{-- ============ SIDEBAR ============ --}}
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-circle-nodes"></i>
            <span>{{ $siteSetting->site_name ?? 'KONOK' }}</span>
        </div>

        <nav class="nav flex-column pb-4">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <div class="nav-section-title">Company</div>
            <a href="{{ route('admin.company-profile.edit') }}" class="nav-link {{ request()->routeIs('admin.company-profile.*') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i> Company Profile
            </a>
            <a href="{{ route('admin.hero-sections.index') }}" class="nav-link {{ request()->routeIs('admin.hero-sections.*') ? 'active' : '' }}">
                <i class="fa-solid fa-image"></i> Hero Sections
            </a>
            <a href="{{ route('admin.social-links.index') }}" class="nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                <i class="fa-solid fa-share-nodes"></i> Social Links
            </a>

            <div class="nav-section-title">Services</div>
            <a href="{{ route('admin.service-categories.index') }}" class="nav-link {{ request()->routeIs('admin.service-categories.*') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group"></i> Service Categories
            </a>
            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase"></i> Services
            </a>
            <a href="{{ route('admin.industries.index') }}" class="nav-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}">
                <i class="fa-solid fa-industry"></i> Industries
            </a>
            <a href="{{ route('admin.solutions.index') }}" class="nav-link {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}">
                <i class="fa-solid fa-gears"></i> Solutions
            </a>
            <a href="{{ route('admin.case-studies.index') }}" class="nav-link {{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-contract"></i> Case Studies
            </a>

            <div class="nav-section-title">Portfolio</div>
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fa-solid fa-diagram-project"></i> Projects
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fa-solid fa-quote-left"></i> Testimonials
            </a>
            <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Clients
            </a>
            <a href="{{ route('admin.partners.index') }}" class="nav-link {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <i class="fa-solid fa-handshake"></i> Partners
            </a>

            <div class="nav-section-title">Team</div>
            <a href="{{ route('admin.team-members.index') }}" class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-group"></i> Team Members
            </a>

            <div class="nav-section-title">Content</div>
            <a href="{{ route('admin.skills.index') }}" class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-simple"></i> Skills
            </a>
            <a href="{{ route('admin.experience.index') }}" class="nav-link {{ request()->routeIs('admin.experience.*') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i> Experience
            </a>
            <a href="{{ route('admin.education.index') }}" class="nav-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                <i class="fa-solid fa-graduation-cap"></i> Education
            </a>
            <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Blog Posts
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <i class="fa-solid fa-circle-question"></i> FAQs
            </a>

            <div class="nav-section-title">Careers</div>
            <a href="{{ route('admin.job-departments.index') }}" class="nav-link {{ request()->routeIs('admin.job-departments.*') ? 'active' : '' }}">
                <i class="fa-solid fa-sitemap"></i> Departments
            </a>
            <a href="{{ route('admin.job-locations.index') }}" class="nav-link {{ request()->routeIs('admin.job-locations.*') ? 'active' : '' }}">
                <i class="fa-solid fa-location-dot"></i> Locations
            </a>
            <a href="{{ route('admin.careers.index') }}" class="nav-link {{ request()->routeIs('admin.careers.*') ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase"></i> Job Listings
            </a>
            <a href="{{ route('admin.job-applications.index') }}" class="nav-link {{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-lines"></i> Applications
            </a>

            <div class="nav-section-title">Communication</div>
            @php($unread = \Illuminate\Support\Facades\Schema::hasTable('contact_messages') ? \App\Models\ContactMessage::unread()->count() : 0)
            <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Messages
                @if($unread > 0)
                    <span class="badge bg-danger ms-auto">{{ $unread }}</span>
                @endif
            </a>

            <div class="nav-section-title">Administration</div>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Users
            </a>
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-shield"></i> Roles &amp; Permissions
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-gear"></i> Site Settings
            </a>
            <a href="{{ route('admin.seo.edit') }}" class="nav-link {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                <i class="fa-solid fa-magnifying-glass-chart"></i> SEO Settings
            </a>

            <div class="nav-section-title">Account</div>
            <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="fa-solid fa-id-badge"></i> My Profile
            </a>
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Website
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    {{-- ============ MAIN CONTENT ============ --}}
    <div class="admin-content">
        <header class="admin-topbar">
            <button class="sidebar-toggle-btn" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="ms-auto d-flex align-items-center gap-3">
                {{-- Language: Google Translate --}}
                <div class="gtranslate-wrap">
                    <button type="button" class="gt-btn" onclick="document.body.classList.toggle('gt-open')">
                        <i class="fa-solid fa-language"></i>
                        <span class="d-none d-md-inline">Language</span>
                        <i class="fa-solid fa-chevron-down" style="font-size:.7em"></i>
                    </button>
                    <div id="google_translate_element" style="display:none"></div>
                    <div class="lang-menu">
                        <button type="button" onclick="pickLang('en')">English</button>
                        <button type="button" onclick="pickLang('ar')">العربية</button>
                        <button type="button" onclick="pickLang('bn')">বাংলা</button>
                        <button type="button" onclick="pickLang('ur')">اردو</button>
                        <button type="button" onclick="pickLang('hi')">हिन्दी</button>
                        <button type="button" onclick="pickLang('tl')">Filipino</button>
                    </div>
                </div>

                <a href="{{ route('admin.messages.index') }}" class="text-dark position-relative">
                    <i class="fa-solid fa-bell fs-5"></i>
                    @if($unread > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">{{ $unread }}</span>
                    @endif
                </a>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="{{ auth()->user()->avatar_url }}" width="36" height="36" class="rounded-circle object-fit-cover" alt="Avatar">
                        <span class="d-none d-md-inline small fw-semibold">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-id-badge me-2"></i>My Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="admin-main">
            @yield('content')
        </main>
    </div>
</div>

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('assets/js/admin.js') }}"></script>
<script>
    // Laravel File Manager popup helper
    function openFileManager(inputId, previewId) {
        window.addEventListener('message', function handler(e) {
            if (typeof e.data === 'string' && e.data.startsWith('http')) {
                var input = document.getElementById(inputId);
                if (input) input.value = e.data;
                var preview = previewId ? document.getElementById(previewId) : null;
                if (preview) preview.src = e.data;
                window.removeEventListener('message', handler);
            }
        });
        window.open('{{ url('laravel-filemanager') }}?type=Images', 'FileManager', 'width=900,height=600');
    }
</script>

@stack('scripts')

{{-- Google Translate --}}
<script type="text/javascript">
  function googleTranslateElementInit(){
    new google.translate.TranslateElement({pageLanguage:'en',includedLanguages:'en,ar,bn,ur,hi,tl',layout:google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay:false},'google_translate_element');
  }
  function pickLang(lang){
    document.body.classList.remove('gt-open');
    var host = location.hostname;
    var val = '/en/' + lang;
    document.cookie = 'googtrans=' + val + ';path=/';
    document.cookie = 'googtrans=' + val + ';path=/;domain=' + host;
    document.cookie = 'googtrans=' + val + ';path=/;domain=.' + host;
    if(lang === 'en'){
      document.cookie = 'googtrans=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT';
      document.cookie = 'googtrans=;path=/;domain=' + host + ';expires=Thu, 01 Jan 1970 00:00:00 GMT';
      document.cookie = 'googtrans=;path=/;domain=.' + host + ';expires=Thu, 01 Jan 1970 00:00:00 GMT';
    }
    location.reload();
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
