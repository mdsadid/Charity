@extends($activeTheme . 'layouts.app')

@section('content')
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
                                        <option selected value="en">English</option>
                                        <option value="bn">Bangla</option>
                                    </select>
                                </div>

                                <ul class="login-registration-list d-flex flex-wrap align-items-center">
                                    <li class="login-registration-list__item">
                                        @guest
                                            <a href="{{ route('user.login.form') }}" class="btn btn--sm btn--base">@lang('Log In')</a>
                                        @endguest

                                        @auth
                                            @if (request()->routeIs('user.*'))
                                                <a href="{{ route('home') }}" class="btn btn--sm btn--base">@lang('Home')</a>
                                            @else
                                                <a href="{{ route('user.home') }}" class="btn btn--sm btn--base">@lang('Dashboard')</a>
                                            @endif
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @if (!request()->routeIs('user.*'))
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
                        @else
                            @auth
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @lang('My Campaign')
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.campaign.create') }}" class="dropdown-menu__link">@lang('Create Campaign')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.campaign.index') }}" class="dropdown-menu__link">@lang('All Campaigns')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.campaign.approved') }}" class="dropdown-menu__link">@lang('Approved Campaigns')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.campaign.pending') }}" class="dropdown-menu__link">@lang('Pending Campaigns')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.campaign.rejected') }}" class="dropdown-menu__link">@lang('Rejected Campaigns')</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->user()->username }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.home') }}" class="dropdown-menu__link">@lang('Dashboard')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.profile') }}" class="dropdown-menu__link">@lang('Profile Settings')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.change.password') }}" class="dropdown-menu__link">@lang('Change Password')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.twofactor.form') }}" class="dropdown-menu__link">@lang('2FA Settings')</a>
                                        </li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.donation.history') }}" class="dropdown-menu__link">@lang('My Donations')</a>
                                        </li>
                                        <li class="dropdown-menu__list"><a class="dropdown-menu__link" href="transaction-log.html">Transactions Log</a></li>
                                        <li class="dropdown-menu__list"><a class="dropdown-menu__link" href="received-donation.html">Received Donation</a></li>
                                        <li class="dropdown-menu__list">
                                            <a href="{{ route('user.logout') }}" class="dropdown-menu__link">@lang('Log Out')</a>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                        @endif

                        <li class="nav-item d-lg-block d-none">
                            <div class="d-flex gap-2">
                                @guest
                                    <a href="{{ route('user.login.form') }}" class="btn btn--sm btn--base">@lang('Log In')</a>
                                @endguest

                                @auth
                                    @if (request()->routeIs('user.*'))
                                        <a href="{{ route('home') }}" class="btn btn--sm btn--base">@lang('Home')</a>
                                    @else
                                        <a href="{{ route('user.home') }}" class="btn btn--sm btn--base">@lang('Dashboard')</a>
                                    @endif
                                @endauth

                                <div class="language-box language-box-web">
                                    <select class="select form--control form-select">
                                        <option selected value="en">English</option>
                                        <option value="bn">Bangla</option>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @yield('front_end')

    @php
        $footerContent = getSiteData('footer.content', true);
        $footerElements = getSiteData('footer.element', false, null, true);
        $footerContactElements = getSiteData('contact_us.element', false, null, true);
    @endphp

    <footer class="footer-area">
        <div class="pb-60 pt-60">
            <div class="container">
                <div class="row justify-content-center gy-5">
                    <div class="col-xl-4 col-sm-6 col-xsm-6">
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
                                        <a href="{{ @$socialInfo->data_info->url }}" class="social-list__link flex-center" target="_blank">
                                            @php echo @$socialInfo->data_info->social_icon @endphp
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-xsm-6">
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
                    <div class="col-xl-3 col-sm-6 col-xsm-6">
                        <div class="footer-item">
                            <h5 class="footer-item__title">@lang('Categories')</h5>

                            @if (count($campCategories))
                                <ul class="footer-menu">
                                    @foreach ($campCategories as $campCategory)
                                        <li class="footer-menu__item">
                                            <a href="{{ route('campaign', ['category' => $campCategory->slug]) }}" class="footer-menu__link">
                                                {{ __($campCategory->name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xsm-6">
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
@endsection

@push('page-style')
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
@endpush

@push('page-script')
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
@endpush
