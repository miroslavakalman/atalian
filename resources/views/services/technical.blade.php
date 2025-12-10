@extends('layouts.app')

@section('title', 'Техническое обслуживание')

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-technical">
            <div class="txt">
                <h1>{!! __('technical.hero_title') !!}</h1>
                <p class="desc">{!! __('technical.hero_desc') !!}</p>
                <button class="btn-primary">{!! __('technical.hero_button') !!}</button>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('technical.main') }}</h2>
    <div class="cards-row">
         @foreach(__('technical.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
