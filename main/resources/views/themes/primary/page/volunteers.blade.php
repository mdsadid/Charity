@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="volunteer pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                @forelse ($volunteerElements as $volunteer)
                    @include($activeTheme . 'partials.basicVolunteer')
                @empty
                    <p class="text-center" data-aos="fade-up" data-aos-duration="1500">{{ __($emptyMessage) }}</p>
                @endforelse
            </div>
        </div>
    </div>

    @include($activeTheme . 'partials.basicPartner')
@endsection
