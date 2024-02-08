@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="donation-details pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    @include($activeTheme . 'partials.basicCampaignShow')
                </div>
                <div class="col-lg-4">
                    <div class="post-sidebar">
                        @include($activeTheme . 'partials.basicCampaignTime')

                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">@lang('Share This Event')</h3>
                            <div class="post-sidebar__card__body">
                                <div class="input--group mb-4">
                                    <input type="text" class="form--control" id="shareLink" readonly>
                                    <button class="btn btn--base share-link__copy px-3">
                                        <i class="fa-solid fa-copy"></i>
                                    </button>
                                </div>
                                <ul class="social-list social-list-2">
                                    <li class="social-list__item">
                                        <a href="https://www.facebook.com" class="social-list__link flex-center">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a href="https://www.twitter.com" class="social-list__link flex-center">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a href="https://www.linkedin.com" class="social-list__link flex-center">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a href="https://www.pinterest.com" class="social-list__link flex-center">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style')
    <style>
        .donation-details__comments {
            border-bottom: none;
        }
    </style>
@endpush
