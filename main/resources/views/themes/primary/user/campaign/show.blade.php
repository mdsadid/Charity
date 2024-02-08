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
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">@lang('Time Left')</h3>
                            <div class="post-sidebar__card__body">
                                <div class="campaign__countdown" data-target-date="{{ showDateTime(@$campaign->end_date, 'Y-m-d\TH:i:s') }}"></div>

                                @php
                                    $percentage = donationPercentage($campaign->goal_amount, $campaign->raised_amount)
                                @endphp

                                <div class="progress custom--progress my-4" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: {{ $percentage }}%"><span class="progress-txt">{{ $percentage . '%' }}</span></div>
                                </div>
                                <ul class="campaign-status">
                                    <li><span><i class="fa-solid fa-hand-holding-dollar"></i> @lang('Goal'):</span> {{ $setting->cur_sym . showAmount(@$campaign->goal_amount) }}</li>
                                    <li><span><i class="fa-solid fa-sack-dollar"></i> @lang('Raised'):</span> {{ $setting->cur_sym . showAmount(@$campaign->raised_amount) }}</li>
                                </ul>
                            </div>
                        </div>
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
