<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Projects')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/favicon.ico') }}?v={{ file_exists(public_path('assets/icon/favicon.ico')) ? filemtime(public_path('assets/icon/favicon.ico')) : time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @if(App::getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css">
    @endif
    <style>
        .brand-logo { height: 56px; width: auto; margin-{{ App::getLocale() == 'ar' ? 'left' : 'right' }}: 12px; }
        .brand-text { font-weight: 700; letter-spacing: 0.02em; }
        :root {
            --primary: #f4623a;
            --secondary: #212529;
            --accent: #343a40;
            --bg: #f8f9fa;
            --card-bg: #fff;
            --text: #212529;
            --radius: 1.25rem;
        }
        html, body {
            font-family: 'Inter', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 1.05rem;
        }
        .navbar {
            font-weight: 600;
            letter-spacing: 0.01em;
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:focus, .navbar-nav .nav-link:hover {
            color: var(--primary) !important;
        }
        .card {
            border-radius: var(--radius);
            background: var(--card-bg);
            box-shadow: 0 2px 12px rgba(44,62,80,0.08);
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .card:hover {
            box-shadow: 0 8px 32px rgba(44,62,80,0.18), 0 1.5px 4px rgba(44,62,80,0.08);
            transform: translateY(-4px) scale(1.03);
        }
        .btn-primary, .btn-lg, .btn-submit {
            background: var(--primary) !important;
            border: none;
            border-radius: 2rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-primary:hover, .btn-lg:hover, .btn-submit:hover {
            background: #c34e2e !important;
            box-shadow: 0 4px 16px rgba(244,98,58,0.15);
        }
        .divider {
            width: 60px;
            height: 4px;
            background: var(--primary);
            margin: 1rem auto 2rem auto;
            border-radius: 2px;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            color: var(--accent);
        }
        .page-section {
            padding: 4rem 0 3rem 0;
        }
        @media (max-width: 991px) {
            .page-section {
                padding: 2.5rem 0 2rem 0;
            }
            .card-img-top {
                height: 160px !important;
            }
        }
        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }
            .card-img-top {
                height: 120px !important;
            }
            .page-section {
                padding: 1.5rem 0 1rem 0;
            }
        }
    </style>
</head>
<body>
    @if(session('locale_changed'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ App::getLocale() == 'ar' ? 'تم تغيير اللغة بنجاح!' : 'Language changed successfully!' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/{{ app()->getLocale() }}">
                <img src="{{ asset('assets/img/logo.png') }}?v={{ file_exists(public_path('assets/img/logo.png')) ? filemtime(public_path('assets/img/logo.png')) : time() }}" alt="{{ __('messages.company_name') }} logo" class="brand-logo">
                <span class="brand-text">{{ __('messages.company_name') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/{{ app()->getLocale() }}">{{ __('messages.home') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route(app()->getLocale() . '.projects.index') }}">{{ __('messages.projects') }}</a></li>
                    <!-- Remove Portfolio on non-home pages as requested -->
                    <!-- Keep team link but point to team page -->
                    <li class="nav-item"><a class="nav-link" href="{{ route(app()->getLocale() . '.team.index') }}">{{ __('messages.team') }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ App::getLocale() == 'ar' ? 'العربية' : 'English' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#" onclick="switchLanguage('en')">English</a></li>
                            <li><a class="dropdown-item" href="#" onclick="switchLanguage('ar')">العربية</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    @include('components.whatsapp')
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; {{ date('Y') }} {{ __('messages.company_name') }}. {{ __('messages.all_rights_reserved') }}</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Language switching function
        function switchLanguage(locale) {
            // Send only path + query + hash to avoid host/scheme issues
            const { pathname, search, hash } = window.location;
            const relative = `${pathname}${search}${hash}`;
            const languageSwitchUrl = `/switch-language/${locale}?current_url=${encodeURIComponent(relative)}`;
            
            window.location.href = languageSwitchUrl;
        }
    </script>
</body>
</html>