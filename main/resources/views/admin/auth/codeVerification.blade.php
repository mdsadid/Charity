@extends('admin.layouts.app')
@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('assets/admin/images/codeVerify.png') }}" class="img-fluid" alt="Login image" width="700">
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <div class="app-brand mb-3 justify-content-center">
                        <a href="{{ route('home') }}" target="_blank" class="app-brand-link gap-2">
                          <span class="app-brand-logo demo"><img src="{{ getImage(getFilePath('logoFavicon').'/logo_dark.png') }}" alt="logo"></span>
                        </a>
                    </div>
                    <div class="text-center">
                        <h4 class="mb-2">
                            @lang('Code Verification')
                            <img src="{{ asset('assets/admin/images/key.gif') }}" alt="emoji" class="animated-emoji">
                        </h4>
                        <p class="mb-4">@lang('Please check your email') <br> @lang('Get the 6 digits verification code')</p>
                    </div>

                    <form class="verification-code-form" action="" method="POST">
                        @csrf

                        <input type="hidden" name="email" value="{{ $email }}">
                        @include('partials.verificationCode')

                        <button class="btn btn-primary d-grid w-100" type="submit">@lang('Verify')</button>

                        <div class="mt-3">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.password.request.form') }}">
                                    <small>@lang('Send again?')</small>
                                </a>
                                <a href="{{ route('admin.login') }}" class="d-flex align-items-center justify-content-center">
                                    <i class="las la-angle-double-left"></i> @lang('Back to login')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/page/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/universal/css/verification-code.css') }}">
@endpush

@push('page-script-lib')
    <script src="{{ asset('assets/universal/js/verification-code.js') }}"></script>
@endpush
