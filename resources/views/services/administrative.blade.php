@extends('layouts.app')

@section('title', 'Управление поставками')

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-admin">
            <div class="txt">
                <h1>{!! __('admin.hero_title') !!}</h1>
                <p class="desc">{!! __('admin.hero_desc') !!}</p>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2">{{ __('admin.main') }}</h2>
    <div class="cards-row">
         @foreach(__('admin.cards') as $card)
                <div class="career-card">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                    <h3>{{ $card['title'] }}</h3>
                    <p>{{ $card['desc'] }}</p>
                </div>
            @endforeach
@endsection
    </div>
</div>
