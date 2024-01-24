<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> {{ $setting->siteName(__($pageTitle)) }}</title>

        @include('partials.seo')

        <link rel="stylesheet" href="{{ asset('assets/universal/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/universal/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/universal/css/line-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset($activeThemeTrue. 'css/custom.css') }}">

        @stack('page-style-lib')
        @stack('page-style')

        <style>
            :root{
                --main: 115, 103, 240;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-flow: column;
                background-color: #f6f6f6;
                min-height: 100vh;
            }
            body > div,body > section {
                width: 100%;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-flow: column;
                background-color: #f6f6f6;
                min-height: 100vh;
            }
            body > div,body > section {
                width: 100%;
            }
            .custom--card {
                box-shadow: 0 3px 35px rgba(0,0,0, .1);
                border: 0;
            }
            .custom--card .card-header,.custom--card .card-footer  {
                padding: 13px 25px;
                text-align: center;
                background-color: rgb(var(--main));
                border: 0;
            }
            .custom--card .card-header .title {
                margin-bottom: 0;
                color: #fff
            }
            .custom--card .card-body {
                padding: 25px;
                border: 0;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-label {
                font-size: 15px;
                font-weight: 500;
                color: #555;
            }
            .form--control.input,.form--control.select{
                height: 45px;
            }
            .form--control {
                border-width: 2px;
                border-color: #dce1e6;
            }
            .form--control:focus {
                border-color: rgb(var(--main));
                box-shadow: 0 0 25px rgba(var(--main) 0.071);
                outline: 0;
            }
            .forgot-pass {
                font-size: 14px;
            }
            .btn--base {
                color: #fff;
                background-color: rgb(var(--main));
            }
            .btn--base:hover {
                color: #fff;
            }
            .btn {
                padding: 10px 30px;
                font-weight: 500;
            }
            .home-link{
                text-decoration: none
            }

            label.required:after{
                content: '*';
                color: #DC3545!important;
                margin-left: 2px;
            }
        </style>
    </head>

    <body>
        @yield('content')

        @php
            $cookie = App\Models\SiteData::where('data_key','cookie.data')->first();
        @endphp

        @if(($cookie->data_info->status == ManageStatus::ACTIVE) && !\Cookie::get('gdpr_cookie'))
            <!-- cookies dark version start -->
            <div class="cookies-card text-center hide">
                <div class="cookies-card__icon bg--base">
                    <i class="las la-cookie-bite"></i>
                </div>

                <p class="mt-4 cookies-card__content">{{ $cookie->data_info->short_details }} <a href="{{ route('cookie.policy') }}" target="_blank">@lang('learn more')</a></p>

                <div class="cookies-card__btn mt-4">
                    <button type="button" class="btn btn--base w-100 policy">@lang('Allow')</button>
                </div>
            </div>
            <!-- cookies dark version end -->
        @endif

        <script src="{{ asset('assets/universal/js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('assets/universal/js/bootstrap.js') }}"></script>

        @include('partials.plugins')
        @include('partials.toasts')

        @stack('page-script-lib')
        @stack('page-script')

        <script>
            (function ($) {
                "use strict";

                $(".langSel").on("change", function() {
                    window.location.href = "{{route('home')}}/change/"+$(this).val();
                });

                $('.policy').on('click',function() {
                    $.get('{{route('cookie.accept')}}', function(response) {
                        $('.cookies-card').addClass('d-none');
                    });
                });

                setTimeout(function() {
                    $('.cookies-card').removeClass('hide');
                },2000);

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
    </body>
</html>
