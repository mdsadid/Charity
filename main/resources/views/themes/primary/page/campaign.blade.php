@extends($activeTheme . 'layouts.app')

@section('content')
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
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-1.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">The Entrepreneur Ship - Atlantic rowing challenge</a></h3>
                                    <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-3.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">Turn 30% of our ocean into no take zones by 2030</a></h3>
                                    <div class="campaign__countdown" data-target-date="2024-01-30T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-5.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">The Menopause Charity Crowdfund</a></h3>
                                    <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-1.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">The Entrepreneur Ship - Atlantic rowing challenge</a></h3>
                                    <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-3.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">Turn 30% of our ocean into no take zones by 2030</a></h3>
                                    <div class="campaign__countdown" data-target-date="2024-01-30T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-5.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">The Menopause Charity Crowdfund</a></h3>
                                    <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-1.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">The Entrepreneur Ship - Atlantic rowing challenge</a></h3>
                                    <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                            <div class="campaign-card">
                                <div class="campaign-card__img">
                                    <a href="donation-details.html"><img src="assets/images/thumbs/campaign-3.jpg" alt="image"></a>
                                </div>
                                <div class="campaign-card__txt">
                                    <h3 class="campaign-card__title"><a href="donation-details.html">Turn 30% of our ocean into no take zones by 2030</a></h3>
                                    <div class="campaign__countdown" data-target-date="2024-01-30T23:59:59"></div>
                                    <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                    </div>
                                    <div class="campaign-card__bottom">
                                        <ul class="campaign-card__list">
                                            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                            <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                        </ul>
                                        <a href="donation-details.html" class="btn btn--sm btn--base">Make A Donation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-up" data-aos-duration="1500">
                            <ul class="pagination">
                                <li class="page-item"><a href="#" class="page-link"><i class="fa-solid fa-arrow-left"></i></a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">...</a></li>
                                <li class="page-item"><a href="#" class="page-link">111</a></li>
                                <li class="page-item"><a href="#" class="page-link"><i class="fa-solid fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment-gateway pt-60 pb-120">
        <div class="container">
            <div class="payment-gateway__slider" data-aos="fade-up" data-aos-duration="1500">
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor1.png" alt="image">
                </div>
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor2.png" alt="image">
                </div>
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor3.png" alt="image">
                </div>
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor4.png" alt="image">
                </div>
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor5.png" alt="image">
                </div>
                <div class="payment-gateway__card">
                    <img src="assets/images/2__brands/donor6.png" alt="image">
                </div>
            </div>
        </div>
    </div>
@endsection
