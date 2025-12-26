@extends('layouts.app')

@section('title', __('cleaning.page_title'))

@section('meta')
    <meta name="description" content="{{ __('cleaning.meta_description') }}">
    <meta name="keywords" content="{{ __('cleaning.meta_keywords') }}">
    <meta property="og:title" content="{{ __('cleaning.og_title') }}">
    <meta property="og:description" content="{{ __('cleaning.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

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
