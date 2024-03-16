@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="cookie-policy py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="card custom--card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header">
                            <h3 class="title">{{ __($pageTitle) }}</h3>
                        </div>
                        <div class="card-body">
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
        .cookie-policy p {
            color: hsl(var(--secondary));
        }
    </style>
@endpush
