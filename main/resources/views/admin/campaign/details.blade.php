@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card g-3">
                <div class="card-body row g-3">
                    <div class="col-lg-7">
                        <div class="card academy-content shadow-none border">
                            <div class="p-2 text-center">
                                <img src="{{ getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign')) }}" alt="image" class="rounded">
                            </div>
                            <div class="card-body">
                                <h4 class="mb-2 lh-lg">{{ __($campaign->name) }}</h4>

                                @if ($campaign->status == ManageStatus::CAMPAIGN_PENDING)
                                    <hr class="mb-2 mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="demo-inline-spacing">
                                                <button type="button" class="btn btn-label-success w-100 decisionBtn" data-question="@lang('Do you want to approve this campaign?')" data-action="{{ route('admin.campaigns.status.update', ['id' => $campaign->id, 'type' => 'approve']) }}">
                                                    <span class="tf-icons las la-check-circle fs-6 me-1"></span>@lang('Approve Campaign')
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="demo-inline-spacing">
                                                <button type="button" class="btn btn-label-danger w-100 decisionBtn" data-question="@lang('Do you want to reject this campaign?')" data-action="{{ route('admin.campaigns.status.update', ['id' => $campaign->id, 'type' => 'reject']) }}">
                                                    <span class="tf-icons lar la-times-circle fs-6 me-1"></span>@lang('Reject Campaign')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($campaign->status == ManageStatus::CAMPAIGN_APPROVED)
                                    <hr class="mb-2 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="demo-inline-spacing">
                                                @if ($campaign->featured)
                                                    <button type="button" class="btn btn-label-danger w-100 decisionBtn" data-question="@lang('Do you want to unfeatured this campaign?')" data-action="{{ route('admin.campaigns.featured.update', $campaign->id) }}">
                                                        <span class="tf-icons lar la-times-circle fs-6 me-1"></span>@lang('Remove Featured')
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-label-success w-100 decisionBtn" data-question="@lang('Do you want to featured this campaign?')" data-action="{{ route('admin.campaigns.featured.update', $campaign->id) }}">
                                                        <span class="tf-icons las la-check-circle fs-6 me-1"></span>@lang('Make Featured')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-nowrap">
                                            <i class="las la-stream me-2"></i><span class="fw-bold">@lang('Category'):</span> {{ __($campaign->category->name) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('Start Date'):</span> {{ showDateTime($campaign->start_date, 'd-M-Y h:i A') }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('End Date'):</span> {{ showDateTime($campaign->end_date, 'd-M-Y h:i A') }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-clipboard-check me-2"></i><span class="fw-bold">@lang('Status'):</span> @php echo $campaign->campaignStatusBadge @endphp
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-nowrap">
                                            <i class="las la-tag me-2"></i><span class="fw-bold">@lang('Featured Status'):</span> <span class="badge {{ $campaign->featured ? 'bg-label-success' : 'bg-label-danger' }}">{{ $campaign->featured ? trans('Featured') : trans('Not Featured') }}</span>
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-hand-holding-usd me-2"></i><span class="fw-bold">@lang('Goal Amount'):</span> {{ $setting->cur_sym . showAmount($campaign->goal_amount) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-wallet me-2"></i><span class="fw-bold">@lang('Raised Amount'):</span> {{ $setting->cur_sym . showAmount($campaign->raised_amount) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-users me-2"></i><span class="fw-bold">@lang('Total Donor'):</span> 0
                                        </p>
                                    </div>
                                </div>
                                <hr class="mb-4 mt-2">
                                <h5>@lang('Description')</h5>
                                <div class="mb-4">
                                    @php echo $campaign->description @endphp
                                </div>
                                <hr class="mb-4 mt-2">
                                <h5>@lang('Relevant Images')</h5>
                                <div class="mb-4">
                                    <div class="swiper" id="swiper-with-progress">
                                        <div class="swiper-wrapper">
                                            @foreach ($campaign->gallery as $image)
                                                <div class="swiper-slide" style="background-image: url({{ getImage(getFilePath('campaign') . '/' . $image, getFileSize('campaign')) }})"></div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-next swiper-button-white custom-icon"></div>
                                        <div class="swiper-button-prev swiper-button-white custom-icon"></div>
                                    </div>
                                </div>

                                @if ($campaign->document)
                                    <hr class="mb-4 mt-2">
                                    <h5>@lang('Relevant Document')</h5>
                                    <div class="mb-4">
                                        <div class="donation-details__document">
                                            <object data="{{ asset(getFilePath('document') . '/' . $campaign->document) }}" type="application/pdf"></object>
                                        </div>
                                    </div>
                                @endif

                                <hr class="my-4">
                                <h5>@lang('Author')</h5>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-2">
                                            <img src="" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">{{ __($campaign->user->fullname) }}</span>
                                        <small class="text-muted">
                                            <a href="{{ route('admin.user.details', $campaign->user->id) }}">{{ '@' . $campaign->user->username }}</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="accordion stick-top accordion-bordered" id="courseContent">
                            <div class="accordion-item shadow-none border border-bottom-0 active mb-0">
                                <div class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                                        <span class="d-flex flex-column">
                                            <span class="h5 mb-1">Course Content</span>
                                            <span class="fw-normal">2 / 5 | 4.4 min</span>
                                        </span>
                                    </button>
                                </div>
                                <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
                                    <div class="accordion-body py-3 border-top">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1" checked="" />
                                            <label for="defaultCheck1" class="form-check-label ms-3">
                                                <span class="mb-0 h6">1. Welcome to this course</span>
                                                <span class="text-muted d-block">2.4 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck2" checked="" />
                                            <label for="defaultCheck2" class="form-check-label ms-3">
                                                <span class="mb-0 h6">2. Watch before you start</span>
                                                <span class="text-muted d-block">4.8 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3" />
                                            <label for="defaultCheck3" class="form-check-label ms-3">
                                                <span class="mb-0 h6">3. Basic design theory</span>
                                                <span class="text-muted d-block">5.9 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck4" />
                                            <label for="defaultCheck4" class="form-check-label ms-3">
                                                <span class="mb-0 h6">4. Basic fundamentals</span>
                                                <span class="text-muted d-block">3.6 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck5" />
                                            <label for="defaultCheck5" class="form-check-label ms-3">
                                                <span class="mb-0 h6">5. What is ui/ux</span>
                                                <span class="text-muted d-block">10.6 min</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item shadow-none border border-bottom-0 mb-0">
                                <div class="accordion-header" id="headingTwo">
                                    <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterTwo" aria-expanded="false" aria-controls="chapterTwo">
                                        <span class="d-flex flex-column">
                                            <span class="h5 mb-1">Web Design for Web Developers</span>
                                            <span class="fw-normal">0 / 4 | 4.4 min</span>
                                        </span>
                                    </button>
                                </div>
                                <div id="chapterTwo" class="accordion-collapse collapse" data-bs-parent="#courseContent">
                                    <div class="accordion-body py-3 border-top">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck1" checked="" />
                                            <label for="defCheck1" class="form-check-label ms-3">
                                                <span class="mb-0 h6">1. How to use Pages in Figma</span>
                                                <span class="text-muted d-block">8:31 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck2" />
                                            <label for="defCheck2" class="form-check-label ms-3">
                                                <span class="mb-0 h6">2. What is Lo Fi Wireframe</span>
                                                <span class="text-muted d-block">2 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck3" />
                                            <label for="defCheck3" class="form-check-label ms-3">
                                                <span class="mb-0 h6">3. How to use color in Figma</span>
                                                <span class="text-muted d-block">5.9 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" id="defCheck4" />
                                            <label for="defCheck4" class="form-check-label ms-3">
                                                <span class="mb-0 h6">4. Frames vs Groups in Figma</span>
                                                <span class="text-muted d-block">3.6 min</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item shadow-none border border-bottom-0 mb-0">
                                <div class="accordion-header" id="headingThree">
                                    <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterThree" aria-expanded="false" aria-controls="chapterThree">
                                        <span class="d-flex flex-column">
                                            <span class="h5 mb-1">Build Beautiful Websites!</span>
                                            <span class="fw-normal">0 / 6 | 4.4 min</span>
                                        </span>
                                    </button>
                                </div>
                                <div id="chapterThree" class="accordion-collapse collapse" data-bs-parent="#courseContent">
                                    <div class="accordion-body py-3 border-top">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-01" checked="" />
                                            <label for="defCheck-01" class="form-check-label ms-3">
                                                <span class="mb-0 h6">1. Section & Div Block</span>
                                                <span class="text-muted d-block">8:31 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-02" checked="" />
                                            <label for="defCheck-02" class="form-check-label ms-3">
                                                <span class="mb-0 h6">2. Read-Only Version of Chat App</span>
                                                <span class="text-muted d-block">8 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-03" />
                                            <label for="defCheck-03" class="form-check-label ms-3">
                                                <span class="mb-0 h6">3. Webflow Autosave</span>
                                                <span class="text-muted d-block">2.9 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-04" />
                                            <label for="defCheck-04" class="form-check-label ms-3">
                                                <span class="mb-0 h6">4. Canvas Settings</span>
                                                <span class="text-muted d-block">7.6 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-05" />
                                            <label for="defCheck-05" class="form-check-label ms-3">
                                                <span class="mb-0 h6">5. HTML Tags</span>
                                                <span class="text-muted d-block">10 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" id="defCheck-06" />
                                            <label for="defCheck-06" class="form-check-label ms-3">
                                                <span class="mb-0 h6">6. Footer (Chat App)</span>
                                                <span class="text-muted d-block">9.10 min</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item shadow-none border mb-0">
                                <div class="accordion-header" id="headingFour">
                                    <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterFour" aria-expanded="false" aria-controls="chapterFour">
                                        <span class="d-flex flex-column">
                                            <span class="h5 mb-1">Final Project</span>
                                            <span class="fw-normal">0 / 3 | 4.4 min</span>
                                        </span>
                                    </button>
                                </div>
                                <div id="chapterFour" class="accordion-collapse collapse" data-bs-parent="#courseContent">
                                    <div class="accordion-body py-3 border-top">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-101" checked="" />
                                            <label for="defCheck-101" class="form-check-label ms-3">
                                                <span class="mb-0 h6">1. Responsive Blog Site</span>
                                                <span class="text-muted d-block">10:0 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-102" checked="" />
                                            <label for="defCheck-102" class="form-check-label ms-3">
                                                <span class="mb-0 h6">2. Responsive Portfolio</span>
                                                <span class="text-muted d-block">13:00 min</span>
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="defCheck-103" />
                                            <label for="defCheck-103" class="form-check-label ms-3">
                                                <span class="mb-0 h6">3. Responsive eCommerce Website</span>
                                                <span class="text-muted d-block">15 min</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-decisionModal />
@endsection

@push('breadcrumb')
    <a href="{{ $backRoute }}" class="btn btn-label-primary">
        <span class="tf-icons las la-arrow-circle-left me-1"></span> @lang('Back')
    </a>
@endpush

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/page/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/page/ui-carousel.css') }}">
@endpush

@push('page-style')
    <style>
        .donation-details__document object {
            width: 100%;
            height: 600px;
            border-radius: 5px;
        }
    </style>
@endpush

@push('page-script-lib')
    <script src="{{ asset('assets/admin/js/page/swiper.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/ui-carousel.js') }}"></script>
@endpush
