@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="dashboard py-60">
        <div class="container">
            @if (auth()->user()->kc == ManageStatus::UNVERIFIED || auth()->user()->kc == ManageStatus::PENDING)
                <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                    <div class="col-lg-6">
                        <div class="section-heading text-center">
                            @if (auth()->user()->kc == ManageStatus::UNVERIFIED)
                                <h2 class="section-heading__title mx-auto">{{ __(@$kycContent->data_info->verification_required_heading) }}</h2>
                                <p class="section-heading__desc">{{ __(@$kycContent->data_info->verification_required_details) }} <a href="{{ route('user.kyc.form') }}">@lang('Click here')</a> @lang('to verify.')</p>
                            @elseif (auth()->user()->kc == ManageStatus::PENDING)
                                <h2 class="section-heading__title mx-auto">{{ __(@$kycContent->data_info->verification_pending_heading) }}</h2>
                                <p class="section-heading__desc">{{ __(@$kycContent->data_info->verification_pending_details) }} <a href="{{ route('user.kyc.data') }}">@lang('See')</a> @lang('kyc data.')</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="row g-md-4 g-3 dashboard-card__row pb-60">
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-ribbon"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Total Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-hourglass-half"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Pending Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-check-circle"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Completed Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-times-circle"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Rejected Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="lar la-heart"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Total Donation</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-gift"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">My Donation</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-money-bill-wave"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Total Withdraw</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-wallet"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number">21</span>
                            <span class="dashboard-card__title">Current Balance</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="custom--card">
                        <div class="card-header">
                            <h3 class="title">Monthly Donation Report</h3>
                        </div>
                        <div id="donationReport"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="custom--card">
                        <div class="card-header">
                            <h3 class="title">Monthly Withdraw Report</h3>
                        </div>
                        <div id="withdrawReport"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset($activeThemeTrue . 'css/datepicker.min.css') }}">
@endpush

@push('page-script-lib')
    <script src="{{ asset($activeThemeTrue . 'js/datepicker.min.js') }}"></script>
    <script src="{{ asset($activeThemeTrue . 'js/apexcharts.js') }}"></script>
@endpush
