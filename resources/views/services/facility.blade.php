@extends('layouts.app')

@section('title', __('facility.page_title'))

@section('meta')
    <meta name="description" content="{{ __('facility.meta_description') }}">
    <meta name="keywords" content="{{ __('facility.meta_keywords') }}">
    <meta property="og:title" content="{{ __('facility.og_title') }}">
    <meta property="og:description" content="{{ __('facility.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-facility">
            <div class="txt">
                <h1>{!! __('facility.hero_title') !!}</h1>
                <p class="desc">{!! __('facility.hero_desc') !!}</p>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('facility.main') }}</h2>
    <div class="cards-row">
         @foreach(__('facility.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
