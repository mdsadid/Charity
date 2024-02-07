@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="event py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event__list">
                        <div class="event__card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="event__img">
                                <a href="event-details.html"><img src="assets/images/thumbs/event-1.jpg" alt="Image"></a>
                                <div class="event__date"><span>25</span> Jan</div>
                            </div>
                            <div class="event__txt">
                                <h3 class="event__title">Rise Together: Empowering Lives Beyond Homelessness</h3>
                                <ul class="event__info">
                                    <li><i class="las la-clock"></i> 11:00AM - 03:00PM</li>
                                    <li><i class="las la-map-marker"></i>2103 Oak Ridge Drive, St Thomas - 65076</li>
                                </ul>
                                <a href="event-details.html" class="btn btn--sm btn--base">Grab a Seat</a>
                            </div>
                        </div>
                        <div class="event__card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="event__img">
                                <a href="event-details.html"><img src="assets/images/thumbs/event-2.jpg" alt="Image"></a>
                                <div class="event__date"><span>25</span> Jan</div>
                            </div>
                            <div class="event__txt">
                                <h3 class="event__title">Green Thumb Gala: A Celebration of Planting Prosperity</h3>
                                <ul class="event__info">
                                    <li><i class="las la-clock"></i> 11:00AM - 03:00PM</li>
                                    <li><i class="las la-map-marker"></i>2103 Oak Ridge Drive, St Thomas - 65076</li>
                                </ul>
                                <a href="event-details.html" class="btn btn--sm btn--base">Grab a Seat</a>
                            </div>
                        </div>
                        <div class="event__card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="event__img">
                                <a href="event-details.html"><img src="assets/images/thumbs/event-3.jpg" alt="Image"></a>
                                <div class="event__date"><span>25</span> Jan</div>
                            </div>
                            <div class="event__txt">
                                <h3 class="event__title">Savoring Hope: A Gourmet Affair for Street Children</h3>
                                <ul class="event__info">
                                    <li><i class="las la-clock"></i> 11:00AM - 03:00PM</li>
                                    <li><i class="las la-map-marker"></i>2103 Oak Ridge Drive, St Thomas - 65076</li>
                                </ul>
                                <a href="event-details.html" class="btn btn--sm btn--base">Grab a Seat</a>
                            </div>
                        </div>
                        <div class="event__card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="event__img">
                                <a href="event-details.html"><img src="assets/images/thumbs/event-4.jpg" alt="Image"></a>
                                <div class="event__date"><span>25</span> Jan</div>
                            </div>
                            <div class="event__txt">
                                <h3 class="event__title">Clean Sweep Carnival: Where Dust is the Uninvited Guest</h3>
                                <ul class="event__info">
                                    <li><i class="las la-clock"></i> 11:00AM - 03:00PM</li>
                                    <li><i class="las la-map-marker"></i>2103 Oak Ridge Drive, St Thomas - 65076</li>
                                </ul>
                                <a href="event-details.html" class="btn btn--sm btn--base">Grab a Seat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-sidebar">
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="post-sidebar__card__body">
                                <form>
                                    <div class="input--group">
                                        <input type="search" class="form--control" placeholder="Search">
                                        <button class="btn btn--base px-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Upcoming Events</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="post-sidebar__recent-event">
                                    <li>
                                        <a href="event-details.html" class="post-sidebar__recent-event__link">
                                            <span class="post-sidebar__recent-event__thumb">
                                                <img src="assets/images/thumbs/event-1.jpg" alt="image">
                                            </span>
                                            <div class="post-sidebar__recent-event__txt">
                                                <span class="post-sidebar__recent-event__title">Successful Fundraising Stories at Community Boost</span>
                                                <span class="post-sidebar__recent-event__date">17 Jan, 2023</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="event-details.html" class="post-sidebar__recent-event__link">
                                            <span class="post-sidebar__recent-event__thumb">
                                                <img src="assets/images/thumbs/event-2.jpg" alt="image">
                                            </span>
                                            <div class="post-sidebar__recent-event__txt">
                                                <span class="post-sidebar__recent-event__title">Successful Fundraising Stories at Community Boost</span>
                                                <span class="post-sidebar__recent-event__date">17 Jan, 2023</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="event-details.html" class="post-sidebar__recent-event__link">
                                            <span class="post-sidebar__recent-event__thumb">
                                                <img src="assets/images/thumbs/event-3.jpg" alt="image">
                                            </span>
                                            <div class="post-sidebar__recent-event__txt">
                                                <span class="post-sidebar__recent-event__title">Successful Fundraising Stories at Community Boost</span>
                                                <span class="post-sidebar__recent-event__date">17 Jan, 2023</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="post-sidebar__card__header">Event Category</h3>
                            <div class="post-sidebar__card__body">
                                <ul class="d-flex flex-column gap-2">
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-left"></i> All</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Education</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Winter Funding</a></li>
                                    <li><a href="#" class="d-flex align-items-center gap-2"><i class="fa-solid fa-arrow-right"></i> Fundamental</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
