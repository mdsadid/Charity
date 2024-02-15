@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card g-3">
                <div class="card-body row g-3">
                    <div class="col-lg-6">
                        <div class="card academy-content shadow-sm border">
                            <div class="card-body">
                                <img src="{{ getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign')) }}" alt="image" class="rounded img-fluid">
                                <h4 class="mt-4 mb-2 lh-lg">{{ __($campaign->name) }}</h4>

                                @if (!$campaign->isExpired())
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
                                @endif

                                <hr class="my-4">
                                <h5>@lang('Description')</h5>
                                <div class="description">
                                    @php echo $campaign->description @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card academy-content shadow-sm border">
                            <div class="card-body">
                                <h5>@lang('Basic Information')</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-nowrap">
                                            <i class="las la-stream me-2"></i><span class="fw-bold">@lang('Category'):</span> {{ __($campaign->category->name) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-user me-2"></i><span class="fw-bold">@lang('Author'):</span> {{ __($campaign->user->fullname) }} <small><a href="{{ route('admin.user.details', $campaign->user->id) }}">{{ '@' . $campaign->user->username }}</a></small>
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('Start Date'):</span> <span class="text-primary">{{ showDateTime($campaign->start_date, 'd-M-Y') }}</span>
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('End Date'):</span> <span class="text-danger">{{ showDateTime($campaign->end_date, 'd-M-Y') }}</span>
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-clipboard-check me-2"></i><span class="fw-bold">@lang('Approval Status'):</span> @php echo $campaign->approvalStatusBadge @endphp
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-nowrap">
                                            <i class="las la-bullhorn me-2"></i><span class="fw-bold">@lang('Campaign Status'):</span> @php echo $campaign->campaignStatusBadge @endphp
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-tag me-2"></i><span class="fw-bold">@lang('Featured Status'):</span> @php echo $campaign->featuredStatusBadge @endphp
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
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="text-nowrap mb-0">
                                                    <i class="las la-spinner me-2"></i><span class="fw-bold">@lang('Donation Progress'):</span>
                                                </p>
                                            </div>

                                            @php
                                                $percentage = donationPercentage($campaign->goal_amount, $campaign->raised_amount);
                                            @endphp

                                            <div class="progress flex-grow-1 custom-progress-bar">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                                    {{ $percentage . '%' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h5>@lang('Relevant Images')</h5>
                                <div>
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
                                    <hr class="my-4">
                                    <h5>@lang('Relevant Document')</h5>
                                    <div>
                                        <div class="donation-details__document">
                                            <object data="{{ asset(getFilePath('document') . '/' . $campaign->document) }}" type="application/pdf"></object>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card academy-content shadow-sm border">
                            <div class="card-body">
                                <h5>@lang('Comments')</h5>

                                @if (count($campaign->comments))
                                    <div class="accordion accordion-bordered" id="commentsContent">
                                        @foreach ($campaign->comments as $comment)
                                            <div @class(['accordion-item shadow-none border mb-0', 'border-bottom-0' => !$loop->last, 'active' => $loop->first])>
                                                <div class="accordion-header" id="{{ 'heading_' . $loop->iteration }}">
                                                    <button type="button" @class(['accordion-button bg-lighter rounded-0', 'collapsed' => !$loop->first]) data-bs-toggle="collapse" data-bs-target="{{ '#comment_' . $loop->iteration }}" aria-expanded="@if ($loop->first) true @else false @endif" aria-controls="{{ 'comment_' . $loop->iteration }}">
                                                        <span class="d-flex flex-column">
                                                            <span class="h5 mb-2">{{ __($comment->user->fullname) }}</span>
                                                            <span class="fw-normal">{{ showDateTime($comment->updated_at, 'd M, Y') }}</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div id="{{ 'comment_' . $loop->iteration }}" @class(['accordion-collapse collapse', 'show' => $loop->first]) data-bs-parent="#commentsContent">
                                                    <div class="accordion-body py-3 border-top">
                                                        <p class="mb-0">{{ __($comment->comment) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="mb-0">{{ __($emptyMessage) }}</p>
                                @endif
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
        .description p {
            margin-bottom: 0;
        }

        .custom-progress-bar {
            max-width: 435px;
            margin-left: 7px;
        }

        .donation-details__document object {
            width: 100%;
            height: 450px;
            border-radius: 5px;
        }
    </style>
@endpush

@push('page-script-lib')
    <script src="{{ asset('assets/admin/js/page/swiper.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/ui-carousel.js') }}"></script>
@endpush
