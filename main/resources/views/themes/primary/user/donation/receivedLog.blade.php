@extends($activeTheme . 'layouts.frontend')

@section('front_end')
    <div class="dashboard py-60">
        <div class="container">
            <div class="card custom--card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <form action="" class="input--group">
                            <input type="text" class="form--control" name="search" value="{{ request('search') }}" placeholder="@lang('Search by transaction')">
                            <button type="submit" class="btn btn--sm btn--base">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <table class="table table-striped table-borderless table--responsive--xl">
                        <thead>
                            <tr>
                                <th>@lang('S.N.')</th>
                                <th>@lang('Campaign')</th>
                                <th>@lang('Gateway') | @lang('Trx')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Conversion')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donations as $donation)
                                <tr>
                                    <td>
                                        {{ @$donations->firstItem() + $loop->index }}
                                    </td>
                                    <td>
                                        <a href="{{ route('campaign.show', @$donation->donation->campaign->slug) }}">
                                            <span class="text-overflow-1 text--base">
                                                {{ __(@$donation->donation->campaign->name) }}
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text--base">{{ __(@$donation->gateway->name) }}</span>
                                        <br>
                                        <small data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="@lang('Transaction Number')">
                                            {{ @$donation->trx }}
                                        </small>
                                    </td>
                                    <td>
                                        {{ showDateTime(@$donation->created_at) }}
                                        <br>
                                        {{ diffForHumans(@$donation->created_at) }}
                                    </td>
                                    <td>
                                        {{ $setting->cur_sym . showAmount(@$donation->amount) }}
                                    </td>
                                    <td>
                                        1 {{ $setting->site_cur }} = {{ showAmount(@$donation->rate, 4) . ' ' . __(@$donation->method_currency) }}
                                        <br>
                                        <strong>
                                            {{ showAmount(@$donation->final_amo) . ' ' . __(@$donation->method_currency) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn--icon btn--base detailsBtn" data-campaign="{{ @$donation->donation->campaign->name }}" data-donor_name="{{ @$donation->donation->donorName }}" data-donor_email="{{ @$donation->donation->donorEmail }}" data-donor_phone="{{ @$donation->donation->donorPhone }}" data-donor_country="{{ @$donation->donation->donorCountry }}">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">
                                        {{ __($emptyMessage) }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($donations->hasPages())
                        {{ $donations->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Details Modal --}}
    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title details-modal-title">@lang('Provided Information')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div> --}}
                <div class="custom--card">
                    <div class="card-header">
                        <h3 class="title">Details of Donor: John Doe</h3>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Campaign :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <a href="donation-details.html">Education for Every Child: Donate to Break the Cycle of Poverty</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Full Name :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>John Doe</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Email :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>example@example.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Country :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>Bangladesh</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Phone :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>01234567890</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Amount :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>$200.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Payment Method :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>Paystack</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>Payment Date :</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span>2023-03-15 07:06 AM ( 8 months ago)</span>
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

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('[data-bs-toggle="tooltip"]').each(function(index, element) {
                new bootstrap.Tooltip(element)
            })

            $('.detailsBtn').on('click', function() {
                var modal = $('#detailsModal')
                modal.modal('show')
            })
        })(jQuery)
    </script>
@endpush
