@extends($activeTheme . 'layouts.frontend')

@section('page_content')
    <div class="dashboard py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card custom--card">
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-lg-5">
                                    <ul class="user-profile-list">
                                        <li><span><i class="fa-solid fa-user"></i> @lang('Username')</span> {{ __($user->username) }}</li>
                                        <li><span><i class="fa-solid fa-envelope"></i> @lang('Email')</span> {{ $user->email }}</li>
                                        <li><span><i class="fa-solid fa-mobile"></i> @lang('Mobile')</span> {{ '+' . $user->mobile }}</li>
                                        <li><span><i class="fa-solid fa-earth-asia"></i> @lang('Country')</span> {{ __($user->country_name) }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <form action="" method="POST" class="row gx-4 gy-3">
                                        @csrf
                                        <div class="col-12">
                                            <h6 class="card-subtitle"><i class="fa-solid fa-user"></i> @lang('Update Profile')</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label required">@lang('First Name')</label>
                                            <input type="text" class="form--control" name="firstname" value="{{ $user->firstname }}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label required">@lang('Last Name')</label>
                                            <input type="text" class="form--control" name="lastname" value="{{ $user->lastname }}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">@lang('State')</label>
                                            <input type="text" class="form--control" name="state" value="{{ @$user->address->state }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">@lang('City')</label>
                                            <input type="text" class="form--control" name="city" value="{{ @$user->address->city }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">@lang('Zip Code')</label>
                                            <input type="text" class="form--control" name="zip" value="{{ @$user->address->zip }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">@lang('Address')</label>
                                            <input type="text" class="form--control" name="address" value="{{ @$user->address->address }}">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn--base w-100 mt-2">@lang('Submit')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
