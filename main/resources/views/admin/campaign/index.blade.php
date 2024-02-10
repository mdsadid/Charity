@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body table-responsive text-nowrap fixed-min-height-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Category')</th>
                                <th>@lang('Author')</th>
                                <th>@lang('Goal Amount')</th>
                                <th>@lang('Start Date')</th>
                                <th>@lang('End Date')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($campaigns as $campaign)
                                <tr>
                                    <td>
                                        {{ __(strLimit($campaign->name, 30)) }}
                                    </td>
                                    <td>
                                        {{ __($campaign->category->name) }}
                                    </td>
                                    <td>
                                        <div>
                                            <span class="fw-bold">{{ $campaign->user->fullname }}</span>
                                            <br>
                                            <span class="small">
                                                <a href="{{ route('admin.user.details', $campaign->user->id) }}">{{ '@' . $campaign->user->username }}</a>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold">
                                            {{ $setting->cur_sym . showAmount($campaign->goal_amount) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            {{ showDateTime($campaign->start_date) }}<br>{{ diffForHumans($campaign->start_date) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ showDateTime($campaign->end_date) }}<br>{{ diffForHumans($campaign->end_date) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($campaign->status == ManageStatus::CAMPAIGN_PENDING)
                                            <span class="badge bg-label-warning">@lang('Pending')</span>
                                        @elseif ($campaign->status == ManageStatus::CAMPAIGN_APPROVED)
                                            <span class="badge bg-label-success">@lang('Approved')</span>
                                        @elseif ($campaign->status == ManageStatus::CAMPAIGN_REJECTED)
                                            <span class="badge bg-label-danger">@lang('Rejected')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.campaigns.details', $campaign->id) }}" class="btn btn-sm btn-label-info">
                                            <span class="tf-icons las la-info-circle me-1"></span> @lang('Details')
                                        </a>

                                        {{-- @if (request()->routeIs('admin.user.kyc.pending'))
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-label-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('KYC Action')</button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button type="button" class="dropdown-item detailBtn" data-bs-toggle      = "offcanvas" data-bs-target      = "#offcanvasBoth" aria-controls       = "offcanvasBoth" data-kyc_data = "{{ json_encode($user->kyc_data) }}">
                                                            <i class="las la-info-circle fs-6 link-info"></i> @lang('KYC Details')
                                                        </button>
                                                    </li>

                                                    <li>
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you confirm the approval of these documents?')" data-action="{{ route('admin.user.kyc.approve', $user->id) }}">
                                                            <i class="las la-check-circle fs-6 link-success"></i> @lang('Approve')
                                                        </button>
                                                    </li>

                                                    <li>
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you confirm the cancelation of these documents?')" data-action="{{ route('admin.user.kyc.cancel', $user->id) }}">
                                                            <i class="lar la-times-circle fs-6 link-warning"></i> @lang('Cancel')
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif --}}
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

                @if ($campaigns->hasPages())
                    <div class="card-footer pagination justify-content-center">
                        {{ paginateLinks($campaigns) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
