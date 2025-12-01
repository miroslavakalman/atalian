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
<div class="positions">
    <h2>{{ __('career.vacancies_title') }}</h2>

    @if(count($vacancies) === 0)
        <p class="no-vacancies">На данный момент открытых вакансий нет.</p>
    @else
        <div class="vac-slider-wrapper">
            <button class="vac-arrow left" id="vac-prev">‹</button>

            <div class="vac-slider" id="vac-slider">
                @foreach($vacancies as $v)
                    <div class="vac-card">
                        <h3>{{ $v['name'] }}</h3>
                        <p class="city">{{ $v['city'] }}</p>

                        @if($v['salary'])
                            <p class="salary">от {{ number_format($v['salary'], 0, ',', ' ') }} ₽</p>
                        @else
                            <p class="salary empty">Зарплата не указана</p>
                        @endif

                        <a href="{{ $v['url'] }}" target="_blank" class="btn-primary">
                            Подробнее
                        </a>
                    </div>
                @endforeach
            </div>

            <button class="vac-arrow right" id="vac-next">›</button>
        </div>
    @endif
</div>

@endsection
