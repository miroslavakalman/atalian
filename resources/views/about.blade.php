@extends('layouts.app')

@section('title', 'О компании')

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-about">
            <div class="txt">
                <h1>{!! __('about.hero_title') !!}</h1>
                <p class="desc">{!! __('about.hero_desc') !!}</p>
                <button class="btn-primary">{!! __('about.hero_button') !!}</button>
            </div>
        </div>
    </div>
</div>
<div class="about-company">
    <div>
        <h2 class="black">{!! __('about.block-1-title') !!}</h2>
        <p class="secondary-p-black">{!! __('about.block-1-desc') !!}</p>
    </div>
    <img src="/img/about/card-1.png" alt="">
</div>
<div class="stats" id="stats-rus">
    <img src="/img/about/card-2.png" alt="">
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
<div class="mission" style="padding: 0 120px;">
    <h2 class="black">{{ __('about.mission_title')}}</h2>

    <div class="mission-row row">
        <h3>{!! __('about.mission_row_title') !!}</h3>
        <p class="secondary-p-black">{!! __('about.mission_row') !!}</p>
    </div>

    <div class="values-row row">
        <h3>{!! __('about.values_title') !!}</h3>
        <div class="values-column" style="display: flex; gap: 50px; justify-content: space-between;">
            <div class="column">
                <p class="orange-secondary">{!! __('about.values_card_1') !!}</p>
                <p class="secondary-p-black">{!! __('about.values_card_1_desc') !!}</p>
            </div>
            <div class="column">
                <p class="orange-secondary">{!! __('about.values_card_2') !!}</p>
                <p class="secondary-p-black">{!! __('about.values_card_2_desc') !!}</p>
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