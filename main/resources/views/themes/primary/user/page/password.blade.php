@extends($activeTheme. 'layouts.auth')
@section('auth')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">

                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Change Password')</h5>
                    </div>
                    <div class="card-body">

                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">@lang('Current Password')</label>
                                <input type="password" class="form-control form--control" name="current_password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Password')</label>
                                <input type="password" class="form-control form--control @if($setting->strong_pass) secure-password @endif" name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Confirm Password')</label>
                                <input type="password" class="form-control form--control" name="password_confirmation" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if ($setting->strong_pass)
    @push('page-script-lib')
        <script src="{{asset('assets/universal/js/strong_password.js')}}"></script>
    @endpush
@endif