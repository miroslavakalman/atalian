        <div class="stats" >
            <img src="/img/home/stats-img.webp" alt="{{ __('about.img_card2_alt') }}">
            <div class="column-txt">
                <p class="disclaimer">{{ __('about.stats_label') }}</p>
                <h2>{{ __('about.stats_title') }}</h2>
                <div class="stats-row" id="stats-rus-row">
                    @foreach(__('about.stats') as $stat)
                        <div class="stat">
                            <h3 data-target="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</h3>
                            <p class="secondary-p">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>

                <hr class="stats-separator">

                <div class="stats-row" id="stats-rus-row">
                    @foreach(__('about.stats-2') as $stat)
                        <div class="stat">
                            <h3 data-target="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</h3>
                            <p class="secondary-p">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
        </div>

            </div>
        </div>
