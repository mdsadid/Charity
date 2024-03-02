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
                                        <a href="javascript:void(0)" class="btn btn--icon btn--base detailsBtn" data-campaign="{{ @$donation->donation->campaign->name }}" data-campaign_url="{{ route('campaign.show', @$donation->donation->campaign->slug) }}" data-donor_name="{{ @$donation->donation->donorName }}" data-donor_email="{{ @$donation->donation->donorEmail }}" data-donor_phone="{{ @$donation->donation->donorPhone }}" data-donor_country="{{ @$donation->donation->donorCountry }}">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="custom--card">
                    <div class="card-header d-flex">
                        <h3 class="title">@lang('Details of Donation')</h3>
                        <button type="button" class="details-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>@lang('Campaign'):</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <a href="" class="campaign-name"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>@lang('Full Name'):</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span class="donor-full-name"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>@lang('Email'):</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span class="donor-email"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>@lang('Phone'):</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span class="donor-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row gy-1">
                                    <div class="col-sm-4 col-xsm-5">
                                        <p>@lang('Country'):</p>
                                    </div>
                                    <div class="col-sm-8 col-xsm-7">
                                        <span class="donor-country"></span>
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

@push('page-style')
    <style>
        #detailsModal .details-btn-close {
            box-sizing: content-box;
            width: .8em;
            height: .8em;
            padding: .635rem !important;
            color: #a1acb8;
            background: rgba(0, 0, 0, 0) url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate%28-225.000000, -250.000000%29'%3E%3Cg id='Icon-Color' transform='translate%28225.000000, 250.500000%29'%3E%3Cuse fill='%23a1acb8' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23a1acb8' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E") center/0.8em auto no-repeat;
            border: 0;
            border-radius: .5rem;
            opacity: 1;
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, .4);
            transition: all .23s ease .1s;
            transform: translate(23px, -25px);
            position: relative;
            left: 562px;
            bottom: 4px;
        }

        #detailsModal .details-btn-close:hover {
            transform: translate(20px, -20px);
            opacity: 1;
            outline: none;
        }
    </style>
@endpush

@push('page-script')
    <script>
        (function($) {
            "use strict"

            $('[data-bs-toggle="tooltip"]').each(function(index, element) {
                new bootstrap.Tooltip(element)
            })

            $('.detailsBtn').on('click', function() {
                $('.campaign-name').text($(this).data('campaign'))
                $('.campaign-name').attr('href', $(this).data('campaign_url'))
                $('.donor-full-name').text($(this).data('donor_name'))
                $('.donor-email').text($(this).data('donor_email'))
                $('.donor-phone').text($(this).data('donor_phone'))
                $('.donor-country').text($(this).data('donor_country'))

                $('#detailsModal').modal('show')
            })
        })(jQuery)
    </script>
@endpush
