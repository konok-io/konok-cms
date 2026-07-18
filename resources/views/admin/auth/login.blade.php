<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login | {{ $siteSetting->site_name ?? 'KONOK' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" id="bs-ltr">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}" id="rtl-css" disabled>

    <script>
      (function(){
        try{
          var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);
          var l=m?m[1]:'';
          var rtl=['ar','ur','fa','he','ps','sd'];
          var isRtl=rtl.indexOf(l)>=0;
          if(isRtl){
            var ltr=document.getElementById('bs-ltr');
            if(ltr) ltr.href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css';
            document.documentElement.setAttribute('dir','rtl');
            document.documentElement.classList.add('rtl');
            var rtlCss=document.getElementById('rtl-css');
            if(rtlCss){rtlCss.disabled=false;}
          } else {
            document.documentElement.setAttribute('dir','ltr');
            document.documentElement.classList.add('ltr');
          }
        }catch(e){}
      })();
    </script>
    <style>
      .login-home:hover{background:rgba(10,132,255,0.18)!important;transform:translateY(-2px)}
    </style>
    
    <script>
      // Apply RTL after page fully loads (fix for Google Translate override)
      window.addEventListener('load', function(){
        setTimeout(function(){
          var m=document.cookie.match(/googtrans=\/[^\/]+\/([a-z-]+)/);
          var l=m?m[1]:'';
          var rtl=['ar','ur','fa','he','ps','sd'];
          if(rtl.indexOf(l)>=0){
            document.documentElement.setAttribute('dir','rtl');
            document.documentElement.classList.remove('ltr');
            document.documentElement.classList.add('rtl');
            var rtlCss=document.getElementById('rtl-css');
            if(rtlCss){rtlCss.disabled=false;}
          }
        }, 100);
      });
    </script>
</head>
<body>
<div class="admin-login-wrap">
    <div class="admin-login-card">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}" class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 login-home"
               style="width:56px;height:56px;background:rgba(10,132,255,0.1);text-decoration:none;transition:background .16s,transform .16s"
               aria-label="Back to home" title="Back to home">
                <i class="fa-solid fa-house fs-3" style="color:#0A84FF"></i>
            </a>
            <h4 class="fw-bold mb-1">Welcome Back</h4>
            <p class="text-muted small mb-0">Sign in to manage your website</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger small">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger small">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label-admin text-end">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label-admin text-end">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-admin-primary w-100 py-2">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Sign In
            </button>
        </form>
    </div>
</div>
</body>
</html>
