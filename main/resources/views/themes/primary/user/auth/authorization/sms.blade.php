@extends($activeTheme. 'layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-5">
                <div class="text-end">
                    <a href="{{ route('home') }}" class="fw-bold home-link"> <i class="las la-long-arrow-alt-left"></i> @lang('Go to Home')</a>
                </div>
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __($pageTitle) }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p>@lang('A six-digit verification code has been texted to your mobile phone') :  +{{ showMobileNumber(auth()->user()->mobile) }}</p>
                        </div>
                        <form method="POST" action="{{ route('user.verify.mobile') }}" class="verification-code-form">
                            @csrf

                            @include('partials.verificationCode')

                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>

                            <div class="form-group">
                                @lang('If you don\'t receive any code you can') <a href="{{ route('user.send.verify.code', 'phone') }}">@lang('Send again')</a>
                            </div>

                            @if($errors->has('resend'))
                                <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                            @endif
                        </form>
                    </div>
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


