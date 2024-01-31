@extends($activeTheme . 'layouts.frontend')

@section('page_content')
    <div class="dashboard py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card custom--card">
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form--label required">@lang('Current Password')</label>
                                    <input type="password" class="form--control" name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label class="form--label required">@lang('New Password')</label>
                                    <input type="password" class="form--control @if ($setting->strong_pass) secure-password @endif" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label class="form--label required">@lang('Confirm Password')</label>
                                    <input type="password" class="form--control" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn--base w-100 mt-3">@lang('Submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if ($setting->strong_pass)
    @push('page-script-lib')
        <script src="{{ asset('assets/universal/js/strong_password.js') }}"></script>
    @endpush
@endif
