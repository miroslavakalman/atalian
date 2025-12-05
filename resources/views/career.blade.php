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
        <button class="vac-arrow" id="vac-prev">
            <img src="/img/career/arrow-left.png" alt="→">
        </button>

            <div class="vac-slider" id="vac-slider">
                @foreach($vacancies as $index => $v)
    <div class="vac-card {{ $index >= 3 ? 'vac-hidden-mobile' : '' }}">
        <h3>{{ $v['name'] }}</h3>
        <p class="city">{{ $v['city'] }}</p>

        @if($v['salary'])
            <p class="salary">от {{ number_format($v['salary'], 0, ',', ' ') }} ₽</p>
        @else
            <p class="salary empty">Зарплата не указана</p>
        @endif

        @php
            $responsibility = strip_tags($v['responsibility'] ?? '');
        @endphp

        @if($responsibility)
            <p class="vacancy-resp">
                {{ \Illuminate\Support\Str::limit($responsibility, 120, '…') }}
            </p>
        @endif

        <div class="vac-actions">
            <button class="btn-respond">{!! __('career.button_main') !!}</button>
            <a href="{{ $v['url'] }}" target="_blank" class="vac-more">{!! __('career.read_more') !!}</a>
        </div>
    </div>
@endforeach

            </div>
<button id="show-more-btn" class="btn-primary" style="display:none; margin-top:20px;">{!! __('career.button_more') !!}</button>

    <button class="vac-arrow-right" id="vac-next">
            <img src="/img/career/arrow-right.png" alt="→">
        </button>        
    </div>
    @endif
</div>
@if(session('success'))
    <p class="success-msg">{{ session('success') }}</p>
@endif

<div class="no-vacancy-form">
    <h3>{{ __('career.form_not_found_title') }}</h3>
    <p>{{ __('career.form_not_found_desc') }}</p>
    
    <form action="{{ route('career.submit', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="{{ __('career.form_name') }}" required>
        <input type="email" name="email" placeholder="{{ __('career.form_email') }}" required>

        <div class="file-input-wrapper">
            <input type="file" name="resume" id="resume-input" accept=".pdf,.doc,.docx" required>

            <label for="resume-input" class="file-label">
                <span class="file-text">{{ __('career.form_resume') }}</span>
            </label>

            <span id="file-name" class="file-name">
                {{ __('career.form_no_file') }}
            </span>
        </div>

        <textarea name="message" placeholder="{{ __('career.form_message') }}"></textarea>

        <button type="submit" class="btn-primary">
            {{ __('career.form_submit') }}
        </button>
    </form>
</div>



@endsection
