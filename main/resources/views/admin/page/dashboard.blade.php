@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator">
                        <div class="row gy-4 gy-sm-1">
                            <a href="{{ route('admin.user.index') }}" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1">{{ $widget['totalUsers'] }}</h3>
                                        <p class="mb-0">@lang('Total Users')</p>
                                    </div>
                                    <span class="badge bg-label-primary rounded p-2 me-sm-4">
                                        <i class="las la-users fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </a>
                            <a href="{{ route('admin.user.active') }}" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1">{{ $widget['activeUsers'] }}</h3>
                                        <p class="mb-0">@lang('Active Users')</p>
                                    </div>
                                    <span class="badge bg-label-info rounded p-2 me-lg-4">
                                        <i class="la las la-user-check fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none">
                            </a>
                            <a href="{{ route('admin.user.email.unconfirmed') }}" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                    <div>
                                        <h3 class="mb-1">{{ $widget['emailUnconfirmedUsers'] }}</h3>
                                        <p class="mb-0">@lang('Email Unconfirmed Users')</p>
                                    </div>
                                    <span class="badge bg-label-warning rounded p-2 me-sm-4">
                                        <i class="las la-at fs-3"></i>
                                    </span>
                                </div>
                            </a>
                            <a href="{{ route('admin.user.mobile.unconfirmed') }}" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h3 class="mb-1">{{ $widget['mobileUnconfirmedUsers'] }}</h3>
                                        <p class="mb-0">@lang('Mobile Unconfirmed Users')</p>
                                    </div>
                                    <span class="badge bg-label-danger rounded p-2">
                                        <i class="las la-mobile-alt fs-3"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('admin.donations.done') }}" class="col-lg-3 col-sm-6 mb-4">
            <div class="card card-border-shadow-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text text-success">@lang('Donated')</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $setting->cur_sym }}{{ showAmount($widget['depositDone']) }}</h4>
                            </div>
                            <small>@lang('Total donated amount')</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="las la-hand-holding-usd fs-3"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.donations.pending') }}" class="col-lg-3 col-sm-6 mb-4">
            <div class="card card-border-shadow-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-warning">
                            <p class="card-text text-warning">@lang('Pending')</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $widget['depositPending'] }}</h4>
                            </div>
                            <small>@lang('Count of pending donations')</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded p-2">
                                <i class='las la-spinner fs-3'></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.donations.cancelled') }}" class="col-lg-3 col-sm-6 mb-4">
            <div class="card card-border-shadow-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-danger">
                            <p class="card-text text-danger">@lang('Cancelled')</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $widget['depositCancelled'] }}</h4>
                            </div>
                            <small>@lang('Count of cancelled donations')</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded p-2">
                                <i class='las la-times-circle fs-3'></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.donations.index') }}" class="col-lg-3 col-sm-6 mb-4">
            <div class="card card-border-shadow-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text text-info">@lang('Charge')</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $setting->cur_sym }}{{ showAmount($widget['depositCharge']) }}</h4>
                            </div>
                            <small>@lang('Total charge for donated amount')</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded p-2">
                                <i class="las la-money-bill fs-3"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="row">
        <a href="{{ route('admin.withdraw.done') }}" class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="las la-university fs-3"></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $setting->cur_sym }}{{ showAmount($widget['withdrawDone']) }}</h4>
                    </div>
                    <p class="mb-1 text-primary">@lang('Withdrawn')</p>
                    <p class="mb-0">
                        <small>@lang('Total withdrawn amount')</small>
                    </p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.withdraw.pending') }}" class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class='las la-circle-notch fs-3'></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $widget['withdrawPending'] }}</h4>
                    </div>
                    <p class="mb-1 text-warning">@lang('Pending')</p>
                    <p class="mb-0">
                        <small>@lang('Count of pending withdrawal')</small>
                    </p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.withdraw.canceled') }}" class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class='las la-ban fs-3'></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $widget['withdrawCancelled'] }}</h4>
                    </div>
                    <p class="mb-1 text-danger">@lang('Cancelled')</p>
                    <p class="mb-0">
                        <small>@lang('Count of cancelled withdrawal')</small>
                    </p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.withdraw.index') }}" class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info">
                                <i class="las la-money-bill fs-3"></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $setting->cur_sym }}{{ showAmount($widget['withdrawCharge']) }}</h4>
                    </div>
                    <p class="mb-1 text-info">@lang('Charge')</p>
                    <p class="mb-0">
                        <small>@lang('Total charge for withdrawn amount')</small>
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">@lang('Donation & Withdraw')</h5>
                        <small class="text-muted">@lang('Progress report for last 12 months')</small>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 mb-md-0t">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Email | Phone')</th>
                                <th>@lang('Country | Joined')</th>
                                <th>@lang('Balance')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($latestUsers as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium lh-1">{{ $user->fullname }}</span>
                                                <small class="text-muted"><a href="{{ route('admin.user.details', $user->id) }}"><span>@</span>{{ $user->username }}</a></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ $user->email }}<br>{{ $user->mobile }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="fw-bold" title="{{ @$user->country_name }}">{{ $user->country_code }}</span><br>
                                            {{ diffForHumans($user->created_at) }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold">
                                            {{ $setting->cur_sym }}{{ showAmount($user->balance) }}
                                        </span>
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
            </div>
        </div>
    </div>

    <div class="modal-onboarding modal fade animate__animated" id="passwordAlertModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="onboarding-media">
                        <div class="mx-2">
                            <img src="{{ asset('assets/admin/images/light.png') }}" alt="light" width="100" class="img-fluid">
                        </div>
                    </div>
                    <div class="onboarding-content mb-0">
                        <h4 class="onboarding-title text-body">@lang('Security Advise')</h4>
                        <div class="onboarding-info">
                            <b>@lang('Change your default username and password')</b>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-footer border-0 justify-content-center">
                        <a href="{{ route('admin.profile') }}" class="btn btn-outline-primary">
                            @lang('Change Username')
                        </a>
                        <a href="{{ route('admin.password') }}" class="btn btn-primary">
                            @lang('Change Password')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-script-lib')
    <script src="{{ asset('assets/admin/js/page/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/logistics.js') }}"></script>
@endpush

@push('page-script')
    <script>
        "use strict";

        @if ($passwordAlert)
            (function($) {
                let passwordAlertModal = new bootstrap.Modal(document.getElementById('passwordAlertModal'));
                passwordAlertModal.show();
            })(jQuery);
        @endif

        var options = {
            series: [{
                name: 'Total Donation',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$depositsMonth->where('months', $month)->first()->depositAmount) }},
                    @endforeach
                ]
            }, {
                name: 'Total Withdraw',
                data: [
                    @foreach ($months as $month)
                        {{ getAmount(@$withdrawalMonth->where('months', $month)->first()->withdrawAmount) }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($months),
            },
            yaxis: {
                title: {
                    text: "{{ __($setting->cur_sym) }}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "{{ __($setting->cur_sym) }}" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
