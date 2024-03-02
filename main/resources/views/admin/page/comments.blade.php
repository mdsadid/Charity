@extends('admin.layouts.master')

@section('master')
    <div class="row">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body table-responsive text-nowrap fixed-min-height-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('Campaign')</th>
                                <th>@lang('Name | Email')</th>
                                <th>@lang('User Type')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Comment Date')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.campaigns.details', $comment->campaign->id) }}" target="_blank">
                                            {{ __(strLimit($comment->campaign->name, 45)) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($comment->user)
                                            <div>
                                                <span class="fw-bold">{{ $comment->user->fullname }}</span>
                                                <br>
                                                <span class="small">
                                                    <a href="{{ route('admin.user.details', $comment->user->id) }}">{{ $comment->user->email }}</a>
                                                </span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="fw-bold">{{ $comment->name }}</span>
                                                <br>
                                                <span class="small">{{ $comment->email }}</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @php echo $comment->userTypeBadge @endphp
                                    </td>
                                    <td>
                                        @if ($comment->status == ManageStatus::CAMPAIGN_COMMENT_PENDING)
                                            <span class="badge bg-label-warning">@lang('Pending')</span>
                                        @elseif ($comment->status == ManageStatus::CAMPAIGN_COMMENT_APPROVED)
                                            <span class="badge bg-label-success">@lang('Approved')</span>
                                        @else
                                            <span class="badge bg-label-danger">@lang('Rejected')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            {{ showDateTime($comment->created_at) }}<br>{{ diffForHumans($comment->created_at) }}
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-label-info commentViewBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" data-comment="{{ $comment->comment }}">
                                            <span class="tf-icons las la-eye me-1"></span> @lang('View')
                                        </button>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                @lang('Action')
                                            </button>

                                            <ul class="dropdown-menu">
                                                @if ($comment->status == ManageStatus::CAMPAIGN_COMMENT_PENDING)
                                                    <li>
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to approve this comment?')" data-action="{{ route('admin.comments.status.update', [$comment->id, 'approve']) }}">
                                                            <i class="las la-check-circle fs-6 link-success"></i> @lang('Approve')
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item decisionBtn" data-question="@lang('Do you want to reject this comment?')" data-action="{{ route('admin.comments.status.update', [$comment->id, 'reject']) }}">
                                                            <i class="lar la-times-circle fs-6 link-danger"></i> @lang('Reject')
                                                        </button>
                                                    </li>
                                                @endif

                                                <li>
                                                    <button type="button" class="dropdown-item commentDeleteButton" data-question="@lang('Do you want to delete this comment?')" data-action="{{ route('admin.comments.delete', $comment->id) }}">
                                                        <i class="las la-trash-alt fs-6 link-danger"></i> @lang('Delete')
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
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

                @if ($comments->hasPages())
                    <div class="card-footer pagination justify-content-center">
                        {{ paginateLinks($comments) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasBothLabel" class="offcanvas-title">@lang('Comment')</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
            <div class="userComment"></div>
        </div>
    </div>

    <x-decisionModal />

    @include('admin.partials.deleteComment')
@endsection

@push('breadcrumb')
    <x-searchForm placeholder="Campaign/Author" />
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('.commentViewBtn').on('click', function() {
                let comment     = $(this).data('comment')
                let commentHtml = `<p>${comment}</p>`

                $('.userComment').html(commentHtml)
            })
        })(jQuery)
    </script>
@endpush
