@extends($activeTheme . 'layouts.app')

@section('content')
    <div class="contact py-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Get In Touch With Us</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-5 justify-content-lg-around justify-content-center align-items-center ">
                <div class="col-lg-6 col-md-10">
                    <div class="card custom--card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header">
                            <h3 class="title">We are waiting to hear from you</h3>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-sm-6">
                                    <label for="fullName" class="form--label">Your Full Name <span class="text--danger">*</span></label>
                                    <input type="text" id="fullName" class="form--control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="emailAddress" class="form--label">Your Email <span class="text--danger">*</span></label>
                                    <input type="email" id="emailAddress" class="form--control" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form--label">Subject <span class="text--danger">*</span></label>
                                    <input type="text" id="subject" class="form--control" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form--label">Message <span class="text--danger">*</span></label>
                                    <textarea id="message" rows="10" class="form--control" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn--base">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact__info">
                        <div class="contact__info__card d-flex flex-column gap-4">
                            <div class="custom--card" data-aos="fade-up" data-aos-duration="1500">
                                <div class="card-body">
                                    <h3 class="card-subtitle d-flex align-items-center gap-2 mb-2"><i class="fa-solid fa-location-dot"></i> Address:</h3>
                                    <p>House - 60, Road - 20, Sector - 11, Uttara, Dhaka, Bangladesh.</p>
                                </div>
                            </div>
                            <div class="custom--card" data-aos="fade-up" data-aos-duration="1500">
                                <div class="card-body">
                                    <h3 class="card-subtitle d-flex align-items-center gap-2 mb-2"><i class="fa-solid fa-envelope"></i> Email:</h3>
                                    <ul>
                                        <li>example@example.com</li>
                                        <li>example@example.com</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="custom--card" data-aos="fade-up" data-aos-duration="1500">
                                <div class="card-body">
                                    <h3 class="card-subtitle d-flex align-items-center gap-2 mb-2"><i class="fa-solid fa-phone"></i> Phone:</h3>
                                    <ul>
                                        <li>+880 1234 567 890</li>
                                        <li>+880 1234 567 890</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="custom--card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-body">
                            <div class="contact__map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2169.457883228329!2d90.38891252420743!3d23.869089109366413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1701176723248!5m2!1sen!2sbd" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
