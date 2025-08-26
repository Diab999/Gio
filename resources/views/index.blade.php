<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ __('messages.company_name') }}</title>
        <!-- Favicon with cache-busting -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/favicon.ico') }}?v={{ file_exists(public_path('assets/icon/favicon.ico')) ? filemtime(public_path('assets/icon/favicon.ico')) : time() }}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <style>
        /* Ensure floating widgets aren't clipped by page sections */
        body { overflow-x: clip; }
            .brand-logo { height: 56px; width: auto; margin-{{ App::getLocale() == 'ar' ? 'left' : 'right' }}: 12px; }
            .brand-text { font-weight: 700; letter-spacing: 0.02em; }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand d-flex align-items-center" href="#page-top">
                    <img src="{{ asset('assets/img/logo.png') }}?v={{ file_exists(public_path('assets/img/logo.png')) ? filemtime(public_path('assets/img/logo.png')) : time() }}" alt="{{ __('messages.company_name') }} logo" class="brand-logo">
                    <span class="brand-text">{{ __('messages.company_name') }}</span>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">{{ __('messages.about') }}</a></li>
                        <!-- Removed Vision & Mission from home navbar per request -->
                        @if($services->count() > 0)
                        <li class="nav-item"><a class="nav-link" href="#services">{{ __('messages.services') }}</a></li>
                        @endif
                        @if($portfolios->count() > 0)
                        <li class="nav-item"><a class="nav-link" href="#portfolio">{{ __('messages.portfolio') }}</a></li>
                        @endif
                        @if($projects->count() > 0)
                        <li class="nav-item"><a class="nav-link" href="#projects">{{ __('messages.projects') }}</a></li>
                        @endif
                        @if($teamMembers->count() > 0)
                        <li class="nav-item"><a class="nav-link" href="#team">{{ __('messages.team') }}</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="#contact">{{ __('messages.contact') }}</a></li>
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
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">{{ __('messages.welcome') }}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">{{ __('messages.deliver_precision') }}</p>
                        <a class="btn btn-primary btn-xl" href="#about">{{ __('messages.find_out_more') }}</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">{{ __('messages.we_got_what_you_need') }}</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">{{ __('messages.about_description') }}</p>
                        <a class="btn btn-light btn-xl" href="#services">{{ __('messages.get_started') }}</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Vision & Mission-->
        <section class="page-section" id="vision-mission">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <!-- Mission -->
                    <div class="col-lg-6 mb-5">
                        <div class="card h-100 shadow border-0" style="border-radius: 1.25rem; overflow: hidden;">
                            <!-- Mission Tab -->
                            <div class="card-header text-white text-center py-3" style="background: linear-gradient(135deg, #f4623a 0%, #e55a35 100%); border: none;">
                                <h4 class="mb-0 fw-bold">{{ __('messages.our_mission') }}</h4>
                            </div>
                            <!-- Mission Content -->
                            <div class="card-body p-4 d-flex align-items-center" style="min-height: 140px;">
                                <div class="row align-items-center w-100">
                                    <div class="col-auto">
                                        <div class="mission-icon-wrapper text-center me-3">
                                            <i class="bi bi-bullseye text-primary" style="font-size: 3.5rem; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="card-text text-muted mb-0" style="font-size: 1.1rem; line-height: 1.7;">
                                            {{ __('messages.mission_description') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Decorative Flag -->
                                <div class="position-absolute" style="top: 10px; right: 15px;">
                                    <i class="bi bi-flag-fill text-white" style="font-size: 1.2rem; filter: drop-shadow(0 1px 2px rgba(0,0,0,0.3));"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vision -->
                    <div class="col-lg-6 mb-5">
                        <div class="card h-100 shadow border-0" style="border-radius: 1.25rem; overflow: hidden;">
                            <!-- Vision Tab -->
                            <div class="card-header text-white text-center py-3" style="background: linear-gradient(135deg, #f4623a 0%, #d14a2e 100%); border: none;">
                                <h4 class="mb-0 fw-bold">{{ __('messages.our_vision') }}</h4>
                            </div>
                            <!-- Vision Content -->
                            <div class="card-body p-4 d-flex align-items-center" style="min-height: 140px;">
                                <div class="row align-items-center w-100">
                                    <div class="col-auto">
                                        <div class="vision-icon-wrapper text-center me-3">
                                            <i class="bi bi-lightbulb-fill text-primary" style="font-size: 3.5rem; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="card-text text-muted mb-0" style="font-size: 1.1rem; line-height: 1.7;">
                                            {{ __('messages.vision_description') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Decorative Flag -->
                                <div class="position-absolute" style="top: 10px; right: 15px;">
                                    <i class="bi bi-flag-fill text-white" style="font-size: 1.2rem; filter: drop-shadow(0 1px 2px rgba(0,0,0,0.3));"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Services-->
        @if($services->count() > 0)
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <div class="text-center">
                <h2 class="text-center mt-0">{{ __('messages.our_services') }}</h2>
                <hr class="divider" />
                    <p class="text-muted mb-5">{{ __('messages.we_got_what_you_need') }}</p>
                </div>
                
                <div class="row justify-content-center g-4" lang="{{ app()->getLocale() }}">
                    @foreach($services as $service)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="service-card" lang="{{ app()->getLocale() }}">
                                <div class="service-icon-container">
                                @if($service->icon)
                                        <img src="{{ asset('storage/' . $service->icon) }}" 
                                             alt="{{ $service->getTranslation('name', app()->getLocale()) }}" 
                                             class="service-icon">
                                    @else
                                        <div class="service-icon-placeholder">
                                            <i class="bi bi-gear-fill"></i>
                                    </div>
                                @endif
                                </div>
                                <div class="service-info">
                                    <h4 class="service-name">{{ $service->getTranslation('name', app()->getLocale()) }}</h4>
                                    <p class="service-short-description">
                                        {{ $service->getTranslation('short_description', app()->getLocale()) }}
                                    </p>
                                    <a href="{{ route(app()->getLocale() . '.services.show', ['slug' => $service->slug]) }}" class="btn btn-read-more">
                                        {{ __('messages.read_more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- Portfolio-->
        @if($portfolios->count() > 0)
        <section class="page-section" id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @foreach($portfolios as $portfolio)
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="{{ $portfolio->image ? asset('storage/' . $portfolio->image) : '#' }}" title="{{ $portfolio->getTranslation('name', app()->getLocale()) }}">
                                <div class="homepage-portfolio-image-container">
                                    @if($portfolio->image)
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" 
                                             class="homepage-portfolio-image" 
                                             alt="{{ $portfolio->getTranslation('name', app()->getLocale()) }}" />
                                    @else
                                        <div class="homepage-portfolio-placeholder">
                                            <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50">{{ $portfolio->getTranslation('category', app()->getLocale()) ?? 'Portfolio' }}</div>
                                    <div class="project-name">{{ $portfolio->getTranslation('name', app()->getLocale()) }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- Projects Section-->
        @if($projects->count() > 0)
        <section class="page-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <div class="text-center mb-5">
                    <h2 class="mb-2" style="font-size:2.5rem;font-weight:500;">{{ __('messages.our_projects') }}</h2>
                    <div style="width:60px;height:4px;background:#f4623a;margin:0.5rem auto 1.5rem auto;border-radius:2px;"></div>
                    <p class="text-muted" style="font-size:1.15rem;">{{ __('messages.explore_projects') }}</p>
                </div>
                <div class="row justify-content-center g-4">
                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="card shadow border-0 h-100 project-card-custom" style="width: 370px; min-width: 300px; max-width: 370px; margin: 0 auto;">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top rounded-top" style="width:100%;height:220px;object-fit:cover;" alt="{{ $project->getTranslation('name', app()->getLocale()) }}">
                                @endif
                                <div class="card-body d-flex flex-column justify-content-between" style="padding:1.5rem 1.25rem 1.25rem 1.25rem;">
                                    <div>
                                        <h5 class="card-title mb-2" style="font-size:1.25rem;font-weight:500;">{{ $project->getTranslation('name', app()->getLocale()) }}</h5>
                                        @php
                                            $desc = $project->getTranslation('description', app()->getLocale());
                                            $desc = html_entity_decode($desc, ENT_QUOTES | ENT_HTML5);
                                            $desc = strip_tags($desc);
                                        @endphp
                                        <p class="card-text text-muted mb-3 project-desc-truncate">{{ $desc }}</p>
                                    </div>
                                    <a href="{{ route(app()->getLocale() . '.projects.show', ['slug' => $project->slug]) }}" class="btn btn-readmore mt-auto">{{ __('messages.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <button onclick="window.location.href='{{ route(app()->getLocale() . '.projects.index') }}'" class="btn btn-seeall">
                        {{ __('messages.see_all_projects') }}
                    </button>
                </div>
            </div>
        </section>
        @endif
        <!-- Team Members Section-->
        @if($teamMembers->count() > 0)
        <section class="page-section bg-light" id="team">
            <div class="container px-4 px-lg-5">
                <div class="text-center">
                    <h2 class="mt-0">{{ __('messages.our_team') }}</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">{{ __('messages.meet_the_team') }}</p>
                </div>
                <div class="team-slider-container" lang="{{ app()->getLocale() }}">
                    <div class="team-slider" id="homeTeamSlider">
                        @foreach($teamMembers as $member)
                            <div class="team-member-card" lang="{{ app()->getLocale() }}">
                                <div class="member-image-container">
                                    @if($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" 
                                             alt="{{ $member->getTranslation('name', app()->getLocale()) }}" 
                                             class="member-image">
                                    @else
                                        <div class="member-placeholder">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="member-info">
                                    <h5 class="member-role">
                                        @if(app()->getLocale() === 'ar')
                                            {!! str_replace(['(Full Stack)', '(Data Science)', '(Cybersecurity)', '(Agile)'], 
                                                ['<span class="english-term">(Full Stack)</span>', 
                                                 '<span class="english-term">(Data Science)</span>', 
                                                 '<span class="english-term">(Cybersecurity)</span>', 
                                                 '<span class="english-term">(Agile)</span>'], 
                                                $member->getTranslation('role', app()->getLocale())) !!}
                                        @else
                                            {{ $member->getTranslation('role', app()->getLocale()) }}
                                        @endif
                                    </h5>
                                    <h4 class="member-name">{{ $member->getTranslation('name', app()->getLocale()) }}</h4>
                                    <p class="member-bio">
                                        @if(app()->getLocale() === 'ar')
                                            {!! str_replace(['JavaScript', 'React', 'Node.js', 'Python', 'TensorFlow', 'CISSP', 'CEH', 'Scrum', 'Fortune 50'], 
                                                ['<span class="english-term">JavaScript</span>', 
                                                 '<span class="english-term">React</span>', 
                                                 '<span class="english-term">Node.js</span>', 
                                                 '<span class="english-term">Python</span>', 
                                                 '<span class="english-term">TensorFlow</span>', 
                                                 '<span class="english-term">CISSP</span>', 
                                                 '<span class="english-term">CEH</span>', 
                                                 '<span class="english-term">Scrum</span>', 
                                                 '<span class="english-term">Fortune 50</span>'], 
                                                $member->getTranslation('bio', app()->getLocale())) !!}
                                        @else
                                            {{ $member->getTranslation('bio', app()->getLocale()) }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @if(count($teamMembers) > 3)
                        <div class="slider-controls">
                            <button class="slider-btn prev-btn">
                                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></i>
                            </button>
                            <button class="slider-btn next-btn">
                                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route(app()->getLocale() . '.team.index') }}" class="btn btn-seeall">{{ __('messages.meet_the_team') }}</a>
                </div>
            </div>
        </section>
        @endif
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">{{ __('messages.contact_us') }}</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">{{ __('messages.contact_description') }}</p>
                    </div>
                </div>

                <!-- Contact Info Cards -->
                @if($contactInfos->count() > 0)
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    @foreach($contactInfos as $contactInfo)
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-info-card">
                                <i class="{{ $contactInfo->icon }}"></i>
                                <h4>{{ $contactInfo->getTranslation('title', app()->getLocale()) }}</h4>
                                <p>{!! nl2br(e($contactInfo->getTranslation('content', app()->getLocale()))) !!}</p>
                                @if($contactInfo->type === 'phone' && $contactInfo->working_hours)
                                    <p class="working-hours">{{ $contactInfo->working_hours }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif

                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form-container">
                            <!-- Form Progress Indicator -->
                            <div class="form-progress mb-4">
                                <div class="progress-step active" data-step="1">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="progress-step" data-step="2">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="progress-step" data-step="3">
                                    <i class="bi bi-chat"></i>
                                </div>
                                <div class="progress-step" data-step="4">
                                    <i class="bi bi-check"></i>
                                </div>
                            </div>
                            <!-- Contact Form using Laravel -->
                            <form id="contactForm" method="POST" action="{{ route(app()->getLocale() . '.contact.store') }}" novalidate data-handler="blade">
                                @csrf
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." required />
                                    <label for="name"><i class="bi bi-person me-2"></i>{{ __('messages.full_name') }}</label>
                                    <div class="invalid-feedback">{{ __('messages.name_required') }}</div>
                                    <div class="valid-feedback">{{ __('messages.looks_good') }}</div>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" required />
                                    <label for="email"><i class="bi bi-envelope me-2"></i>{{ __('messages.email_address') }}</label>
                                    <div class="invalid-feedback">{{ __('messages.valid_email_required') }}</div>
                                    <div class="valid-feedback">{{ __('messages.valid_email') }}</div>
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="(123) 456-7890" />
                                    <label for="phone"><i class="bi bi-telephone me-2"></i>{{ __('messages.phone_number') }}</label>
                                    <div class="invalid-feedback">{{ __('messages.phone_invalid') }}</div>
                                    <div class="valid-feedback">{{ __('messages.valid_phone') }}</div>
                                </div>
                                <!-- Subject input -->
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="subject" id="subject" required>
                                        <option value="">{{ __('messages.select_subject') }}</option>
                                        <option value="general">{{ __('messages.general_inquiry') }}</option>
                                        <option value="project">{{ __('messages.project_quote') }}</option>
                                        <option value="support">{{ __('messages.technical_support') }}</option>
                                        <option value="partnership">{{ __('messages.partnership') }}</option>
                                        <option value="other">{{ __('messages.other') }}</option>
                                    </select>
                                    <label for="subject"><i class="bi bi-tag me-2"></i>{{ __('messages.subject') }}</label>
                                    <div class="invalid-feedback">{{ __('messages.select_subject_required') }}</div>
                                    <div class="valid-feedback">{{ __('messages.subject_selected') }}</div>
                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="message" id="message" placeholder="Enter your message here..." style="height: 10rem" maxlength="1000" required></textarea>
                                    <label for="message"><i class="bi bi-chat-dots me-2"></i>{{ __('messages.message') }}</label>
                                    <div class="invalid-feedback">{{ __('messages.message_required') }}</div>
                                    <div class="valid-feedback">{{ __('messages.great_message') }}</div>
                                    <div class="character-counter">
                                        <span id="charCount">0</span>/1000 {{ __('messages.characters') }}
                                    </div>
                                </div>
                                <!-- Submit success message-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="form-success-message">
                                        <i class="bi bi-check-circle-fill fs-1 mb-3"></i>
                                        <h4>{{ __('messages.message_sent') }}</h4>
                                        <p>{{ __('messages.thank_you_contact') }}</p>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="form-error-message">
                                        <i class="bi bi-exclamation-triangle-fill fs-1 mb-3"></i>
                                        <h4>{{ __('messages.oops') }}</h4>
                                        <p id="errorText">{{ __('messages.try_again') }}</p>
                                    </div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid">
                                    <button class="btn btn-submit btn-xl" id="submitButton" type="submit">
                                        <span class="btn-text">
                                            <i class="bi bi-send me-2"></i>{{ __('messages.send_message') }}
                                        </span>
                                        <span class="btn-loading d-none">
                                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                            {{ __('messages.sending') }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">{{ __('messages.copyright') }} &copy; {{ date('Y') }} - {{ __('messages.company_name') }}</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitButton = document.getElementById('submitButton');
            const successMsg = document.getElementById('submitSuccessMessage');
            const errorMsg = document.getElementById('submitErrorMessage');
            const errorText = document.getElementById('errorText');

            // Progress bar logic
            const steps = document.querySelectorAll('.progress-step');
            const fields = ['name', 'email', 'phone', 'subject', 'message'];
            
            function updateProgressSteps(currentStep) {
                steps.forEach((step, index) => {
                    step.classList.remove('active', 'completed');
                    if (index < currentStep) {
                        step.classList.add('completed');
                    } else if (index === currentStep) {
                        step.classList.add('active');
                    }
                });
            }
            
            // Form validation
            function validateField(field) {
                const value = field.value.trim();
                const fieldName = field.name;
                let isValid = true;
                
                // Remove existing validation classes
                field.classList.remove('is-valid', 'is-invalid');
                
                // Validate based on field type
                // Define validation messages
                const messages = {
                    name_min: {!! json_encode(__('messages.name_min')) !!},
                    valid_email_required: {!! json_encode(__('messages.valid_email_required')) !!},
                    phone_invalid: {!! json_encode(__('messages.phone_invalid')) !!},
                    select_subject_required: {!! json_encode(__('messages.select_subject_required')) !!},
                    message_min: {!! json_encode(__('messages.message_min')) !!}
                };

                switch(fieldName) {
                    case 'name':
                        if (value.length < 2) {
                            field.classList.add('is-invalid');
                            const fb = field.parentElement.querySelector('.invalid-feedback');
                            if (fb) fb.textContent = messages.name_min;
                            isValid = false;
                        } else {
                            field.classList.add('is-valid');
                        }
                        break;
                        
                    case 'email':
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(value)) {
                            field.classList.add('is-invalid');
                            const fb = field.parentElement.querySelector('.invalid-feedback');
                            if (fb) fb.textContent = messages.valid_email_required;
                            isValid = false;
                        } else {
                            field.classList.add('is-valid');
                        }
                        break;
                        
                    case 'phone':
                        if (value && value.length > 0) {
                            const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
                            if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
                                field.classList.add('is-invalid');
                                const fb = field.parentElement.querySelector('.invalid-feedback');
                                if (fb) fb.textContent = messages.phone_invalid;
                                isValid = false;
                            } else {
                                field.classList.add('is-valid');
                            }
                        }
                        break;
                        
                    case 'subject':
                        if (!value) {
                            field.classList.add('is-invalid');
                            const fb = field.parentElement.querySelector('.invalid-feedback');
                            if (fb) fb.textContent = messages.select_subject_required;
                            isValid = false;
                        } else {
                            field.classList.add('is-valid');
                        }
                        break;
                        
                    case 'message':
                        if (value.length < 10) {
                            field.classList.add('is-invalid');
                            const fb = field.parentElement.querySelector('.invalid-feedback');
                            if (fb) fb.textContent = messages.message_min;
                            isValid = false;
                        } else {
                            field.classList.add('is-valid');
                        }
                        break;
                }
                
                return isValid;
            }
            
            // Add validation on blur
            fields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        validateField(this);
                    });
                    
                    field.addEventListener('focus', function() {
                        const idx = fields.indexOf(fieldName);
                        updateProgressSteps(idx);
                    });
                }
            });
            
            updateProgressSteps(0);

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate all fields
                let allValid = true;
                fields.forEach(fieldName => {
                    const field = document.getElementById(fieldName);
                    if (field && !validateField(field)) {
                        allValid = false;
                    }
                });
                
                if (!allValid) {
                    return;
                }
                
                submitButton.disabled = true;
                submitButton.querySelector('.btn-text').classList.add('d-none');
                submitButton.querySelector('.btn-loading').classList.remove('d-none');
                successMsg.classList.add('d-none');
                errorMsg.classList.add('d-none');
                
                const formData = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitButton.disabled = false;
                    submitButton.querySelector('.btn-text').classList.remove('d-none');
                    submitButton.querySelector('.btn-loading').classList.add('d-none');
                    
                    if (data.success) {
                        // Reset form and validation states
                        form.reset();
                        resetFormValidation();
                        successMsg.classList.remove('d-none');
                        updateProgressSteps(0);
                        
                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            successMsg.classList.add('d-none');
                        }, 5000);
                    } else {
                        errorText.textContent = data.message || '{{ __('messages.try_again') }}';
                        errorMsg.classList.remove('d-none');
                    }
                })
                .catch(error => {
                    submitButton.disabled = false;
                    submitButton.querySelector('.btn-text').classList.remove('d-none');
                    submitButton.querySelector('.btn-loading').classList.add('d-none');
                    errorText.textContent = '{{ __('messages.error_occurred') }}';
                    errorMsg.classList.remove('d-none');
                });
            });
            
            // Reset form validation
            function resetFormValidation() {
                fields.forEach(fieldName => {
                    const field = document.getElementById(fieldName);
                    if (field) {
                        field.classList.remove('is-valid', 'is-invalid');
                    }
                });
                
                // Reset character counter
                const charCount = document.getElementById('charCount');
                if (charCount) {
                    charCount.textContent = '0';
                }
                
                // Reset progress steps
                updateProgressSteps(0);
            }
            
            // Character counter
            const messageInput = document.getElementById('message');
            const charCount = document.getElementById('charCount');
            if (messageInput && charCount) {
                messageInput.addEventListener('input', function() {
                    charCount.textContent = this.value.length;
                });
            }
        });
        
        // Language switching function
        function switchLanguage(locale) {
            // Send only path + query + hash to avoid host/scheme issues
            const { pathname, search, hash } = window.location;
            const relative = `${pathname}${search}${hash}`;
            const languageSwitchUrl = `/switch-language/${locale}?current_url=${encodeURIComponent(relative)}`;
            
            window.location.href = languageSwitchUrl;
        }
        </script>
        <style>
        .project-card-custom {
            width: 370px;
            min-width: 300px;
            max-width: 370px;
            margin: 0 auto;
        }
        .project-desc-truncate {
            display: -webkit-box !important;
            -webkit-line-clamp: 4 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            height: 6.2em !important;
            line-height: 1.55 !important;
        }
        .btn-readmore {
            background: #f4623a;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            width: 140px;
            text-align: center;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px rgba(244,98,58,0.08);
        }
        .btn-readmore:hover {
            background: #c34e2e;
            color: #fff;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 4px 16px rgba(244,98,58,0.15);
        }
        .btn-seeall {
            background: #f4623a;
            color: #fff;
            border: none;
            border-radius: 2rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-size: 1.1rem;
            padding: 0.75rem 2.5rem;
            box-shadow: 0 2px 8px rgba(244,98,58,0.08);
            transition: background 0.2s, transform 0.15s;
            outline: none;
            cursor: pointer;
        }
        .btn-seeall:hover {
            background: #c34e2e;
            color: #fff;
            transform: scale(1.04);
        }
        .btn-seeall:active {
            transform: scale(0.97);
            background: #a53d1c;
        }
        .service-icon-orange {
            border: 3px solid #f4623a !important;
            background: #fff7f3 !important;
            /* Optional: add a subtle orange shadow */
            box-shadow: 0 2px 8px rgba(244,98,58,0.12) !important;
        }


        
        /* Team Member Cards Styling */
        .team-slider-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            margin: 0 auto;
        }

        .team-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 2rem;
            padding: 1rem 0;
            transform-origin: left center;
        }

        .team-member-card {
            min-width: 320px;
            max-width: 320px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            border: 1px solid rgba(0, 123, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .team-member-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f4623a, #c34e2e);
        }

        .team-member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(244, 98, 58, 0.2);
            border-color: rgba(244, 98, 58, 0.3);
        }

        .member-image-container {
            width: 160px;
            height: 160px;
            margin: 0 auto 1.5rem;
            position: relative;
        }

        .member-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(244, 98, 58, 0.2);
            transition: transform 0.3s ease;
        }

        .member-image:hover {
            transform: scale(1.05);
        }

        .member-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #f4623a, #c34e2e);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(244, 98, 58, 0.2);
        }

        .member-placeholder i {
            font-size: 3rem;
            color: #fff;
        }

        .member-info {
            text-align: center;
        }

        .member-role {
            color: #6c757d;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .member-name {
            color: #212529;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .member-bio {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            min-height: 4.5rem;
        }




        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .slider-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f4623a, #c34e2e);
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(244, 98, 58, 0.3);
        }

        .slider-btn:hover {
            background: linear-gradient(135deg, #c34e2e, #a53d1c);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 98, 58, 0.4);
        }

        .slider-btn:active {
            transform: translateY(0);
        }
        
        .slider-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: linear-gradient(135deg, #ccc, #999);
        }
        
        .slider-btn:disabled:hover {
            transform: none;
            box-shadow: 0 4px 15px rgba(244, 98, 58, 0.3);
        }

        .slider-btn i {
            font-size: 1.2rem;
        }

        /* Responsive Design for Team Cards */
        @media (max-width: 768px) {
            .team-slider {
                gap: 1rem;
            }
            
            .team-member-card {
                min-width: 280px;
                max-width: 280px;
                padding: 1.5rem;
            }
            
            .member-image-container {
                width: 140px;
                height: 140px;
            }
            
            .member-name {
                font-size: 1.1rem;
            }
            
            .member-bio {
                font-size: 0.9rem;
                min-height: 4rem;
            }
        }

        @media (max-width: 576px) {
            .team-member-card {
                min-width: 260px;
                max-width: 260px;
                padding: 1.25rem;
            }
            
            .member-image-container {
                width: 120px;
                height: 120px;
            }
            
            .member-name {
                font-size: 1rem;
            }
            
            .member-bio {
                font-size: 0.85rem;
                min-height: 3.5rem;
            }
        }
        
        .working-hours {
            font-size: 0.9rem;
            color: #6c757d;
            font-style: italic;
            margin-top: 0.5rem;
            margin-bottom: 0;
        }
        
        /* RTL Support for Contact Form */
        [dir="rtl"] .form-floating .form-control:focus ~ label,
        [dir="rtl"] .form-floating .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            right: 1rem;
            left: auto;
            text-align: right;
        }
        
        [dir="rtl"] .invalid-feedback,
        [dir="rtl"] .valid-feedback {
            text-align: right;
        }
        
        [dir="rtl"] .form-progress {
            flex-direction: row-reverse;
        }
        
        [dir="rtl"] .character-counter {
            text-align: right;
        }
        
        /* Fix RTL form control positioning */
        [dir="rtl"] .form-floating .form-control {
            text-align: right;
            padding-right: 0.75rem; /* keep compact default when not focused */
            padding-left: 0.75rem;
        }
        
        [dir="rtl"] .form-floating label {
            text-align: right;
            right: 1rem;
            left: auto;
        }
        
        /* RTL Label positioning on focus and filled state */
        [dir="rtl"] .form-floating .form-control:focus ~ label,
        [dir="rtl"] .form-floating .form-control:not(:placeholder-shown) ~ label {
            right: 0.75rem;
            left: auto;
            transform: scale(0.85) translateY(-0.6rem) translateX(0.15rem);
        }
        
        /* RTL hover effects */
        [dir="rtl"] .form-floating .form-control:hover {
            border-color: #f4623a;
        }
        
        /* RTL label hover behavior */
        [dir="rtl"] .form-floating .form-control:hover ~ label {
            color: #f4623a;
        }
        
        [dir="rtl"] .btn-submit:hover { }
        
        /* Additional RTL fixes */
        [dir="rtl"] .form-floating .form-control:focus,
        [dir="rtl"] .form-floating .form-control.is-invalid,
        [dir="rtl"] .form-floating .form-control.is-valid { }
        
        /* Fix RTL placeholder text alignment */
        [dir="rtl"] .form-floating .form-control::placeholder {
            text-align: right;
        }
        
        /* Ensure proper RTL icon positioning */
        [dir="rtl"] .form-floating label i {
            margin-left: 0.5rem;
            margin-right: 0;
        }
        
        /* RTL form validation message positioning */
        [dir="rtl"] .form-floating .invalid-feedback,
        [dir="rtl"] .form-floating .valid-feedback {
            text-align: right;
        }
        
        /* RTL character counter positioning (mirror English) */
        [dir="rtl"] .character-counter { }
        
        /* RTL Team Slider Controls */
        [dir="rtl"] .slider-controls {
            flex-direction: row-reverse;
        }
        
        [dir="rtl"] .slider-btn.prev-btn {
            order: 2;
        }
        
        [dir="rtl"] .slider-btn.next-btn {
            order: 1;
        }
        
        /* RTL Team Slider Container */
        [dir="rtl"] .team-slider-container,
        [lang="ar"] .team-slider-container {
            direction: rtl;
            justify-content: flex-end;
        }
        
        [dir="rtl"] .team-slider,
        [lang="ar"] .team-slider {
            direction: ltr;
            transform-origin: right center;
            margin-left: 0;
            margin-right: auto;
        }
        
        /* RTL Team Member Cards */
        [dir="rtl"] .team-member-card,
        [lang="ar"] .team-member-card {
            order: -1;
        }
        
        /* RTL Card Flow Implementation */
        [lang="ar"] .team-slider-container {
            flex-direction: row-reverse;
            direction: rtl;
        }
        
        [lang="ar"] .team-member-card {
            text-align: right;
            direction: rtl;
        }
        
        [lang="ar"] .team-member-card .card-body {
            text-align: right;
            direction: rtl;
        }
        
        [lang="ar"] .team-member-card h5,
        [lang="ar"] .team-member-card p {
            text-align: right;
            direction: rtl;
        }
        /* Center role and name on Arabic cards */
        [lang="ar"] .team-member-card .member-role,
        [lang="ar"] .team-member-card .member-name {
            text-align: center !important;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Isolate English terms in Arabic cards */
        [lang="ar"] .team-member-card .english-term {
            direction: ltr;
            text-align: left;
            unicode-bidi: isolate;
            display: inline-block;
        }
        
        /* RTL Card Image Positioning */
        [lang="ar"] .team-member-card .card-img-top {
            margin-left: 0;
            margin-right: auto;
        }
        
        /* RTL Card Border and Shadow */
        [lang="ar"] .team-member-card {
            border-radius: 15px 15px 15px 15px;
        }
        
        /* Ensure proper RTL positioning for team slider */
        [lang="ar"] .team-slider-container {
            justify-content: flex-end;
        }
        
        [lang="ar"] .team-slider {
            transform-origin: right center;
        }
        
        /* Fix card order for Arabic layout */
        [lang="ar"] .team-slider {
            display: flex;
            flex-direction: row-reverse;
        }
        
        /* Service Card Styling */
        .service-card {
            width: 100%;
            background-color: #f8f8f8;
            border-radius: 10px;
            padding: 3.25rem 2rem 2rem 2rem; /* extra top padding for overlapping badge */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            border: none;
            position: relative;
            overflow: visible; /* allow badge to overflow */
            height: 100%;
            text-align: center;
            cursor: pointer;
            animation: cardFadeIn 0.6s ease-out;
        }

        .service-card {
            width: 100%;
            background-color: #f8f8f8;
            border-radius: 10px;
            padding: 3.25rem 2rem 2rem 2rem; /* extra top padding for overlapping badge */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            border: none;
            position: relative;
            overflow: visible; /* allow badge to overflow */
            height: 100%;
            text-align: center;
            cursor: pointer;
            animation: cardFadeIn 0.6s ease-out;
        }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        .service-card:hover {
            background-color: #f4623a; /* orange */
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Button automatically changes when card is hovered */
        .service-card:hover .btn-read-more {
            background-color: white;
            color: #f4623a;
            border-color: white;
        }



        /* RTL Card Flow Implementation */
        [lang="ar"] .service-card {
            text-align: right;
            direction: rtl;
        }

        [lang="ar"] .service-card .service-info {
            text-align: right;
            direction: rtl;
        }

        [lang="ar"] .service-card h4,
        [lang="ar"] .service-card p {
            text-align: right;
            direction: rtl;
        }

        /* Service Icon Styling */
        .service-icon-container {
            width: 86px;
            height: 86px;
            position: absolute;
            top: -43px; /* overlap the card */
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff; /* white badge */
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .service-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px; /* slight rounding for image icons */
            object-fit: contain;
            transition: transform 0.2s ease;
            display: block;
        }

        .service-card:hover .service-icon {
            transform: scale(1.05);
        }

        .service-icon-placeholder {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #f4623a; /* main color */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease;
        }

        .service-icon-placeholder i {
            font-size: 1.6rem;
            color: #fff;
            transition: transform 0.2s ease;
        }

        .service-card:hover .service-icon-placeholder {
            transform: scale(1.05);
        }

        .service-card:hover .service-icon-placeholder i {
            transform: scale(1.05);
        }

        .service-info {
            text-align: center;
        }

        .service-name {
            color: #333;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            transition: color 0.3s;
        }

        .service-short-description {
            color: #333;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            min-height: 3rem;
            transition: color 0.3s;
        }

        /* Hover text color changes */
        .service-card:hover .service-name,
        .service-card:hover .service-short-description {
            color: white;
        }

        .btn-read-more {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            border: 2px solid #f4623a;
            border-radius: 25px;
            color: #f4623a;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            cursor: pointer;
            background-color: transparent;
        }

        .btn-read-more:hover {
            background-color: white;
            color: #f4623a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
        }



        /* Responsive Design for Service Cards */
        @media (max-width: 768px) {
            .service-card {
                padding: 1.5rem;
            }
            
            .service-icon-container {
                width: 100px;
                height: 100px;
            }
            
            .service-name {
                font-size: 1.3rem;
            }
            
            .service-short-description {
                font-size: 0.95rem;
                min-height: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .service-card {
                padding: 1.25rem;
            }
            
            .service-icon-container {
                width: 90px;
                height: 90px;
            }
            
            .service-name {
                font-size: 1.2rem;
            }
            
            .service-short-description {
                font-size: 0.9rem;
                min-height: 2rem;
            }
        }

        
        /* Minimal RTL form rules: mirror English behavior, start from right */
        [dir="rtl"] .form-floating { direction: rtl; }
        [dir="rtl"] .form-floating .form-control { text-align: right; }
        [dir="rtl"] .form-floating label { right: 1rem; left: auto; text-align: right; }
        [dir="rtl"] .form-floating .form-control:focus ~ label,
        [dir="rtl"] .form-floating .form-control:not(:placeholder-shown) ~ label { right: 0.75rem; left: auto; }
        [dir="rtl"] .form-floating .form-control::placeholder { text-align: right; }

        </style>
        
        <script>
        // Homepage Team Slider Functionality
        let homeCurrentSlide = 0;
        const homeTotalSlides = {{ count($teamMembers) }};
        const homeSlidesPerView = 3;
        const homeMaxSlides = Math.max(0, homeTotalSlides - homeSlidesPerView);

        function slideHomeTeam(direction) {
            if (direction === 'next') {
                if (homeCurrentSlide < homeMaxSlides) {
                    homeCurrentSlide++;
                }
            } else if (direction === 'prev') {
                if (homeCurrentSlide > 0) {
                    homeCurrentSlide--;
                }
            }
            
            updateHomeSlider();
        }

        function updateHomeSlider() {
            const slider = document.getElementById('homeTeamSlider');
            if (!slider) return;
            
            const isRTL = document.documentElement.dir === 'rtl' || document.documentElement.lang === 'ar';
            const translateX = isRTL ? 
                (homeCurrentSlide * 340) : 
                -(homeCurrentSlide * 340);
            
            slider.style.transform = `translateX(${translateX}px)`;
            
            // Update button states
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            
            if (prevBtn) {
                prevBtn.disabled = homeCurrentSlide === 0;
                prevBtn.style.opacity = homeCurrentSlide === 0 ? '0.5' : '1';
            }
            
            if (nextBtn) {
                nextBtn.disabled = homeCurrentSlide === homeMaxSlides;
                nextBtn.style.opacity = homeCurrentSlide === homeMaxSlides ? '0.5' : '1';
            }
        }

        // Initialize homepage team slider
        document.addEventListener('DOMContentLoaded', function() {
            updateHomeSlider();
            
            // Add click event listeners to slider buttons
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            
            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    slideHomeTeam('prev');
                });
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    slideHomeTeam('next');
                });
            }
            
            // Reset slider position when language changes (for RTL/LTR switching)
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && 
                        (mutation.attributeName === 'dir' || mutation.attributeName === 'lang')) {
                        
                        homeCurrentSlide = 0;
                        updateHomeSlider();
                        
                        // Update button icons for RTL/LTR
                        if (prevBtn && nextBtn) {
                            const prevIcon = prevBtn.querySelector('i');
                            const nextIcon = nextBtn.querySelector('i');
                            const isRTL = document.documentElement.dir === 'rtl' || document.documentElement.lang === 'ar';
                            
                            if (prevIcon && nextIcon) {
                                if (isRTL) {
                                    prevIcon.className = 'bi bi-chevron-right';
                                    nextIcon.className = 'bi bi-chevron-left';
                                } else {
                                    prevIcon.className = 'bi bi-chevron-left';
                                    nextIcon.className = 'bi bi-chevron-right';
                                }
                            }
                        }
                    }
                });
            });
            
            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['dir', 'lang']
            });
            
            // Fix RTL form behavior
            if (document.documentElement.dir === 'rtl' || document.documentElement.lang === 'ar') {
                // Ensure proper RTL form validation display
                const formControls = document.querySelectorAll('.form-control');
                formControls.forEach(control => {
                    control.addEventListener('focus', function() {
                        this.style.textAlign = 'right';
                    });
                    
                    control.addEventListener('blur', function() {
                        if (this.value) {
                            this.style.textAlign = 'right';
                        }
                    });
                });
                
                // RTL form setup is now handled by CSS
                
                // Fix RTL progress steps
                const progressSteps = document.querySelectorAll('.progress-step');
                progressSteps.forEach(step => {
                    step.style.marginRight = '0';
                    step.style.marginLeft = '0.5rem';
                });
                
                // Fix RTL team slider controls
                if (prevBtn && nextBtn) {
                    // Swap button icons for RTL
                    const prevIcon = prevBtn.querySelector('i');
                    const nextIcon = nextBtn.querySelector('i');
                    
                    if (prevIcon && nextIcon) {
                        prevIcon.className = 'bi bi-chevron-right';
                        nextIcon.className = 'bi bi-chevron-left';
                    }
                }
            }
            
            // Initial button icon setup
            if (prevBtn && nextBtn) {
                const prevIcon = prevBtn.querySelector('i');
                const nextIcon = nextBtn.querySelector('i');
                const isRTL = document.documentElement.dir === 'rtl' || document.documentElement.lang === 'ar';
                
                if (prevIcon && nextIcon) {
                    if (isRTL) {
                        prevIcon.className = 'bi bi-chevron-right';
                        nextIcon.className = 'bi bi-chevron-left';
                    } else {
                        prevIcon.className = 'bi bi-chevron-left';
                        nextIcon.className = 'bi bi-chevron-right';
                    }
                }
            }
        });
        

        </script>
        
        <style>
        /* Project card styling */
        .project-card-custom {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .project-card-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        </style>
        
        <!-- WhatsApp Component -->
        @include('components.whatsapp')

    </body>
<!-- </html>  -->