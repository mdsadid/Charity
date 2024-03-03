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
                                        <a href="{{ route('admin.campaigns.details', $deposit->donation->campaign->id) }}" target="_blank">
                                            {{ __(strLimit($deposit->donation->campaign->name, 30)) }}
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="text-primary">{{ __($deposit->gateway->name) }}</span>
                                            <br>
                                            <small data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="@lang('Transaction Number')">
                                                {{ $deposit->trx }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $setting->cur_sym . showAmount($deposit->amount) }} + <span class="text-success" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="@lang('Charge')">{{ showAmount($deposit->charge) }}</span>
                                        <br>
                                        <strong data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="@lang('Amount With Charge')">
                                            {{ showAmount($deposit->amount + $deposit->charge) . ' ' . __($setting->site_cur) }}
                                        </strong>
                                    </td>
                                    <td>
                                        1 {{ $setting->site_cur }} = {{ showAmount($deposit->rate, 4) . ' ' . __($deposit->method_currency) }}
                                        <br>
                                        <strong>
                                            {{ showAmount($deposit->final_amo) . ' ' . __($deposit->method_currency) }}
                                        </strong>
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
                                        <button type="button" class="btn btn-sm btn-label-info donorViewBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" data-donor_type="{{ $deposit->donation->donorType }}" data-donor_name="{{ $deposit->donation->donorName }}" data-donor_email="{{ $deposit->donation->donorEmail }}" data-donor_phone="{{ $deposit->donation->donorPhone }}" data-donor_country="{{ $deposit->donation->donorCountry }}" data-user_data="{{ json_encode($deposit->detail) }}" data-admin_feedback="{{ $deposit->admin_feedback }}" data-url="{{ route('admin.file.download', ['filePath' => 'verify']) }}">
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
            <h5 id="offcanvasBothLabel" class="offcanvas-title">@lang('Donor Information')</h5>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0"></div>
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

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('[data-bs-toggle="tooltip"]').each(function(index, element) {
                new bootstrap.Tooltip(element)
            })

            $('.donorViewBtn').on('click', function() {
                let donorType    = $(this).data('donor_type')
                let donorName    = $(this).data('donor_name')
                let donorEmail   = $(this).data('donor_email')
                let donorPhone   = $(this).data('donor_phone')
                let donorCountry = $(this).data('donor_country')

                let html = `<div class="donor-info">
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
                                    </li>
                                </ul>
                            </div>`

                let userData = $(this).data('user_data')

                if (userData) {
                    let downloadURL = $(this).data('url')

                    html += `<div class="mt-4 user-data">
                                <h5 class="mb-4">@lang('Donation Related Data')</h5>
                                <ul class="list-group">`

                    userData.forEach(element => {
                        if (!element.value) return

                        if (element.type != 'file') {
                            html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>${element.name}</b>
                                        <span>${element.value}</span>
                                    </li>`
                        } else {
                            html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>${element.name}</b>
                                        <span>
                                            <a href="${downloadURL}&fileName=${element.value}">
                                                <i class="las la-arrow-circle-down"></i> @lang('Attachment')
                                            </a>
                                        </span>
                                    </li>`
                        }
                    })

                    html += `</ul>
                        </div>`
                }

                let feedback = $(this).data('admin_feedback')

                if (feedback) {
                    html += `<div class="mt-4 admin-feedback">
                                <h5>@lang('Admin Feedback')</h5>
                                <p>${feedback}</p>
                            </div>`
                }

                html += `<button type="button" class="btn btn-secondary d-grid w-100 mt-4" data-bs-dismiss="offcanvas">
                            @lang('Close')
                        </button>`

                $('.offcanvas-body').html(html)
            })

            $('.cancelBtn').on('click', function () {
                let cancelModal = $('#cancelModal')

                cancelModal.find('form').attr('action', $(this).data('action'))
                cancelModal.modal('show')
            })
        })(jQuery)
    </script>
@endpush
