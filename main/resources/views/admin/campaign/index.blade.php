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
                                <th>@lang('Goal') | @lang('Raised')</th>
                                <th>@lang('Start Date') | @lang('End Date')</th>
                                <th>@lang('Approval Status')</th>
                                <th>@lang('Campaign Status')</th>
                                <th>@lang('Featured')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($campaigns as $campaign)
                                <tr>
                                    <td>
                                        {{ __(strLimit($campaign->name, 20)) }}
                                    </td>
                                    <td>
                                        <strong>{{ __($campaign->category->name) }}</strong>
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
                                        <div>
                                            <span class="text-primary">{{ $setting->cur_sym . showAmount($campaign->goal_amount) }}</span><br>
                                            <span class="text-success">{{ $setting->cur_sym . showAmount($campaign->raised_amount) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong class="text-primary">{{ showDateTime($campaign->start_date, 'd-M-Y') }}</strong><br>
                                            <strong class="text-danger">{{ showDateTime($campaign->end_date, 'd-M-Y') }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        @php echo $campaign->approvalStatusBadge @endphp
                                    </td>
                                    <td>
                                        @php echo $campaign->campaignStatusBadge @endphp
                                    </td>
                                    <td>
                                        @php echo $campaign->featuredStatusBadge @endphp
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.campaigns.details', $campaign->id) }}" class="btn btn-sm btn-label-info">
                                            <span class="tf-icons las la-info-circle me-1"></span> @lang('Details')
                                        </a>

                                        @if ($campaign->status != ManageStatus::CAMPAIGN_REJECTED && !$campaign->isExpired())
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @lang('Action')
                                                </button>

                                                @if ($campaign->status == ManageStatus::CAMPAIGN_PENDING)
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to approve this campaign?')" data-action="{{ route('admin.campaigns.status.update', [$campaign->id, 'approve']) }}">
                                                                <i class="las la-check-circle fs-6 link-success"></i> @lang('Approve Campaign')
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to reject this campaign?')" data-action="{{ route('admin.campaigns.status.update', [$campaign->id, 'reject']) }}">
                                                                <i class="lar la-times-circle fs-6 link-danger"></i> @lang('Reject Campaign')
                                                            </button>
                                                        </li>
                                                    </ul>
                                                @elseif ($campaign->status == ManageStatus::CAMPAIGN_APPROVED)
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            @if ($campaign->featured)
                                                                <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to unfeatured this campaign?')" data-action="{{ route('admin.campaigns.featured.update', $campaign->id) }}">
                                                                    <i class="lar la-times-circle fs-6 link-danger"></i> @lang('Remove Featured')
                                                                </button>
                                                            @else
                                                                <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to featured this campaign?')" data-action="{{ route('admin.campaigns.featured.update', $campaign->id) }}">
                                                                    <i class="las la-check-circle fs-6 link-success"></i> @lang('Make Featured')
                                                                </button>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                @endif
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

                @if ($campaigns->hasPages())
                    <div class="card-footer pagination justify-content-center">
                        {{ paginateLinks($campaigns) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-decisionModal />
@endsection

@push('breadcrumb')
    <x-searchForm placeholder="Campaign Name" />
@endpush
