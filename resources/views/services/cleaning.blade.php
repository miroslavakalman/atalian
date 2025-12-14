@extends('layouts.app')

@section('title', 'Уборка')

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-cleaning">
            <div class="txt">
                <h1>{!! __('cleaning.hero_title') !!}</h1>
                <p class="desc">{!! __('cleaning.hero_desc') !!}</p>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('cleaning.main') }}</h2>
    <div class="cards-row">
         @foreach(__('cleaning.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
