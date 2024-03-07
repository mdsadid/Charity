@extends($activeTheme . 'layouts.frontend')

{{-- TODO: Rearrange Withdraw Email Template --}}

@section('front_end')
    <div class="dashboard py-60">
        <div class="container">
            <div class="card custom--card">
                <div class="card-body">
                    <div class="row gy-3 align-items-end mb-4">
                        <div class="col-xl-4 col-lg-3 col-sm-6 col-xsm-6">
                            <label for="transactionNumber" class="form--label">Transaction Number</label>
                            <input type="text" class="form--control" id="transactionNumber">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-sm-6 col-xsm-6">
                            <label for="transactionType" class="form--label">Type</label>
                            <select class="form--control form-select" id="transactionType">
                                <option value="">All</option>
                                <option value="plus">Plus</option>
                                <option value="minus">Minus</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-sm-6 col-xsm-6">
                            <label for="transactionRemark" class="form--label">Remark</label>
                            <select class="form--control form-select" id="transactionRemark">
                                <option value="">Any</option>
                                <option value="plus">Donation Received</option>
                                <option value="minus">Withdraw</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6 col-xsm-6">
                            <button class="btn btn--base w-100">Filter</button>
                        </div>
                    </div>
                    <table class="table table-striped table-borderless table--responsive--xl">
                        <thead>
                            <tr>
                                <th>Trx</th>
                                <th>Transacted</th>
                                <th>Amount</th>
                                <th>Post Balance</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--danger">- 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">New donation on Building Bright...campaign</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">979.00 USD Withdraw Via Bank Transfer</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">New donation on Building Bright...campaign</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">New donation on Warmth for All:...campaign</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--danger">- 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--success">+ 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                            <tr>
                                <td data-label="Trx">GHJGFHFFJHK9D</td>
                                <td data-label="Transacted">
                                    <span>
                                        <span class="d-block">2023-11-29 12:47 AM</span>
                                        <span class="d-block">5 days ago</span>
                                    </span>
                                </td>
                                <td data-label="Amount">
                                    <span class="text--danger">- 1,100.00</span>
                                </td>
                                <td data-label="Post Balance">41,743.00 USD</td>
                                <td data-label="Detail">999.90 USD Withdraw Via Mobile Money</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="show-filter mb-3 text-end">
                        <button type="button" class="btn btn--base showFilterBtn btn-sm"><i class="las la-filter"></i> @lang('Filter')</button>
                    </div>
                    <div class="card responsive-filter-card mb-4">
                        <div class="card-body">
                            <form action="">
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="flex-grow-1">
                                        <label>@lang('Transaction Number')</label>
                                        <input type="text" name="search" value="{{ request()->search }}" class="form-control form--control">
                                    </div>
                                    <div class="flex-grow-1">
                                        <label>@lang('Type')</label>
                                        <select name="trx_type" class="form-select form--control">
                                            <option value="">@lang('All')</option>
                                            <option value="+" @selected(request()->trx_type == '+')>@lang('Plus')</option>
                                            <option value="-" @selected(request()->trx_type == '-')>@lang('Minus')</option>
                                        </select>
                                    </div>
                                    <div class="flex-grow-1">
                                        <label>@lang('Remark')</label>
                                        <select class="form-select form--control" name="remark">
                                            <option value="">@lang('Any')</option>
                                            @foreach ($remarks as $remark)
                                            <option value="{{ $remark->remark }}" @selected(request()->remark == $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex-grow-1 align-self-end">
                                        <button class="btn btn-primary w-100"><i class="las la-filter"></i> @lang('Filter')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card custom--card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table custom--table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Trx')</th>
                                            <th>@lang('Transacted')</th>
                                            <th>@lang('Amount')</th>
                                            <th>@lang('Post Balance')</th>
                                            <th>@lang('Detail')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transactions as $trx)
                                        <tr>
                                            <td>
                                                <strong>{{ $trx->trx }}</strong>
                                            </td>

                                            <td>
                                                {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at) }}
                                            </td>

                                            <td class="budget">
                                                <span class="fw-bold @if ($trx->trx_type == '+')text-success @else text-danger @endif">
                                                    {{ $trx->trx_type }} {{showAmount($trx->amount)}} {{ $setting->site_cur }}
                                                </span>
                                            </td>

                                            <td class="budget">
                                            {{ showAmount($trx->post_balance) }} {{ __($setting->site_cur) }}
                                        </td>


                                        <td>{{ __($trx->details) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($transactions->hasPages())
                        <div class="card-footer">
                            {{ $transactions->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
