@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <section class="banner-section">
        <div class="banner-slider">
            @foreach ($bannerElements as $banner)
                <div class="banner-slider__slide bg-img" data-background-image="{{ getImage('assets/images/site/banner/' . @$banner->data_info->background_image, '1920x1080') }}">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-7">
                                <div class="banner-content">
                                    <h4 class="banner-content__subtitle">{{ __(@$banner->data_info->title) }}</h4>
                                    <h1 class="banner-content__title">{{ __(@$banner->data_info->heading) }}</h1>
                                    <p class="banner-content__desc">{{ __(@$banner->data_info->short_description) }}</p>
                                    <div class="banner-content__button d-flex gap-3 flex-wrap">
                                        <a href="{{ @$banner->data_info->first_button_url }}" class="btn btn--base" target="_blank">
                                            {{ __(@$banner->data_info->first_button_text) }}
                                        </a>
                                        <a href="{{ @$banner->data_info->second_button_url }}" class="btn btn--base" target="_blank">
                                            {{ __(@$banner->data_info->second_button_text) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-10">
                                <div class="banner-img">
                                    <img src="{{ getImage('assets/images/site/banner/' . @$banner->data_info->background_image, '1920x1080') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="about pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-6 col-md-5">
                    <div class="about__img" data-aos="fade-up" data-aos-duration="1500">
                        <img src="{{ getImage('assets/images/site/about/' . @$aboutUsContent->data_info->image, '655x690') }}" alt="Image">
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6 col-md-7">
                    <div class="about__content" data-aos="fade-up" data-aos-duration="1500">
                        <div class="section-heading">
                            <h2 class="section-heading__title">{{ __(@$aboutUsContent->data_info->heading) }}</h2>
                        </div>
                        <p class="about__desc">{{ __(@$aboutUsContent->data_info->description) }}</p>
                        <div class="row about__card-row g-4">
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter">{{ $setting->cur_sym }}<span class="odometer" data-count="{{ $totalFundRaised }}">0</span></div>
                                    <span class="name">@lang('Total Fund Raised')</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter"><span class="odometer" data-count="{{ $totalCampaignCount }}">0</span>+</div>
                                    <span class="name">@lang('Total Campaigns')</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ @$aboutUsContent->data_info->button_url }}" class="btn btn--base" target="_blank">
                            {{ __(@$aboutUsContent->data_info->button_text) }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-campaign py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$featuredCampaignContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$featuredCampaignContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($featuredCampaigns as $campaign)
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="campaign-card" data-aos="fade-up" data-aos-duration="1500">
                            @include($activeTheme . 'partials.basicCampaign')
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="cause-category py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$campaignCategoryContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$campaignCategoryContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="cause-category__slider" data-aos="fade-up" data-aos-duration="1500">
                @foreach ($campaignCategories as $category)
                    <div class="cause-category__slide">
                        <div class="cause-category__img">
                            <a href="{{ route('campaign', ['category' => $category->slug]) }}">
                                <img src="{{ getImage(getFilePath('category') . '/' . $category->image, getFileSize('category')) }}" alt="{{ $category->name }}">
                            </a>
                        </div>
                        <h3 class="cause-category__title">
                            <a href="{{ route('campaign', ['category' => $category->slug]) }}">{{ __($category->name) }}</a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="new-campaign py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$recentCampaignContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$recentCampaignContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="new-campaign__slider" data-aos="fade-up" data-aos-duration="1500">
                @forelse ($recentCampaigns as $campaign)
                    <div class="new-campaign__slide">
                        <div class="campaign-card">
                            @include($activeTheme . 'partials.basicCampaign')
                        </div>
                    </div>
                @empty
                    <p class="text-center">{{ __($emptyMessage) }}</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="volunteer pt-60 pb-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$volunteerContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$volunteerContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($volunteerElements as $volunteer)
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                        <div class="volunteer__card">
                            <div class="volunteer__img">
                                <img src="{{ getImage('assets/images/site/volunteer/' . @$volunteer->data_info->volunteer_image, '305x350') }}" alt="image">
                            </div>
                            <div class="volunteer__txt">
                                <h3 class="volunteer__name">{{ __(@$volunteer->data_info->name) }}</h3>
                                <ul>
                                    <li>
                                        <span>@lang('Participate'):</span>
                                        {{ @$volunteer->data_info->participated }} @lang('Campaigns')
                                    </li>
                                    <li>
                                        <span>@lang('From'):</span>
                                        {{ __(@$volunteer->data_info->from) }}
                                    </li>
                                    <li>
                                        <span>@lang('Social'):</span>
                                        <div class="social">
                                            <a href="{{ @$volunteer->data_info->facebook }}" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="{{ @$volunteer->data_info->twitter }}" target="_blank">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                            <a href="{{ @$volunteer->data_info->instagram }}" target="_blank">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="{{ @$volunteer->data_info->linkedin }}" target="_blank">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pt-lg-5 pt-4" data-aos="fade-up" data-aos-duration="1500">
                <a href="volunteer.html" class="btn btn--base">@lang('See All Volunteer')</a>
            </div>
        </div>
    </div>
    <div class="donor py-120 bg-light-gradient">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$donorContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$donorContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 donor__row">
                @forelse ($topDonors as $topDonor)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                        <div class="donor__card">
                            <span class="donor__number">{{ $loop->iteration }}</span>
                            <span class="donor__txt">
                                <span class="donor__name">{{ __(@$topDonor->full_name) }}</span>
                                <span class="donor__amount">{{ $setting->cur_sym . showAmount(@$topDonor->total_donation) }}</span>
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                @endforelse
            </div>

            @if (count($topDonors) > 20)
                <div class="d-flex justify-content-center pt-lg-5 pt-4" data-aos="fade-up" data-aos-duration="1500">
                    <a href="donor-list.html" class="btn btn--base">@lang('View All Donors')</a>
                </div>
            @endif
        </div>
    </div>
    <div class="counter-section py-60">
        <div class="container">
            <div class="row counter-section__row g-4">
                @foreach ($counterElements as $counter)
                    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1500">
                        <div class="counter-section__card">
                            <h3 class="counter-section__number odometer" data-count="{{ @$counter->data_info->counter_digit }}">0</h3>
                            <p class="counter-section__name">{{ __(@$counter->data_info->title) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="upcoming-event pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$upcomingContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$upcomingContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="upcoming-event__row">
                @forelse ($upcomingCampaigns as $upcomingCampaign)
                    <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="upcoming-event__schedule">
                            <span class="upcoming-event__date">{{ @$upcomingCampaign->start_date->format('d') }}</span>
                            <span class="upcoming-event__month">{{ __(@$upcomingCampaign->start_date->format('F')) }}</span>
                        </div>
                        <div class="upcoming-event__txt">
                            <h3 class="upcoming-event__title">{{ __(strLimit(@$upcomingCampaign->name, 30)) }}</h3>
                            <p>{{ __(strLimit(strip_tags(@$upcomingCampaign->description), 100)) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="success-showcase pt-60 pb-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$successContent->data_info->section_heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$successContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($successElements->take(3) as $successElement)
                    <div class="col-xl-4 col-lg-5 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                        @include($activeTheme . 'partials.basicSuccessStory')
                    </div>
                @empty
                    <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                @endforelse
            </div>

            @if (count($successElements) > 3)
                <div class="d-flex justify-content-center pt-5" data-aos="fade-up" data-aos-duration="1500">
                    <a href="{{ route('stories') }}" class="btn btn--base">@lang('View All Story')</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/odometer.css') }}">
@endpush

@push('page-style')
    <style>
        .banner-img::after {
            -webkit-mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
            mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
        }

        .banner-img img {
            -webkit-mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
            background: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
            mask-image: image(url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}"));
        }

        .about__img::after {
            -webkit-mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape.png') }}");
            mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape.png') }}");
        }

        .about::after {
            content: "";
            position: absolute;
            bottom: 100px;
            right: 70px;
            width: 100px;
            height: 100px;
            background: url("{{ asset($activeThemeTrue . 'images/animation-vector-1.png') }}") center center no-repeat;
            background-size: contain;
            opacity: 0.2;
            animation: bounceNormal 5s linear infinite;
            z-index: -1;
        }

        .cause-category__img img {
            -webkit-mask-image: url("{{ asset($activeThemeTrue . 'images/mask-shape-1.png') }}");
            background: url("{{ asset($activeThemeTrue . 'images/mask-shape-1.png') }}");
            mask-image: url("{{ asset($activeThemeTrue . 'images/mask-shape-1.png') }}");
        }

        .donor::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset($activeThemeTrue . 'images/section-bg-1.png') }}") center center no-repeat;
            background-size: cover;
            opacity: 0.65;
            z-index: -1;
        }

        .counter-section__card {
            -webkit-mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
            mask-image: url("{{ asset($activeThemeTrue . 'images/slider-img-shape-2.png') }}");
        }
    </style>
@endpush

@push('page-script-lib')
    <script src="{{ asset($activeThemeTrue . 'js/odometer.min.js') }}"></script>
@endpush
