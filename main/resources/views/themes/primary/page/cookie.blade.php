@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="cookie-policy py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="card custom--card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header">
                            <h3 class="title">@lang('Read Our') {{ __($pageTitle) }}</h3>
                        </div>
                        <div class="card-body cookie--details">
                            @php echo $cookie->data_info->details @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style')
    <style>
        .cookie--details p {
            color: hsl(var(--secondary));
        }
    </style>
@endpush
