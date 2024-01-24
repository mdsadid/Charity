@extends($activeTheme. 'layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="document-header d-flex flex-wrap justify-content-between align-items-center mb-2">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ getImage(getFilePath('logoFavicon').'/logo_dark.png') }}" alt=""></a>
                </div>

                @if($setting->language)
                    <div>
                        @php $languages = App\Models\Language::all(); @endphp

                        <select class="langSel form-control form-select">
                            <option value="">@lang('Select One')</option>
                            @foreach($languages as $lang)
                                <option value="{{$lang->code}}" @if(session('lang') == $lang->code) selected  @endif>{{ __($lang->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>

            <div class="document-wrapper">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="document-item d-flex flex-wrap">
                            <div class="document-item__icon">
                                <i class="las la-home"></i>
                            </div>
                            <div class="document-item__content">
                                <h4 class="title"><a href="{{ route('home') }}" class="text-underline">@lang('Home')</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="document-item d-flex flex-wrap">
                            <div class="document-item__icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <div class="document-item__content">
                                <h4 class="title"><a href="{{ route('contact') }}" class="text-underline">@lang('Contact')</a></h4>
                            </div>
                        </div>
                    </div>

                    @guest
                        <div class="col-lg-6">
                            <div class="document-item d-flex flex-wrap">
                                <div class="document-item__icon">
                                    <i class="las la-sign-in-alt"></i>
                                </div>
                                <div class="document-item__content">
                                    <h4 class="title"><a href="{{ route('user.login') }}" class="text-underline">@lang('Login')</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="document-item d-flex flex-wrap">
                                <div class="document-item__icon">
                                    <i class="las la-registered"></i>
                                </div>
                                <div class="document-item__content">
                                    <h4 class="title"><a href="{{ route('user.register') }}" class="text-underline">@lang('Register')</a></h4>
                                </div>
                            </div>
                        </div>
                    @endguest

                    @auth
                        <div class="col-lg-6">
                            <div class="document-item d-flex flex-wrap">
                                <div class="document-item__icon">
                                    <i class="las la-tachometer-alt"></i>
                                </div>
                                <div class="document-item__content">
                                    <h4 class="title"><a href="{{ route('user.home') }}" class="text-underline">@lang('Dashboard')</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="document-item d-flex flex-wrap">
                                <div class="document-item__icon">
                                    <i class="las la-sign-out-alt"></i>
                                </div>
                                <div class="document-item__content">
                                    <h4 class="title"><a href="{{ route('user.logout') }}" class="text-underline">@lang('Logout')</a></h4>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

            <div class="document-footer d-flex flex-wrap justify-content-end mt-4">
                <p>@lang('Laravel Version') ({{ app()->version() }}), @lang('PHP Version') ({{ PHP_VERSION }})</p>
            </div>
        </div>
    </section>
@endsection

@push('page-style')
    <style>
        p {
            margin-bottom: 0;
            color: #444
        }
        .document-wrapper {
            background-color: #fff;
            box-shadow: 0 3px 35px rgba(0,0,0, .1);
            border-radius: 7px;
            overflow: hidden;

        }
        div[class*='col']:nth-child(odd) .document-item {
            border-right: 1px solid rgba(0,0,0, .1)
        }
        div[class*='col-lg-12']:nth-child(odd) .document-item {
            border-right: 0;
        }
        div[class*='col']:nth-child(1) .document-item {
            border-top: 0;
        }
        div[class*='col']:nth-child(2) .document-item {
            border-top: 0;
        }
        .document-item {
            background-color: #fff;
            padding: 45px 35px;
            border-top: 1px solid rgba(0,0,0, .1);
            height: 100%;
        }
        .document-item__icon {
            font-size: 32px;
            width: 35px;
            line-height: 1px;
        }
        .document-item__content {
            width: calc(100% - 35px);
            padding-left: 15px;
        }
        .document-item__content .title {
            margin-bottom: 13px;
        }
        .document-item__content .title a {
            color: #111;
            display: inline-block;
        }
        .document-footer ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .share-links li a {
            color: #444
        }
        .share-links li:not(:last-child) {
            padding-right: 25px;
        }
        .logo img{
            max-width: 220px;
        }
    </style>
@endpush
