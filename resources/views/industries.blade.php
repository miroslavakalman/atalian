@extends('layouts.app')

@section('title', __('industries.page_title'))

@section('content')
<div class="slider">
 <div class="slides-container">
        <div class="slide-industries">
            <div class="txt">
                <h1>{{ __('industries.header') }}</h1>
                <p class="desc">{{ __('industries.subheader') }}</p>
                <button class="btn-primary">{{ __('industries.presentation_btn') }} ↗</button>
            </div>
        </div>
</div>
</div>

<div class="industries-page">

    @foreach (config('industries') as $i => $industry)
        <section class="industry-block {{ $i % 2 === 1 ? 'reverse' : '' }}">

            <div class="industry-image">
                <img src="{{ asset($industry['img']) }}" alt="{{ __('industries.' . $industry['key'] . '.title') }}">
            </div>

            <div class="industry-text">
                <h2>{{ __('industries.' . $industry['key'] . '.title') }}</h2>
                <p>{{ __('industries.' . $industry['key'] . '.desc') }}</p>
            </div>

        </section>
    @endforeach

</div>

@endsection
