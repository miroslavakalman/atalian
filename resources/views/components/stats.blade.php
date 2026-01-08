<div class="stats">
    <img src="/img/home/stats-img.webp" alt="{{ __('messages.stats_img_alt') }}" class="main-stat-img">
    <div class="column-txt">
        <p class="disclaimer">{{ __('messages.stats_label') }}</p>
        <h2 class="main-stat-h2">{{ __('messages.stats_title') }}</h2>
        <p class="secondary-p">{{ __('messages.stats_desc') }}</p>
        <div class="stats-row">
            @foreach(__('messages.stats') as $stat)
                <div class="stat">
                    <h3 data-target="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</h3>
                    <p class="secondary-p">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
