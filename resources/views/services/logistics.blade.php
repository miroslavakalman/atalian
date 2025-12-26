@extends('layouts.app')

@section('title', __('logistics.page_title'))

@section('meta')
    <meta name="description" content="{{ __('logistics.meta_description') }}">
    <meta name="keywords" content="{{ __('logistics.meta_keywords') }}">
    <meta property="og:title" content="{{ __('logistics.og_title') }}">
    <meta property="og:description" content="{{ __('logistics.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-logistics">
            <div class="txt">
                <h1>{!! __('logistics.hero_title') !!}</h1>
                <p class="desc">{!! __('logistics.hero_desc') !!}</p>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('logistics.main') }}</h2>
    <div class="cards-row">
         @foreach(__('logistics.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
