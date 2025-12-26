@extends('layouts.app')

@section('title', __('custom.page_title'))

@section('meta')
    <meta name="description" content="{{ __('custom.meta_description') }}">
    <meta name="keywords" content="{{ __('custom.meta_keywords') }}">
    <meta property="og:title" content="{{ __('custom.og_title') }}">
    <meta property="og:description" content="{{ __('custom.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-custom">
            <div class="txt">
                <h1>{!! __('custom.hero_title') !!}</h1>
                <p class="desc">{!! __('custom.hero_desc') !!}</p>
            </div>
        </div>
    </div>  
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('custom.main') }}</h2>
    <div class="cards-row">
         @foreach(__('custom.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
