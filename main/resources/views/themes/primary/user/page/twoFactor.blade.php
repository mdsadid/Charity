@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="dashboard py-60">
        <div class="container">
            <div class="row @if ($user->ts) justify-content-center @else g-4 @endif">
                @if (!$user->ts)
                    <div class="col-lg-6">
                        <div class="card custom--card">
                            <div class="card-header">
                                <h3 class="title">@lang('Add Your Account')</h3>
                            </div>
                            <div class="card-body">
                                <p>@lang('Use the QR code or setup key on your Google Authenticator app to add your account.')</p>
                                <div class="qr-code-img">
                                    <img src="{{ $qrCodeUrl }}" alt="QR Code">
                                </div>
                                <p class="fw-semibold mb-2">@lang('Setup Key')</p>
                                <div class="account-setup-key mb-3">
                                    <div class="input--group">
                                        <input type="text" class="form--control referralURL" name="key" value="{{ $secret }}" id="accountSetupKey" readonly>
                                        <span class="badge bg--success account-setup-key__badge">@lang('Copied')</span>
                                        <button class="btn btn--base account-setup-key__copy">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text--base fw-semibold mb-1">
                                    <i class="fa-solid fa-info-circle"></i> @lang('Help')
                                </p>
                                <p>
                                    @lang('Google Authenticator is a mobile application designed for multifactor authentication. It generates time-sensitive codes utilized in the two-step verification process. To employ Google Authenticator, install the application on your mobile device.') <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US" target="_blank">@lang('Download')</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-6">
                    @if ($user->ts)
                        <div class="card custom--card">
                            <div class="card-header">
                                <h3 class="title">@lang('Disable 2FA Security')</h3>
                            </div>
                            <div class="card-body">
                                <p class="fw-semibold mb-2">@lang('Google Authenticator OTP') <span class="text--danger">*</span></p>
                                <form action="{{ route('user.twofactor.disable') }}" method="POST" class="verification-code-form">
                                    @csrf
                                    <input type="hidden" name="key" value="{{ $secret }}">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            @include('partials.verificationCode')
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn--base w-100">
                                                @lang('Submit')
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card custom--card">
                            <div class="card-header">
                                <h3 class="title">@lang('Enable 2FA Security')</h3>
                            </div>
                            <div class="card-body">
                                <p class="fw-semibold mb-2">@lang('Google Authenticator OTP') <span class="text--danger">*</span></p>
                                <form action="{{ route('user.twofactor.enable') }}" method="POST" class="verification-code-form">
                                    @csrf
                                    <input type="hidden" name="key" value="{{ $secret }}">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            @include('partials.verificationCode')
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn--base w-100">
                                                @lang('Submit')
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset('assets/universal/css/verification-code.css') }}">
@endpush

@push('page-script-lib')
    <script src="{{ asset('assets/universal/js/verification-code.js') }}"></script>
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict";

            $('#copyBoard').click(function() {
                var copyText = document.getElementsByClassName("referralURL");
                copyText = copyText[0];
                copyText.select();
                copyText.setSelectionRange(0, 99999);

                /*For mobile devices*/
                document.execCommand("copy");
                copyText.blur();
                this.classList.add('copied');
                setTimeout(() => this.classList.remove('copied'), 1500);
            });
        })(jQuery);
    </script>
@endpush
