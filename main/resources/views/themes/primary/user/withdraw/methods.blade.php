@extends($activeTheme. 'layouts.auth')
@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Withdraw')</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">@lang('Method')</label>
                                <select class="form-select form--control" name="method_id" required>
                                    <option value="">@lang('Select Gateway')</option>
                                    @foreach($methods as $data)
                                        <option value="{{ $data->id }}" data-resource="{{$data}}">  {{__($data->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Amount')</label>
                                <div class="input-group">
                                    <input type="number" step="any" name="amount" value="{{ old('amount') }}" class="form-control form--control" required>
                                    <span class="input-group-text">{{ __($setting->site_cur) }}</span>
                                </div>
                            </div>
                            <div class="mt-3 preview-details d-none">
                                <ul class="list-group text-center">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Limit')</span>
                                        <span><span class="min fw-bold">0</span> {{ __($setting->site_cur) }} - <span class="max fw-bold">0</span> {{ __($setting->site_cur) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Charge')</span>
                                        <span><span class="charge fw-bold">0</span> {{ __($setting->site_cur) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Receivable')</span> <span><span class="receivable fw-bold"> 0</span> {{ __($setting->site_cur) }} </span>
                                    </li>
                                    <li class="list-group-item d-none justify-content-between rate-element">

                                    </li>
                                    <li class="list-group-item d-none justify-content-between in-site-cur">
                                        <span>@lang('In') <span class="base-currency"></span></span>
                                        <strong class="finalAmount">0</strong>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn--base w-100 mt-3">@lang('Submit')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-script')
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $('[name=method_id]').change(function() {
                if(!$('[name=method_id]').val()){
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                
                let resource       = $('[name=method_id] option:selected').data('resource');
                let fixed_charge   = parseFloat(resource.fixed_charge);
                let percent_charge = parseFloat(resource.percent_charge);
                let rate           = parseFloat(resource.rate)
                let toFixedDigit   = 2;

                $('.min').text(parseFloat(resource.min_amount).toFixed(toFixedDigit));
                $('.max').text(parseFloat(resource.max_amount).toFixed(toFixedDigit));

                let amount = parseFloat($('[name=amount]').val());

                if (!amount) {
                    amount = 0;
                }

                if(amount <= 0){
                    $('.preview-details').addClass('d-none');
                    return false;
                }

                $('.preview-details').removeClass('d-none');

                let charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(toFixedDigit);

                $('.charge').text(charge);

                if (resource.currency != '{{ $setting->site_cur }}') {
                    let rateElement = `<span>@lang('Conversion Rate')</span> <span class="fw-bold">1 {{ __($setting->site_cur) }} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;

                    $('.rate-element').html(rateElement);
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }

                let receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(toFixedDigit);

                $('.receivable').text(receivable);

                let finalAmount = parseFloat(parseFloat(receivable)*rate).toFixed(toFixedDigit);
                
                $('.finalAmount').text(finalAmount);
                $('.base-currency').text(resource.currency);
            });

            $('[name=amount]').on('input',function(){
                let data = $('[name=method_id]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(toFixedDigit));
            });
        })(jQuery);
    </script>
@endpush
