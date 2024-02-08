@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="donation-details pt-120 pb-60">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    @include($activeTheme . 'partials.basicCampaignShow')

                    <div class="related-campaign">
                        <h2 class="donation-details__title" data-aos="fade-up" data-aos-duration="1500">Related Campaigns</h2>
                        <div class="row g-4">
                            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1500">
                                <div class="campaign-card">
                                    <div class="campaign-card__img">
                                        <a href="#"><img src="assets/images/thumbs/campaign-2.jpg" alt="image"></a>
                                    </div>
                                    <div class="campaign-card__txt">
                                        <h3 class="campaign-card__title"><a href="#">The Menopause Charity Crowdfund</a></h3>
                                        <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                        <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                        </div>
                                        <div class="campaign-card__bottom">
                                            <ul class="campaign-card__list">
                                                <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                                <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                            </ul>
                                            <a href="#" class="btn btn--sm btn--base">Make A Donation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1500">
                                <div class="campaign-card">
                                    <div class="campaign-card__img">
                                        <a href="#"><img src="assets/images/thumbs/campaign-3.jpg" alt="image"></a>
                                    </div>
                                    <div class="campaign-card__txt">
                                        <h3 class="campaign-card__title"><a href="#">Turn 30% of our ocean into no take zones by 2030</a></h3>
                                        <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                        <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                        </div>
                                        <div class="campaign-card__bottom">
                                            <ul class="campaign-card__list">
                                                <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                                <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                            </ul>
                                            <a href="#" class="btn btn--sm btn--base">Make A Donation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-sidebar">
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Time Left</h3>
                            <div class="post-sidebar__card__body">
                                <div class="campaign__countdown" data-target-date="2023-12-31T23:59:59"></div>
                                <div class="progress custom--progress my-4" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 25%"><span class="progress-txt">25%</span></div>
                                </div>
                                <ul class="campaign-status">
                                    <li><span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> $500.00</li>
                                    <li><span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> $500.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Make a Donation</h3>
                            <div class="post-sidebar__card__body">
                                <form>
                                    <div class="form-group">
                                        <div class="input--group">
                                            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                                            <input type="text" class="form--control" id="donationAmount" placeholder="0" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="form--radio">
                                                <input class="form-check-input" type="radio" name="donationAmount" data-amount="100" id="donationAmount1">
                                                <label class="form-check-label" for="donationAmount1">
                                                    $100
                                                </label>
                                            </div>
                                            <div class="form--radio">
                                                <input class="form-check-input" type="radio" name="donationAmount" data-amount="200" id="donationAmount2">
                                                <label class="form-check-label" for="donationAmount2">
                                                    $200
                                                </label>
                                            </div>
                                            <div class="form--radio">
                                                <input class="form-check-input" type="radio" name="donationAmount" data-amount="300" id="donationAmount3">
                                                <label class="form-check-label" for="donationAmount3">
                                                    $300
                                                </label>
                                            </div>
                                            <div class="form--radio">
                                                <input class="form-check-input" type="radio" name="donationAmount" id="customDonationAmount">
                                                <label class="form-check-label" for="customDonationAmount">
                                                    custom
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="post-sidebar__card__subtitle">Personal Information</h4>
                                    <div class="form-group">
                                        <div class="form--check">
                                            <input class="form-check-input" type="checkbox" name="anonymousDonation" id="anonymousDonation">
                                            <label class="form-check-label" for="anonymousDonation">
                                                Donate as anonymous
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form--label" for="donorName">Full Name: <span class="text--danger">*</span></label>
                                        <input type="text" class="form--control" id="donorName" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form--label" for="donorEmail">Email: <span class="text--danger">*</span></label>
                                        <input type="text" class="form--control" id="donorEmail" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form--label" for="donorPhone">Phone: <span class="text--danger">*</span></label>
                                        <input type="text" class="form--control" id="donorPhone" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form--label" for="donorCountry">Country: <span class="text--danger">*</span></label>
                                        <input type="text" class="form--control" id="donorCountry" required>
                                    </div>
                                    <button class="btn btn--base w-100">Donate Now</button>
                                </form>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Share This Event</h3>
                            <div class="post-sidebar__card__body">
                                <div class="input--group mb-4">
                                    <input type="text" class="form--control" id="shareLink" readonly>
                                    <button class="btn btn--base share-link__copy px-3"><i class="fa-solid fa-copy"></i></button>
                                </div>
                                <ul class="social-list social-list-2">
                                    <li class="social-list__item"><a href="https://www.facebook.com" class="social-list__link flex-center"><i class="fab fa-facebook-f"></i></a> </li>
                                    <li class="social-list__item"><a href="https://www.twitter.com" class="social-list__link flex-center active"> <i class="fab fa-twitter"></i></a></li>
                                    <li class="social-list__item"><a href="https://www.linkedin.com" class="social-list__link flex-center"> <i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="social-list__item"><a href="https://www.pinterest.com" class="social-list__link flex-center"> <i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Donate a Gift</h3>
                            <div class="post-sidebar__card__body">
                                <div class="gift-donation mb-4">
                                    <div class="gift-donation__top">
                                        <div class="gift-donation__img">
                                            <img src="assets/images/thumbs/gift-donation-1.jpg" alt="Gift 1">
                                        </div>
                                        <div class="gift-donation__txt">
                                            <span class="gift-donation__name">Victory Day</span>
                                            <span class="gift-donation__desc">Celebrate triumph with a Victory Day gift.</span>
                                        </div>
                                    </div>
                                    <div class="gift-donation__items">
                                        <p>
                                            Gifts:
                                            <span class="badge badge--success">T-shirt</span>
                                            <span class="badge badge--danger">Cap</span>
                                            <span class="badge badge--warning">Badge</span>
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn--sm btn--base w-100">Select Gift</a>
                                </div>
                                <div class="gift-donation">
                                    <div class="gift-donation__top">
                                        <div class="gift-donation__img">
                                            <img src="assets/images/thumbs/gift-donation-2.jpg" alt="Gift 1">
                                        </div>
                                        <div class="gift-donation__txt">
                                            <span class="gift-donation__name">Victory Day</span>
                                            <span class="gift-donation__desc">Celebrate triumph with a Victory Day gift.</span>
                                        </div>
                                    </div>
                                    <div class="gift-donation__items">
                                        <p>
                                            Gifts:
                                            <span class="badge badge--success">T-shirt</span>
                                            <span class="badge badge--danger">Cap</span>
                                            <span class="badge badge--warning">Badge</span>
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn--sm btn--base w-100">Select Gift</a>
                                </div>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Kindness in Action</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="d-flex flex-column gap-3">
                                    <li>
                                        <div class="donor__card">
                                            <span class="donor__number"><i class="fa-solid fa-user"></i></span>
                                            <span class="donor__txt">
                                                <span class="donor__name">Mr. Donor Khan</span>
                                                <span class="donor__amount">$12,001.23</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="donor__card">
                                            <span class="donor__number"><i class="fa-solid fa-user"></i></span>
                                            <span class="donor__txt">
                                                <span class="donor__name">Mr. Donor Khan</span>
                                                <span class="donor__amount">$12,001.23</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="donor__card">
                                            <span class="donor__number"><i class="fa-solid fa-user"></i></span>
                                            <span class="donor__txt">
                                                <span class="donor__name">Mr. Donor Khan</span>
                                                <span class="donor__amount">$12,001.23</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="donor__card">
                                            <span class="donor__number"><i class="fa-solid fa-user"></i></span>
                                            <span class="donor__txt">
                                                <span class="donor__name">Mr. Donor Khan</span>
                                                <span class="donor__amount">$12,001.23</span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn--sm btn--base w-100">Load More</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include($activeTheme . 'partials.basicPartner')
@endsection

@push('post-comment')
    <div class="donation-details__post__comment">
        <h3 class="donation-details__subtitle">Post a comment</h3>
        <form class="row g-4">
            <div class="col-sm-6">
                <input type="text" class="form--control" placeholder="Your Name*" required>
            </div>
            <div class="col-sm-6">
                <input type="email" class="form--control" placeholder="Your Email*" required>
            </div>
            <div class="col-12">
                <textarea class="form--control" rows="10" placeholder="Your Message*" required></textarea>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn--base">Submit Comment</button>
            </div>
        </form>
    </div>
@endpush
