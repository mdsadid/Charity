<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $setting->siteName(__($pageTitle)) }}</title>

        @include('partials.seo')

        <link rel="stylesheet" href="{{ asset('assets/universal/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/universal/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/universal/css/line-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/odometer.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/lightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/main.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/custom.css') }}">

        <style>
            .breadcrumb::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url("{{ asset($activeThemeTrue . 'images/breadcrumb-vector.png') }}") center bottom no-repeat;
                z-index: -1;
            }

            .footer-area::after {
                content: "";
                position: absolute;
                top: -1px;
                left: 0;
                width: 100%;
                height: 100px;
                background: url("{{ asset($activeThemeTrue . 'images/footer-mask.png') }}") center bottom no-repeat;
                background-size: 100% 100px;
                z-index: -1;
            }
        </style>

        @stack('page-style-lib')
        @stack('page-style')
    </head>

    <body>
        <div class="preloader">
            <div class="loader-p"></div>
        </div>

        <div class="body-overlay"></div>
        <div class="sidebar-overlay"></div>

        <a class="scroll-top">
            <i class="fas fa-angle-double-up"></i>
        </a>

        <header class="header" id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo" href="{{ route('home') }}">
                        <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_light.png') }}" alt="logo">
                    </a>
                    <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span id="hiddenNav"><i class="las la-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                            <li class="nav-item d-block d-lg-none">
                                <div class="top-button d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="language-box">
                                        <select class="select form--control form-select">
                                            <option selected>English</option>
                                            <option value="1">Bangla</option>
                                            <option value="2">French</option>
                                            <option value="3">Spanish</option>
                                        </select>
                                    </div>
                                    <ul class="login-registration-list d-flex flex-wrap align-items-center">
                                        <li class="login-registration-list__item">
                                            <a href="dashboard.html" class="btn btn--sm btn--base">Dashboard</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">@lang('Home')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about.us') }}">@lang('About Us')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('faq') }}">@lang('FAQ')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('campaign') }}">@lang('Campaigns')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('event') }}">@lang('Events')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">@lang('Contact')</a>
                            </li>
                            <li class="nav-item d-lg-block d-none">
                                <div class="d-flex gap-2">
                                    <a href="dashboard.html" class="btn btn--sm btn--base">Dashboard</a>
                                    <div class="language-box language-box-web">
                                        <select class="select form--control form-select">
                                            <option selected>English</option>
                                            <option value="1">Bangla</option>
                                            <option value="2">French</option>
                                            <option value="3">Spanish</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        @if (!request()->routeIs('home'))
            @php $breadcrumbContent = getSiteData('breadcrumb.content', true); @endphp

            <section class="breadcrumb bg-img" data-background-image="{{ getImage('assets/images/site/breadcrumb/' . $breadcrumbContent->data_info->background_image, '1920x700') }}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="breadcrumb__wrapper">
                                <h1 class="breadcrumb__title">{{ $pageTitle }}</h1>
                                <ul class="breadcrumb__list">
                                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                                    <li>{{ $pageTitle }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @yield('content')

        @php
            $footerContent         = getSiteData('footer.content', true);
            $footerElements        = getSiteData('footer.element', false, null, true);
            $footerContactElements = getSiteData('contact_us.element', false, null, true);
        @endphp

        <footer class="footer-area">
            <div class="pb-60 pt-60">
                <div class="container">
                    <div class="row justify-content-center gy-5">
                        <div class="col-xl-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="footer-item">
                                <div class="footer-item__logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_light.png') }}" alt="footer logo">
                                    </a>
                                </div>
                                <p class="footer-item__desc">{{ __(@$footerContent->data_info->footer_text) }}</p>
                                <ul class="social-list">
                                    @foreach ($footerElements as $socialInfo)
                                        <li class="social-list__item">
                                            <a href="{{ @$socialInfo->data_info->url }}" class="social-list__link flex-center">
                                                @php echo @$socialInfo->data_info->social_icon @endphp
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="footer-item">
                                <h5 class="footer-item__title">@lang('Useful Link')</h5>
                                <ul class="footer-menu">
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">Home</a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">About Us </a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">Contact Us </a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="footer-item">
                                <h5 class="footer-item__title">Categories</h5>
                                <ul class="footer-menu">
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">Blog </a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">Blog Details </a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">Dashboard </a></li>
                                    <li class="footer-menu__item"><a href="#" class="footer-menu__link"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="footer-item">
                                <h5 class="footer-item__title">@lang('Contact With Us')</h5>
                                <ul class="footer-contact-menu">
                                    @foreach ($footerContactElements as $footerContact)
                                        <li class="footer-contact-menu__item">
                                            <div class="footer-contact-menu__item-icon">
                                                @php echo $footerContact->data_info->icon @endphp
                                            </div>
                                            <div class="footer-contact-menu__item-content">
                                                <p>{{ __(@$footerContact->data_info->data) }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Top End-->

            <!-- bottom Footer -->
            <div class="bottom-footer py-3">
                <div class="container">
                    <div class="text-center">
                        <p class="bottom-footer__text">{{ __(@$footerContent->data_info->copyright_text) }}</p>
                    </div>
                </div>
            </div>
        </footer>

        @php
            $cookie = App\Models\SiteData::where('data_key', 'cookie.data')->first();
        @endphp

        @if ($cookie->data_info->status == ManageStatus::ACTIVE && !\Cookie::get('gdpr_cookie'))
            <!-- cookies dark version start -->
            <div class="cookies-card text-center hide">
                <div class="cookies-card__icon">
                    <img src="{{ getImage('assets/images/cookie.png') }}" alt="cookies">
                </div>

                <p class="mt-4 cookies-card__content">{{ $cookie->data_info->short_details }}</p>

                <div class="cookies-card__btn mt-4">
                    <button type="button" class="btn btn--base px-5 policy">@lang('Allow')</button>
                    <a href="{{ route('cookie.policy') }}" target="_blank" type="button" class="text--base px-5 pt-3">@lang('Learn More')</a>
                </div>
            </div>
            <!-- cookies dark version end -->
        @endif

        <script src="{{ asset('assets/universal/js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('assets/universal/js/bootstrap.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/slick.min.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/odometer.min.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/viewport.jquery.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/lightbox.min.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/datepicker.min.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/apexcharts.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/ckeditor.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/aos.js') }}"></script>
        <script src="{{ asset($activeThemeTrue . 'js/main.js') }}"></script>

        @include('partials.plugins')
        @include('partials.toasts')

        @stack('page-script-lib')
        @stack('page-script')

        <script>
            (function($) {
                "use strict";

                $(".langSel").on("change", function() {
                    window.location.href = "{{ route('home') }}/change/" + $(this).val();
                });

                $('.policy').on('click', function() {
                    $.get('{{ route('cookie.accept') }}', function(response) {
                        $('.cookies-card').addClass('d-none');
                    });
                });

                setTimeout(function() {
                    $('.cookies-card').removeClass('hide');
                }, 2000);

                Array.from(document.querySelectorAll('table')).forEach(table => {
                    let heading = table.querySelectorAll('thead tr th');

                    Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                        Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                            colum.setAttribute('data-label', heading[i].innerText)
                        });
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>
