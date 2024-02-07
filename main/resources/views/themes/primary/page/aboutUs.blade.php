@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="about py-120 bg-img" data-background-image="{{ getImage('assets/images/site/about/' . @$aboutUsContent->data_info->background_image, '1920x1080') }}">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="about__img" data-aos="fade-up" data-aos-duration="1500">
                        <img src="{{ getImage('assets/images/site/about/' . @$aboutUsContent->data_info->image, '655x690') }}" alt="About Us">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="about__content" data-aos="fade-up" data-aos-duration="1500">
                        <div class="section-heading">
                            <h2 class="section-heading__title">{{ __(@$aboutUsContent->data_info->heading) }}</h2>
                        </div>
                        <p class="about__desc">{{ __(@$aboutUsContent->data_info->description) }}</p>
                        <div class="row about__card-row">
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter">$ <span class="odometer">12,000</span></div>
                                    <span class="name">@lang('Total Fund Raised')</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter"><span class="odometer">150</span>+</div>
                                    <span class="name">@lang('Total Causes')</span>
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
    <section class="testimonials pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">{{ __(@$clientContent->data_info->heading) }}</h2>
                        <p class="section-heading__desc">{{ __(@$clientContent->data_info->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-8" data-aos="fade-up" data-aos-duration="1500">
                    <div class="testimonial-txt-slider">
                        @foreach ($clientElements as $client)
                            <div class="testimonails-card">
                                <div class="testimonial-item">
                                    <p class="testimonial-item__desc">{{ __(@$client->data_info->client_review) }}</p>
                                    <div class="testimonial-item__content">
                                        <div class="testimonial-item__info">
                                            <div class="testimonial-item__details">
                                                <h5 class="testimonial-item__name">{{ __(@$client->data_info->client_name) }}</h5>
                                                <span class="testimonial-item__designation">{{ __(@$client->data_info->client_designation) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="testimonial-img-slider">
                        @foreach ($clientElements as $client)
                            <div class="testimonial-img">
                                <img src="{{ getImage('assets/images/site/client_review/' . @$client->data_info->client_image, '500x500') }}" alt="image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include($activeTheme . 'partials.basicPartner')
@endsection

@push('page-style')
    <style>
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
    </style>
@endpush
