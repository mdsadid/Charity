<div class="donation-details__img" data-aos="fade-up" data-aos-duration="1500">
    <img src="{{ getImage(getFilePath('campaign') . '/' . @$campaign->image, getFileSize('campaign')) }}" alt="image">
</div>
<nav>
    <div class="nav nav-tabs custom--tab" id="nav-tab" role="tablist">
        <button type="button" class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">
            @lang('Description')
        </button>
        <button type="button" class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image" role="tab" aria-controls="nav-image" aria-selected="false">
            @lang('Relevant Images')
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
            <h3 class="donation-details__subtitle">@lang('Comments') ({{ count(@$campaign->comments) }})</h3>

            @forelse ($campaign->comments as $comment)
                <div class="donation-details__comment">
                    <div class="donation-details__comment__img">
                        <img src="" alt="image">
                    </div>
                    <div class="donation-details__comment__txt">
                        <h4 class="donation-details__comment__name">{{ __(@$comment->user->fullname) }}</h4>
                        <p class="donation-details__comment__date">{{ showDateTime(@$comment->updated_at, 'd M, Y') }}</p>
                        <p class="donation-details__comment__desc">{{ __(@$comment->comment) }}</p>
                    </div>
                </div>
            @empty
                <p>{{ __($emptyMessage) }}</p>
            @endforelse
        </div>

        @if (request()->routeIs('campaign.show') && $campaign->user_id != @$authUser->id)
            <div class="donation-details__post__comment">
                <h3 class="donation-details__subtitle">@lang('Post a comment')</h3>
                <form action="{{ route('campaign.comment', @$campaign->slug) }}" method="POST" class="row g-4">
                    @csrf
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form--control" value="{{ old('name', @$authUser->fullname) }}" placeholder="Your Name*" required @readonly($authUser)>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form--control" value="{{ old('email', @$authUser->email) }}" placeholder="Your Email*" required @readonly($authUser)>
                    </div>
                    <div class="col-12">
                        <textarea class="form--control" name="comment" rows="10" placeholder="Your Comment*" required>{{ old('comment') }}</textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn--base">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
