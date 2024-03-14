@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="success-showcase pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                @forelse ($successElements as $successElement)
                    <div class="col-lg-4">
                        @include($activeTheme . 'partials.basicSuccessStory')
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @include($activeTheme . 'partials.basicPartner')
@endsection
