@extends($activeTheme . 'layouts.app')

@section('content')
    <section class="banner-section">
        <div class="banner-slider">
            <div class="banner-slider__slide bg-img" data-background-image="assets/images/thumbs/slider-bg-1.jpg">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="banner-content">
                                <h4 class="banner-content__subtitle">Pledge for Progress</h4>
                                <h1 class="banner-content__title">Empowering Dreams, One Backing at a Time</h1>
                                <p class="banner-content__desc">Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.</p>
                                <div class="banner-content__button d-flex gap-3 flex-wrap">
                                    <a href="#" class="btn btn--base">Join With Us</a>
                                    <a href="#" class="btn btn--base">Explore Campaign</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-10">
                            <div class="banner-img">
                                <img src="assets/images/thumbs/slider-bg-1.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slider__slide bg-img" data-background-image="assets/images/thumbs/slider-bg-2.jpg">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="banner-content">
                                <h4 class="banner-content__subtitle">Join the Backing Revolution</h4>
                                <h1 class="banner-content__title">Backing Visionaries, Building Tomorrow</h1>
                                <p class="banner-content__desc">Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.</p>
                                <div class="banner-content__button d-flex gap-3 flex-wrap">
                                    <a href="#" class="btn btn--base">Join With Us</a>
                                    <a href="#" class="btn btn--base">Explore Campaign</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-10">
                            <div class="banner-img">
                                <img src="assets/images/thumbs/slider-bg-2.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slider__slide bg-img" data-background-image="assets/images/thumbs/slider-bg-3.jpg">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="banner-content">
                                <h4 class="banner-content__subtitle">Back, Believe, Build</h4>
                                <h1 class="banner-content__title">Where Ideas Take Flight, Fueled by You</h1>
                                <p class="banner-content__desc">Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.</p>
                                <div class="banner-content__button d-flex gap-3 flex-wrap">
                                    <a href="#" class="btn btn--base">Join With Us</a>
                                    <a href="#" class="btn btn--base">Explore Campaign</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-10">
                            <div class="banner-img">
                                <img src="assets/images/thumbs/slider-bg-3.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="about pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-6 col-md-5">
                    <div class="about__img" data-aos="fade-up" data-aos-duration="1500">
                        <img src="assets/images/thumbs/about-img.png" alt="Image">
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6 col-md-7">
                    <div class="about__content" data-aos="fade-up" data-aos-duration="1500">
                        <div class="section-heading">
                            <h2 class="section-heading__title">Together We Fund, Together We Flourish</h2>
                        </div>
                        <p class="about__desc">Welcome to our community, where our mantra is simple yet powerful: "Together We Fund, Together We Flourish." We believe that collective generosity cultivates flourishing outcomes.</p>
                        <div class="row about__card-row g-4">
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter">$ <span class="odometer" data-count="12000">0</span></div>
                                    <span class="name">Total Fund Raised</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter"><span class="odometer" data-count="150">0</span>+</div>
                                    <span class="name">Total Causes</span>
                                </div>
                            </div>
                        </div>
                        <p class="about__desc">Join us on this journey of shared purpose, as every contribution sows the seeds for a thriving, interconnected future.</p>
                        <a href="about.html" class="btn btn--base">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-campaign py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Featured Campaign</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="campaign-card" data-aos="fade-up" data-aos-duration="1500">
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
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="campaign-card" data-aos="fade-up" data-aos-duration="1500">
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
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="campaign-card" data-aos="fade-up" data-aos-duration="1500">
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
            </div>
        </div>
    </div>
    <div class="cause-category py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Cause Category</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="cause-category__slider" data-aos="fade-up" data-aos-duration="1500">
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-1.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Treatment</a></h3>
                </div>
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-2.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Medical</a></h3>
                </div>
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-3.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Emergency</a></h3>
                </div>
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-4.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Non Profit</a></h3>
                </div>
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-5.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Financial Emergency</a></h3>
                </div>
                <div class="cause-category__slide">
                    <div class="cause-category__img">
                        <a href="#"><img src="assets/images/thumbs/category-6.jpg" alt="Medical"></a>
                    </div>
                    <h3 class="cause-category__title"><a href="#">Environment</a></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="new-campaign py-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Our Recent Initiatives</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="new-campaign__slider" data-aos="fade-up" data-aos-duration="1500">
                <div class="new-campaign__slide">
                    <div class="campaign-card">
                        <div class="campaign-card__img">
                            <a href="#"><img src="assets/images/thumbs/campaign-1.jpg" alt="image"></a>
                        </div>
                        <div class="campaign-card__txt">
                            <h3 class="campaign-card__title"><a href="#">The Entrepreneur Ship - Atlantic rowing challenge</a></h3>
                            <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
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
                <div class="new-campaign__slide">
                    <div class="campaign-card">
                        <div class="campaign-card__img">
                            <a href="#"><img src="assets/images/thumbs/campaign-2.jpg" alt="image"></a>
                        </div>
                        <div class="campaign-card__txt">
                            <h3 class="campaign-card__title"><a href="#">Turn 30% of our ocean into no take zones by 2030</a></h3>
                            <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
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
                <div class="new-campaign__slide">
                    <div class="campaign-card">
                        <div class="campaign-card__img">
                            <a href="#"><img src="assets/images/thumbs/campaign-3.jpg" alt="image"></a>
                        </div>
                        <div class="campaign-card__txt">
                            <h3 class="campaign-card__title"><a href="#">The Menopause Charity Crowdfund</a></h3>
                            <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
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
                <div class="new-campaign__slide">
                    <div class="campaign-card">
                        <div class="campaign-card__img">
                            <a href="#"><img src="assets/images/thumbs/campaign-4.jpg" alt="image"></a>
                        </div>
                        <div class="campaign-card__txt">
                            <h3 class="campaign-card__title"><a href="#">To help people who fight for freedom and peace</a></h3>
                            <div class="campaign__countdown" data-target-date="2024-03-30T23:59:59"></div>
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
    <div class="volunteer pt-60 pb-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Discover Our Volunteer</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="volunteer__card">
                        <div class="volunteer__img">
                            <img src="assets/images/thumbs/volunteer-1.jpg" alt="image">
                        </div>
                        <div class="volunteer__txt">
                            <h3 class="volunteer__name">John Doe</h3>
                            <ul>
                                <li>
                                    <span>Participate:</span>
                                    10 Campaigns
                                </li>
                                <li>
                                    <span>From:</span>
                                    Bangladesh
                                </li>
                                <li>
                                    <span>Social:</span>
                                    <div class="social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="volunteer__card">
                        <div class="volunteer__img">
                            <img src="assets/images/thumbs/volunteer-2.jpg" alt="image">
                        </div>
                        <div class="volunteer__txt">
                            <h3 class="volunteer__name">John Doe</h3>
                            <ul>
                                <li>
                                    <span>Participate:</span>
                                    10 Campaigns
                                </li>
                                <li>
                                    <span>From:</span>
                                    Bangladesh
                                </li>
                                <li>
                                    <span>Social:</span>
                                    <div class="social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="volunteer__card">
                        <div class="volunteer__img">
                            <img src="assets/images/thumbs/volunteer-3.jpg" alt="image">
                        </div>
                        <div class="volunteer__txt">
                            <h3 class="volunteer__name">John Doe</h3>
                            <ul>
                                <li>
                                    <span>Participate:</span>
                                    10 Campaigns
                                </li>
                                <li>
                                    <span>From:</span>
                                    Bangladesh
                                </li>
                                <li>
                                    <span>Social:</span>
                                    <div class="social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="volunteer__card">
                        <div class="volunteer__img">
                            <img src="assets/images/thumbs/volunteer-4.jpg" alt="image">
                        </div>
                        <div class="volunteer__txt">
                            <h3 class="volunteer__name">John Doe</h3>
                            <ul>
                                <li>
                                    <span>Participate:</span>
                                    10 Campaigns
                                </li>
                                <li>
                                    <span>From:</span>
                                    Bangladesh
                                </li>
                                <li>
                                    <span>Social:</span>
                                    <div class="social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-lg-5 pt-4" data-aos="fade-up" data-aos-duration="1500">
                <a href="volunteer.html" class="btn btn--base">See All Volunteer</a>
            </div>
        </div>
    </div>
    <div class="donor py-120 bg-light-gradient">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Our Top Donors</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 donor__row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">01</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">02</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">03</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">04</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">05</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">06</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">07</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">08</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">09</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">10</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">11</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">12</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">13</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">14</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">15</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">16</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">17</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">18</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">19</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xsm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="donor__card">
                        <span class="donor__number">20</span>
                        <span class="donor__txt">
                            <span class="donor__name">Mr. Donor Khan</span>
                            <span class="donor__amount">$12,001.23</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-lg-5 pt-4" data-aos="fade-up" data-aos-duration="1500">
                <a href="donor-list.html" class="btn btn--base">View All Donors</a>
            </div>
        </div>
    </div>
    <div class="counter-section py-60">
        <div class="container">
            <div class="row counter-section__row g-4">
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="counter-section__card">
                        <h3 class="counter-section__number odometer" data-count="1203">0</h3>
                        <p class="counter-section__name">Total Volunteer</p>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="counter-section__card">
                        <h3 class="counter-section__number odometer" data-count="3627">0</h3>
                        <p class="counter-section__name">Total Volunteer</p>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="counter-section__card">
                        <h3 class="counter-section__number odometer" data-count="2785">0</h3>
                        <p class="counter-section__name">Total Volunteer</p>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="counter-section__card">
                        <h3 class="counter-section__number odometer" data-count="1596">0</h3>
                        <p class="counter-section__name">Total Volunteer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="upcoming-event pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Upcoming Events</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="upcoming-event__row">
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Harmony for Hope Gala</h3>
                        <p>Elevate spirits at the Harmony for Hope Gala, uniting for a night of generosity and compassion.</p>
                    </div>
                </div>
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Rhythm of Giving: A Charity Concert</h3>
                        <p>Immerse in melodies and generosity at Rhythm of Giving, a charity concert echoing support for noble causes.</p>
                    </div>
                </div>
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Empower the Future 5K Run</h3>
                        <p>Empower the future with every step at the 5K Run, a dynamic event merging fitness and philanthropy.</p>
                    </div>
                </div>
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Auction Extravaganza</h3>
                        <p>Bid for a better future at Artistry for a Cause, an auction extravaganza celebrating creativity and compassion.</p>
                    </div>
                </div>
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Heartbeat for Humanity</h3>
                        <p>Join the Heartbeat for Humanity Walkathon, where every step resonates with the rhythm of positive change.</p>
                    </div>
                </div>
                <div class="upcoming-event__card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="upcoming-event__schedule">
                        <span class="upcoming-event__date">17</span>
                        <span class="upcoming-event__month">March</span>
                    </div>
                    <div class="upcoming-event__txt">
                        <h3 class="upcoming-event__title">Culinary Delights Fundraiser</h3>
                        <p>Savor the flavors of generosity at Gourmet Giving, a culinary delights fundraiser supporting worthy causes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="success-showcase pt-60 pb-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Success Showcase</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="success-showcase__card">
                        <div class="success-showcase__img">
                            <a href="success-details.html"><img src="assets/images/thumbs/success-1.png" alt="image"></a>
                        </div>
                        <div class="success-showcase__txt">
                            <h3 class="success-showcase__title"><a href="success-details.html">Successful Fundraising Stories at Community Boost</a></h3>
                            <p class="success-showcase__desc">It’s always heartwarming and inspiring to hear successful nonprofit fundraising stories.</p>
                            <a href="success-details.html" class="btn btn--sm btn--base">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="success-showcase__card">
                        <div class="success-showcase__img">
                            <a href="success-details.html"><img src="assets/images/thumbs/success-2.png" alt="image"></a>
                        </div>
                        <div class="success-showcase__txt">
                            <h3 class="success-showcase__title"><a href="success-details.html">6 Reasons You Need Nonprofit Storytelling</a></h3>
                            <p class="success-showcase__desc">Nonprofits are doing incredible boots-on-the-ground work every single day. Raising awareness. Providing education.</p>
                            <a href="success-details.html" class="btn btn--sm btn--base">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="success-showcase__card">
                        <div class="success-showcase__img">
                            <a href="success-details.html"><img src="assets/images/thumbs/success-3.png" alt="image"></a>
                        </div>
                        <div class="success-showcase__txt">
                            <h3 class="success-showcase__title"><a href="success-details.html">TikTok SEO: Tips to Increase Your Nonprofits Reach</a></h3>
                            <p class="success-showcase__desc">TikTok is one of the fastest-growing social media platforms with over 800 million active users worldwide.</p>
                            <a href="success-details.html" class="btn btn--sm btn--base">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-5" data-aos="fade-up" data-aos-duration="1500">
                <a href="success-showcase.html" class="btn btn--base">View All Story</a>
            </div>
        </div>
    </div>
@endsection
