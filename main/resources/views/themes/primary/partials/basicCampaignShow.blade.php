<div class="donation-details__img" data-aos="fade-up" data-aos-duration="1500">
    <img src="{{ getImage(getFilePath('campaign') . '/' . @$campaign->image, getFileSize('campaign')) }}" alt="image">
</div>
<nav>
    <div class="nav nav-tabs custom--tab" id="nav-tab" role="tablist">
        <button type="button" class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">
            @lang('Description')
        </button>
        <button type="button" class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image" role="tab" aria-controls="nav-image" aria-selected="false">
            @lang('Relevant Image')
        </button>

        @if (@$campaign->document)
            <button type="button" class="nav-link" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" role="tab" aria-controls="nav-document" aria-selected="false">
                @lang('Relevant Document')
            </button>
        @endif

        <button type="button" class="nav-link" id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">
            @lang('Comments')
        </button>
    </div>
</nav>
<div class="tab-content mb-4" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab" tabindex="0">
        <div class="donation-details__txt">
            <h2 class="donation-details__title" data-aos="fade-up" data-aos-duration="1500">{{ __(@$campaign->name) }}</h2>
            <div class="donation-details__desc" data-aos="fade-up" data-aos-duration="1500">
                @php echo @$campaign->description @endphp
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab" tabindex="0">
        <div class="row g-4">
            @foreach ($campaign->gallery as $image)
                <div class="col-md-4 col-sm-6 col-xsm-6">
                    <div class="donation-details__relevent-img">
                        <a href="{{ getImage(getFilePath('campaign') . '/' . @$image, getFileSize('campaign')) }}" data-lightbox="Campaign Name">
                            <img src="{{ getImage(getFilePath('campaign') . '/' . @$image, getFileSize('campaign')) }}" alt="image">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if (@$campaign->document)
        <div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" tabindex="0">
            <div class="donation-details__document">
                <object data="{{ asset(getFilePath('document') . '/' . @$campaign->document) }}" type="application/pdf"></object>
            </div>
        </div>
    @endif

    <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab" tabindex="0">
        <div class="donation-details__comments">
            <h3 class="donation-details__subtitle">@lang('Comments') (2)</h3>
            <div class="donation-details__comment">
                <div class="donation-details__comment__img">
                    <img src="assets/images/thumbs/1.png" alt="image">
                </div>
                <div class="donation-details__comment__txt">
                    <h4 class="donation-details__comment__name">John Doe</h4>
                    <p class="donation-details__comment__date">12 Dec, 2023</p>
                    <p class="donation-details__comment__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus harum? Molestiae eligendi nulla eum itaque temporibus dolores commodi amet animi quas accusamus aut veritatis labore cupiditate id, repudiandae
                        voluptatem!</p>
                </div>
            </div>
            <div class="donation-details__comment">
                <div class="donation-details__comment__img">
                    <img src="assets/images/thumbs/1.png" alt="image">
                </div>
                <div class="donation-details__comment__txt">
                    <h4 class="donation-details__comment__name">John Doe</h4>
                    <p class="donation-details__comment__date">12 Dec, 2023</p>
                    <p class="donation-details__comment__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus harum? Molestiae eligendi nulla eum itaque temporibus dolores commodi amet animi quas accusamus aut veritatis labore cupiditate id, repudiandae
                        voluptatem!</p>
                </div>
            </div>
        </div>

        @stack('post-comment')
    </div>
</div>
