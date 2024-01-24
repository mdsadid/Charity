@extends($activeTheme . 'layouts.app')

@section('content')
    <div class="about py-120 bg-img" data-background-image="assets/images/thumbs/about-bg.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="about__img" data-aos="fade-up" data-aos-duration="1500">
                        <img src="assets/images/thumbs/about-img.png" alt="About Us">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="about__content" data-aos="fade-up" data-aos-duration="1500">
                        <div class="section-heading">
                            <h2 class="section-heading__title">Together We Fund, Together We Flourish</h2>
                        </div>
                        <p class="about__desc">Welcome to our community, where our mantra is simple yet powerful: "Together We Fund, Together We Flourish." We believe that collective generosity cultivates flourishing outcomes.</p>
                        <div class="row about__card-row">
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter">$ <span class="odometer">12,000</span></div>
                                    <span class="name">Total Fund Raised</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about__card">
                                    <div class="counter"><span class="odometer">150</span>+</div>
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
    <section class="testimonials pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Client’s Review</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-8" data-aos="fade-up" data-aos-duration="1500">
                    <div class="testimonial-txt-slider">
                        <div class="testimonails-card">
                            <div class="testimonial-item">
                                <p class="testimonial-item__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.</p>
                                <div class="testimonial-item__content">
                                    <div class="testimonial-item__info">
                                        <div class="testimonial-item__details">
                                            <h5 class="testimonial-item__name"> Robiul Hasan</h5>
                                            <span class="testimonial-item__designation"> CEO & Founder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonails-card">
                            <div class="testimonial-item">
                                <p class="testimonial-item__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.</p>
                                <div class="testimonial-item__content">
                                    <div class="testimonial-item__info">
                                        <div class="testimonial-item__details">
                                            <h5 class="testimonial-item__name"> John Doe</h5>
                                            <span class="testimonial-item__designation"> Web Devloper </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonails-card">
                            <div class="testimonial-item">
                                <p class="testimonial-item__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.</p>
                                <div class="testimonial-item__content">
                                    <div class="testimonial-item__info">
                                        <div class="testimonial-item__details">
                                            <h5 class="testimonial-item__name"> Mark Smith</h5>
                                            <span class="testimonial-item__designation"> Web Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonails-card">
                            <div class="testimonial-item">
                                <p class="testimonial-item__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.</p>
                                <div class="testimonial-item__content">
                                    <div class="testimonial-item__info">
                                        <div class="testimonial-item__details">
                                            <h5 class="testimonial-item__name"> Robiul Hasan</h5>
                                            <span class="testimonial-item__designation"> Founder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="testimonial-img-slider">
                        <div class="testimonial-img">
                            <img src="assets/images/thumbs/testimonial-img-1.jpg" alt="image">
                        </div>
                        <div class="testimonial-img">
                            <img src="assets/images/thumbs/testimonial-img-2.jpg" alt="image">
                        </div>
                        <div class="testimonial-img">
                            <img src="assets/images/thumbs/testimonial-img-3.jpg" alt="image">
                        </div>
                        <div class="testimonial-img">
                            <img src="assets/images/thumbs/testimonial-img-1.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
