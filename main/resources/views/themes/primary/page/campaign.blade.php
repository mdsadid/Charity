@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="donation pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="post-sidebar">
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">@lang('Filter by category')</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="d-flex flex-column gap-2">
                                    <li class="campaign-category" data-category_slug="all">
                                        <a href="#" class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-arrow-left"></i> @lang('All')
                                        </a>
                                    </li>

                                    @foreach ($categories as $category)
                                        <li class="campaign-category" data-category_slug="{{ $category->slug }}">
                                            <a href="#" class="d-flex align-items-center gap-2">
                                                <i class="fa-solid fa-arrow-right"></i> {{ __($category->name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">@lang('Filter by name')</h3>
                            <div class="post-sidebar__card__body">
                                <div class="input--group">
                                    <input type="text" class="form--control" placeholder="Campaign Name" value="{{ request()->input('name') }}" id="campaign-name">
                                    <button class="btn btn--base px-3 search-campaign">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">@lang('Filter by date')</h3>
                            <div class="post-sidebar__card__body">
                                <form>
                                    <input type="text" class="form--control datepicker">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        @forelse ($campaigns as $campaign)
                            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                                <div class="campaign-card">
                                    @include($activeTheme . 'partials.basicCampaign')
                                </div>
                            </div>
                        @empty
                            <div class="col-12" data-aos="fade-up" data-aos-duration="1500">
                                <div class="pt-5">
                                    <p class="text-center">{{ __($emptyMessage) }}</p>
                                </div>
                            </div>
                        @endforelse

                        @if ($campaigns->hasPages())
                            <div class="col-12" data-aos="fade-up" data-aos-duration="1500">
                                {{ $campaigns->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include($activeTheme . 'partials.basicPartner')

    <form action="{{ route('campaign') }}" method="GET" class="d-none search-form">
        <input type="hidden" name="category" value="{{ request()->input('category') }}">
        <input type="hidden" name="name" value="{{ request()->input('name') }}">
    </form>
@endsection

@push('page-script')
    <script>
        (function ($) {
            'use strict'

            $('.campaign-category').on('click', function (event) {
                event.preventDefault()

                let slug = $(this).data('category_slug')
                $('input[name="category"]').val(slug)

                $('.search-form').submit()
            })

            $('.search-campaign').on('click', function () {
                let name = $('#campaign-name').val()
                $('input[name="name"]').val(name)

                $('.search-form').submit()
            })
        })(jQuery)
    </script>
@endpush
