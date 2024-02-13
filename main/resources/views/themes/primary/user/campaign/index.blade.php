@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="dashboard py-60">
        <div class="container">
            <div class="card custom--card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <form action="" class="input--group">
                            <input type="text" class="form--control" name="search" placeholder="@lang('Search by name')">
                            <button type="submit" class="btn btn--sm btn--base">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <table class="table table-striped table-borderless table--responsive--xl">
                        <thead>
                            <tr>
                                <th>@lang('S.N.')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Goal Amount')</th>
                                <th>@lang('Fund Raised')</th>
                                <th>@lang('Deadline')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($campaigns as $campaign)
                                <tr>
                                    <td>
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td>
                                        <span class="text-overflow-1 text--base">{{ __(@$campaign->name) }}</span>
                                    </td>
                                    <td>{{ $setting->cur_sym . showAmount(@$campaign->goal_amount) }}</td>
                                    <td>{{ $setting->cur_sym . showAmount(@$campaign->raised_amount) }}</td>
                                    <td>
                                        <span>
                                            <span class="d-block">{{ showDateTime(@$campaign->end_date, 'd-M-Y') }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        @if (@$campaign->isExpired())
                                            <span class="badge badge--secondary">@lang('Expired')</span>
                                        @else
                                            @if (@$campaign->status == ManageStatus::CAMPAIGN_PENDING)
                                                <span class="badge badge--warning">@lang('Pending')</span>
                                            @elseif (@$campaign->status == ManageStatus::CAMPAIGN_REJECTED)
                                                <span class="badge badge--danger">@lang('Rejected')</span>
                                            @else
                                                <span class="badge badge--success">@lang('Approved')</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="custom--dropdown dropdown-sm">
                                            <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                @lang('Action')
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('user.campaign.show', $campaign->slug) }}" class="dropdown-item">
                                                        <i class="fa-regular fa-eye text--info"></i> @lang('Details')
                                                    </a>
                                                </li>

                                                @if (@$campaign->status == ManageStatus::CAMPAIGN_APPROVED && !@$campaign->isExpired())
                                                    <li>
                                                        <a href="{{ route('user.campaign.edit', $campaign->slug) }}" class="dropdown-item">
                                                            <i class="fa-regular fa-pen-to-square text--success"></i> @lang('Edit Image')
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($campaigns->hasPages())
                        {{ $campaigns->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
