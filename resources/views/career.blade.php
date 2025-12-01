@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-career">
            <div class="txt">
                <h1>{!! __('career.hero_title') !!}</h1>
                <p class="desc">{!! __('career.hero_desc') !!}</p>
                <button class="btn-primary">{!! __('career.hero_button') !!}</button>
            </div>
        </div>
    </div>
</div>

<div class="stats" id="career-wrapper">
    <div class="column-txt">
        <h2>{{ __('career.choice_label') }}</h2>
        <div class="cards-row">
            @foreach(__('career.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
