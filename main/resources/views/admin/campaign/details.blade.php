@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card g-3">
                <div class="card-body row g-3">
                    <div class="col-lg-7">
                        <div class="card academy-content shadow-none border">
                            <div class="p-2 text-center">
                                <img src="{{ getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign')) }}" alt="image">
                            </div>
                            <div class="card-body">
                                <h4 class="mb-2 lh-lg">{{ __($campaign->name) }}</h4>
                                <hr class="my-4">
                                <div class="d-flex flex-wrap">
                                    <div class="me-5">
                                        <p class="text-nowrap">
                                            <i class="las la-stream me-2"></i><span class="fw-bold">@lang('Category'):</span> {{ __($campaign->category->name) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('Start Date'):</span> {{ showDateTime($campaign->start_date) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-calendar me-2"></i><span class="fw-bold">@lang('End Date'):</span> {{ showDateTime($campaign->end_date) }}
                                        </p>

                                        @php
                                            if ($campaign->status == ManageStatus::CAMPAIGN_PENDING) {
                                                $badgeClass = 'bg-label-warning';
                                                $status     = 'Pending';
                                            } else if ($campaign->status == ManageStatus::CAMPAIGN_APPROVED) {
                                                $badgeClass = 'bg-label-success';
                                                $status     = 'Approved';
                                            } else if ($campaign->status == ManageStatus::CAMPAIGN_REJECTED) {
                                                $badgeClass = 'bg-label-danger';
                                                $status     = 'Rejected';
                                            }

                                            if ($campaign->is_featured) {
                                                $featuredBadgeClass = 'bg-label-success';
                                                $featuredStatus     = 'Featured';
                                            } else {
                                                $featuredBadgeClass = 'bg-label-danger';
                                                $featuredStatus     = 'Not Featured';
                                            }
                                        @endphp

                                        <p class="text-nowrap">
                                            <i class="las la-clipboard-check me-2"></i><span class="fw-bold">@lang('Status'):</span> <span class="badge {{ $badgeClass }}">@lang($status)</span>
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-tag me-2"></i><span class="fw-bold">@lang('Featured Status'):</span> <span class="badge {{ $featuredBadgeClass }}">@lang($featuredStatus)</span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-nowrap">
                                            <i class="las la-hand-holding-usd me-2"></i><span class="fw-bold">@lang('Goal Amount'):</span> {{ $setting->cur_sym . showAmount($campaign->goal_amount) }}
                                        </p>
                                        <p class="text-nowrap">
                                            <i class="las la-wallet me-2"></i><span class="fw-bold">@lang('Raised Amount'):</span> {{ $setting->cur_sym . showAmount($campaign->raised_amount) }}
                                        </p>

                                        @php
                                            $percentage = donationPercentage($campaign->goal_amount, $campaign->raised_amount);
                                        @endphp

                                        <p class="text-nowrap">
                                            <i class="las la-percentage me-2"></i><span class="fw-bold">@lang('Donation Percent'):</span> {{ $percentage . '%' }}
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
                                <hr class="my-4">
                                <h5>Instructor</h5>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/11.png" alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">Devonne Wallbridge</span>
                                        <small class="text-muted">Web Developer, Designer, and Teacher</small>
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
@endsection
