        @extends('layouts.app')

        @section('title', __('about.page_title'))

        @section('meta')
            <meta name="description" content="{{ __('about.meta_description') }}">
            <meta name="keywords" content="{{ __('about.meta_keywords') }}">
            <meta property="og:title" content="{{ __('about.og_title') }}">
            <meta property="og:description" content="{{ __('about.og_description') }}">
            <meta property="og:type" content="website">
            <meta property="og:url" content="{{ url()->current() }}">
        @endsection

        @section('content')
        <div class="slider">
            <div class="slides-container">
                <div class="slide-about">
                    <div class="txt">
                        <h1>{!! __('about.hero_title') !!}</h1>
                        <p class="desc">{!! __('about.hero_desc') !!}</p>
                <button
                    class="btn-primary"
                    onclick="window.open('https://cloud.mail.ru/public/doks/oxZ5kWAdx', '_blank')"
                >
                    {{ __('industries.presentation_btn') }} ↗
                </button>
                </div>
                </div>
            </div>
        </div>
        <div class="about-company">
            <div>
                <h2 class="black">{!! __('about.block-1-title') !!}</h2>
                <p class="secondary-p-black">{!! __('about.block-1-desc') !!}</p>
            </div>
            <img src="/img/about/card-1.webp" alt="{{ __('about.img_card1_alt') }}">
        </div>
        <div class="stats" id="stats-rus">
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

        <div class="mission">
            <h2 class="black">{{ __('about.mission_title')}}</h2>

            <div class="mission-row row">
                <h3>{!! __('about.mission_row_title') !!}</h3>
                <p class="secondary-p-black">{!! __('about.mission_row') !!}</p>
            </div>

            <div class="values-row row">
                <h3>{!! __('about.values_title') !!}</h3>
                <div class="values-column">
                    <div class="column">
                        <p class="orange-secondary">{!! __('about.values_card_1') !!}</p>
                        <p class="orange-secondary">{!! __('about.values_card_2') !!}</p>
                    </div>
                    <div class="column">
                        <p class="orange-secondary">{!! __('about.values_card_3') !!}</p>
                        <p class="orange-secondary">{!! __('about.values_card_4') !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="licenses">
            <h2 class="black">{!! __('about.license_title') !!}</h2>
            <div class="pdf-row">
                <iframe src="/docs/Сертификат ISO 9001-2015.pdf" frameborder="0"></iframe>
                <iframe src="/docs/Выписка из реестра МЧС.pdf" frameborder="0"></iframe>
                <iframe src="/docs/Лицензия МЧС №8-Б 01369.pdf" frameborder="0"></iframe>
            </div>
        </div>
        @endsection