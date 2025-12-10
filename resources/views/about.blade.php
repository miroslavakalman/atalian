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
        <div class="stats-row">
            @foreach(__('about.stats') as $stat)
                <div class="stat">
                    <h3 data-target="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</h3>
                    <p class="secondary-p">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="stats-row">
            @foreach(__('about.stats-2') as $stat)
                <div class="stat">
                    <h3 data-target="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</h3>
                    <p class="secondary-p">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection