@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="privacy-policy py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="card custom--card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header">
                            <h3 class="title">{{ __($pageTitle) }}</h3>
                        </div>
                        <div class="card-body">
                            @php echo $policy->data_info->details @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-style')
    <style>
        .privacy-policy p {
            color: hsl(var(--secondary));
        }

        .privacy-policy p:not(:last-child) {
            margin-bottom: 15px;
        }
    </style>
@endpush
