@extends('layouts.app')

@section('title', __('industries.page_title'))

@section('meta')
    <meta name="description" content="{{ __('industries.meta_description') }}">
    <meta name="keywords" content="{{ __('industries.meta_keywords') }}">
    <meta property="og:title" content="{{ __('industries.og_title') }}">
    <meta property="og:description" content="{{ __('industries.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="slider">
 <div class="slides-container">
        <div class="slide-industries">
            <div class="txt">
                <h1>{{ __('industries.header') }}</h1>
                <p class="desc">{{ __('industries.subheader') }}</p>
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

<div class="industries-page">

    @foreach (config('industries') as $i => $industry)

        @php
            $id = $industry['key']; 
        @endphp

        <section id="{{ $id }}" class="industry-block {{ $i >= 3 ? 'hidden-mobile' : '' }} {{ $i % 2 === 1 ? 'reverse' : '' }}">
            <div class="industry-image">
                <img src="{{ asset($industry['img']) }}" alt="{{ __('industries.' . $id . '.title') }}">
            </div>

            <div class="industry-text">
                <h2>{{ __('industries.' . $id . '.title') }}</h2>
                <p>{{ __('industries.' . $id . '.desc') }}</p>
            </div>
        </section>
    @endforeach

    <button id="showMore" class="btn-primary">{{ __('industries.showmore') }}</button>
</div>

@endsection
