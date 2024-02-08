<div class="campaign-card">
    <div class="campaign-card__img">
        <a href="{{ route('campaign.show', $campaign->slug) }}">
            <img src="{{ getImage(getFilePath('campaign') . '/' . @$campaign->image, getThumbSize('campaign')) }}" alt="image">
        </a>
    </div>
    <div class="campaign-card__txt">
        <h3 class="campaign-card__title">
            <a href="{{ route('campaign.show', $campaign->slug) }}">
                {{ __(strLimit(@$campaign->name, 25)) }}
            </a>
        </h3>
        <div class="campaign__countdown" data-target-date="{{ showDateTime(@$campaign->end_date, 'Y-m-d\TH:i:s') }}"></div>

        @php
            $percentage = donationPercentage($campaign->goal_amount, $campaign->raised_amount);
        @endphp

        <div class="progress custom--progress" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{ $percentage }}%"><span class="progress-txt">{{ $percentage . '%' }}</span></div>
        </div>
        <div class="campaign-card__bottom">
            <ul class="campaign-card__list">
                <li>
                    <span><i class="fa-solid fa-hand-holding-dollar"></i> @lang('Goal'):</span> {{ $setting->cur_sym . showAmount(@$campaign->goal_amount) }}
                </li>
                <li>
                    <span><i class="fa-solid fa-sack-dollar"></i> @lang('Raised'):</span> {{ $setting->cur_sym . showAmount(@$campaign->raised_amount) }}
                </li>
            </ul>
            <a href="{{ route('campaign.show', $campaign->slug) }}" class="btn btn--sm btn--base">
                @lang('Make A Donation')
            </a>
        </div>
    </div>
</div>
