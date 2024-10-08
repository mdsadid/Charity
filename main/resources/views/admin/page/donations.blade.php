@extends('admin.layouts.master')

@section('master')
    <div class="row">
        @if (request()->routeIs('admin.donations.index'))
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-widget-separator-wrapper">
                        <div class="card-body card-widget-separator">
                            <div class="row gy-4 gy-sm-1">
                                <a href="{{ route('admin.donations.done') }}" class="col-sm-6 col-lg-4">
                                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                        <div>
                                            <h3 class="mb-1">{{ showAmount($done) . ' ' . __($setting->site_cur) }}</h3>
                                            <p class="mb-0">@lang('Done Donation Amount')</p>
                                        </div>
                                        <span class="badge bg-label-success rounded p-2 me-sm-4">
                                            <i class="las la-check-circle fs-3"></i>
                                        </span>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </a>
                                <a href="{{ route('admin.donations.pending') }}" class="col-sm-6 col-lg-4">
                                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                        <div>
                                            <h3 class="mb-1">{{ showAmount($pending) . ' ' . __($setting->site_cur) }}</h3>
                                            <p class="mb-0">@lang('Pending Donation Amount')</p>
                                        </div>
                                        <span class="badge bg-label-warning rounded p-2 me-sm-4">
                                            <i class="las la-spinner fs-3"></i>
                                        </span>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </a>
                                <a href="{{ route('admin.donations.cancelled') }}" class="col-sm-6 col-lg-4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h3 class="mb-1">{{ showAmount($cancelled) . ' ' . __($setting->site_cur) }}</h3>
                                            <p class="mb-0">@lang('Cancelled Donation Amount')</p>
                                        </div>
                                        <span class="badge bg-label-danger rounded p-2">
                                            <i class="lar la-times-circle fs-3"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xxl">
            <div class="card">
                <div class="card-body table-responsive text-nowrap fixed-min-height-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('Campaign')</th>
                                <th>@lang('Donor')</th>
                                <th>@lang('Gateway | Transaction')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Conversion Rate')</th>
                                <th>@lang('Donation Date')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($deposits as $deposit)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.campaigns.details', $deposit->campaign->id) }}" target="_blank">
                                            {{ __(strLimit($deposit->campaign->name, 30)) }}
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="fw-bold">{{ __($deposit->donorName) }}</span>
                                            <br>

                                            @if ($deposit->user && $deposit->donor_type)
                                                <span class="small">
                                                    <a href="{{ appendQuery('search', $deposit->user->username) }}">
                                                        <span>@</span>{{ $deposit->user->username }}
                                                    </a>
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="text-primary">{{ __($deposit->gateway->name) }}</span>
                                            <br>
                                            <small title="@lang('Transaction Number')">
                                                {{ $deposit->trx }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ $setting->cur_sym . showAmount($deposit->amount) }} + <span class="text-danger" title="@lang('Charge')">{{ showAmount($deposit->charge) }}</span>
                                            <br>
                                            <strong title="@lang('Amount With Charge')">
                                                {{ showAmount($deposit->amount + $deposit->charge) . ' ' . __($setting->site_cur) }}
                                            </strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            1 {{ $setting->site_cur }} = {{ showAmount($deposit->rate, 4) . ' ' . __($deposit->method_currency) }}
                                            <br>
                                            <strong>
                                                {{ showAmount($deposit->final_amount) . ' ' . __($deposit->method_currency) }}
                                            </strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ showDateTime($deposit->created_at) }}
                                            <br>
                                            {{ diffForHumans($deposit->created_at) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($deposit->status == ManageStatus::PAYMENT_PENDING)
                                            <span class="badge bg-label-warning">@lang('Pending')</span>
                                        @elseif ($deposit->status == ManageStatus::PAYMENT_SUCCESS)
                                            <span class="badge bg-label-success">@lang('Succeeded')</span>
                                        @elseif ($deposit->status == ManageStatus::PAYMENT_CANCEL)
                                            <span class="badge bg-label-danger">@lang('Canceled')</span>
                                        @else
                                            <span class="badge bg-label-secondary">@lang('Initiated')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-label-info donorViewBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" data-donor_type="{{ $deposit->donor_type }}" data-donor_name="{{ __($deposit->donorName) }}" data-donor_email="{{ $deposit->donorEmail }}" data-donor_phone="{{ $deposit->donorPhone }}" data-donor_country="{{ $deposit->donorCountry }}" data-user_data="{{ json_encode($deposit->details) }}" data-admin_feedback="{{ $deposit->admin_feedback }}" data-url="{{ route('admin.file.download', ['filePath' => 'verify']) }}">
                                            <span class="tf-icons las la-info-circle me-1"></span> @lang('Details')
                                        </button>

                                        @if ($deposit->status == ManageStatus::PAYMENT_PENDING)
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @lang('Action')
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to approve this donation?')" data-action="{{ route('admin.donations.approve', $deposit->id) }}">
                                                            <i class="las la-check-circle fs-6 link-success"></i> @lang('Approve')
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item cancelBtn" data-action="{{ route('admin.donations.reject', $deposit->id) }}">
                                                            <i class="lar la-times-circle fs-6 link-danger"></i> @lang('Reject')
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($deposits->hasPages())
                    <div class="card-footer pagination justify-content-center">
                        {{ paginateLinks($deposits) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
        <div class="offcanvas-header">
            <h3 id="offcanvasBothLabel" class="offcanvas-title">@lang('Donation Details')</h3>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
            <div class="basicData"></div>
            <div class="userData"></div>
            <button type="button" class="btn btn-secondary d-grid w-100 mt-4" data-bs-dismiss="offcanvas">
                @lang('Close')
            </button>
        </div>
    </div>

    <x-decisionModal />

    <div class="modal-onboarding modal fade animate__animated" id="cancelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body p-0 text-center">
                        <div class="onboarding-media">
                            <div class="mx-2">
                                <img src="{{ asset('assets/admin/images/light.png') }}" alt="light" width="100" class="img-fluid">
                            </div>
                        </div>
                        <div class="onboarding-content mb-0">
                            <h4 class="onboarding-title text-body">@lang('Make Your Decision')</h4>
                            <div class="onboarding-info question">
                                @lang('Do you want to reject this donation?')
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <h5>@lang('Reason')</h5>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="admin_feedback" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="submit" class="btn btn-primary">@lang('Yes')</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('No')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb')
    <x-searchForm placeholder="TRX/Username" dateSearch="yes" />
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('.donorViewBtn').on('click', function() {
                let donorType

                if ($(this).data('donor_type')) {
                    donorType = '<span class="badge bg-label-success">@lang("Known")</span>';
                } else {
                    donorType = '<span class="badge bg-label-warning">@lang("Anonymous")</span>';
                }

                let donorName    = $(this).data('donor_name')
                let donorEmail   = $(this).data('donor_email')
                let donorPhone   = $(this).data('donor_phone')
                let donorCountry = $(this).data('donor_country')

                let html = `<div class="mb-4">
                                <h5>@lang('Basic Information')</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>@lang('Donor Type')</b>
                                        ${donorType}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>@lang('Name')</b>
                                        <span>${donorName}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>@lang('Email')</b>
                                        <span>${donorEmail}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>@lang('Phone')</b>
                                        <span>${donorPhone}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>@lang('Country')</b>
                                        <span>${donorCountry}</span>
                                    </li>`

                let feedback = $(this).data('admin_feedback')

                if (feedback) {
                    html += `<li class="list-group-item">
                                <b class="text-primary">@lang('Admin Feedback')</b>
                                <p class="mt-2 mb-0 d-none d-sm-block">${feedback}</p>
                            </li>`
                }

                html += `</ul>
                    </div>`

                $('.basicData').html(html)

                let userData = $(this).data('user_data')

                if (userData) {
                    let downloadURL = $(this).data('url')

                    let infoHtml = `<div class="mt-4">
                                        <h5>@lang('Donation Related Data')</h5>
                                        <ul class="list-group">`

                    userData.forEach(element => {
                        if (!element.value) return

                        if (element.type != 'file') {
                            infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>${element.value}</span>
                                        </li>`
                        } else {
                            infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>
                                                <a href="${downloadURL}&fileName=${element.value}">
                                                    <i class="las la-arrow-circle-down"></i> @lang('Attachment')
                                                </a>
                                            </span>
                                        </li>`
                        }
                    })

                    infoHtml += `</ul>
                            </div>`

                    $('.userData').html(infoHtml)
                } else {
                    $('.userData').html('')
                }
            })

            $('.cancelBtn').on('click', function () {
                let cancelModal = $('#cancelModal')

                cancelModal.find('form').attr('action', $(this).data('action'))
                cancelModal.modal('show')
            })
        })(jQuery)
    </script>
@endpush
