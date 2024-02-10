@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="donation pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="post-sidebar">
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Filter by name</h3>
                            <div class="post-sidebar__card__body">
                                <form class="input--group">
                                    <input type="search" class="form--control" placeholder="Campaign Name">
                                    <button class="btn btn--base px-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Filter by situation</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="d-flex flex-column gap-2">
                                    <li>
                                        <div class="form--radio">
                                            <input class="form-check-input" type="radio" name="situationFilter" id="allSituation">
                                            <label class="form-check-label" for="allSituation">
                                                All
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form--radio">
                                            <input class="form-check-input" type="radio" name="situationFilter" id="urgentSituation">
                                            <label class="form-check-label" for="urgentSituation">
                                                Urgent Campaigns
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form--radio">
                                            <input class="form-check-input" type="radio" name="situationFilter" id="featuredCampaign">
                                            <label class="form-check-label" for="featuredCampaign">
                                                Featured Campaigns
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form--radio">
                                            <input class="form-check-input" type="radio" name="situationFilter" id="topCampaign">
                                            <label class="form-check-label" for="topCampaign">
                                                Top Campaigns
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Filter by category</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="d-flex flex-column gap-2">
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-left"></i> All</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Education</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Winter Funding</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Fundamental</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Filter by date</h3>
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
                                @include($activeTheme . 'partials.basicCampaign')
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
@endsection
