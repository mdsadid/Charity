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
                                        <button type="button" class="btn btn-sm btn-label-info donorViewBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" data-donor_type="{{ $deposit->donation->donorType }}" data-donor_name="{{ $deposit->donation->donorName }}" data-donor_email="{{ $deposit->donation->donorEmail }}" data-donor_phone="{{ $deposit->donation->donorPhone }}" data-donor_country="{{ $deposit->donation->donorCountry }}">
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
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to reject this comment?')" data-action="{{ route('admin.comments.status.update', [$deposit->id, 'reject']) }}">
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
        <div class="offcanvas-body mx-0 flex-grow-0">
            <div class="donorInfo">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center" id="donor-type">
                        <b>@lang('Donor Type')</b>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>@lang('Name')</b>
                        <span id="donor-name"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>@lang('Email')</b>
                        <span id="donor-email"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>@lang('Phone')</b>
                        <span id="donor-phone"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>@lang('Country')</b>
                        <span id="donor-country"></span>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-secondary d-grid w-100 mt-4" data-bs-dismiss="offcanvas">
                @lang('Close')
            </button>
        </div>
    </div>

    <x-decisionModal />
@endsection

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('[data-bs-toggle="tooltip"]').each(function(index, element) {
                new bootstrap.Tooltip(element)
            })

            $('.donorViewBtn').on('click', function() {
                if ($('#donor-type').find('.donor-badge').length <= 0) {
                    $('#donor-type').append($(this).data('donor_type'))
                }

                $('#donor-name').text($(this).data('donor_name'))
                $('#donor-email').text($(this).data('donor_email'))
                $('#donor-phone').text($(this).data('donor_phone'))
                $('#donor-country').text($(this).data('donor_country'))
            })
        })(jQuery)
    </script>
@endpush
