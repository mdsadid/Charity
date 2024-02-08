<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
    <h3 class="post-sidebar__card__header">@lang('Time Left')</h3>
    <div class="post-sidebar__card__body">
        <div class="campaign__countdown" data-target-date="{{ showDateTime(@$campaign->end_date, 'Y-m-d\TH:i:s') }}"></div>

        @php
            $percentage = donationPercentage($campaign->goal_amount, $campaign->raised_amount);
        @endphp

        <div class="progress custom--progress my-4" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{ $percentage }}%"><span class="progress-txt">{{ $percentage . '%' }}</span></div>
        </div>
        <ul class="campaign-status">
            <li><span><i class="fa-solid fa-hand-holding-dollar"></i> @lang('Goal'):</span> {{ $setting->cur_sym . showAmount(@$campaign->goal_amount) }}</li>
            <li><span><i class="fa-solid fa-sack-dollar"></i> @lang('Raised'):</span> {{ $setting->cur_sym . showAmount(@$campaign->raised_amount) }}</li>
        </ul>
    </div>
</div>
