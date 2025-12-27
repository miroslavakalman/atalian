@extends('layouts.app')

@section('title', __('career.page_title'))

@section('meta')
    <meta name="description" content="{{ __('career.meta_description') }}">
    <meta name="keywords" content="{{ __('career.meta_keywords') }}">
    <meta property="og:title" content="{{ __('career.og_title') }}">
    <meta property="og:description" content="{{ __('career.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-career">
            <div class="txt">
                <h1>{!! __('career.hero_title') !!}</h1>
                <p class="desc">{!! __('career.hero_desc') !!}</p>
                <button
                    class="btn-primary"
                    id="scroll-to-vacancies"
                >
                    {!! __('career.hero_button') !!}
                </button>
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

<div class="positions" id="open-vacancies">
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
    </a>
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

        <!-- Honeypot field -->
        <input type="text" name="website" style="display:none" autocomplete="off">

        <input type="text" name="name" placeholder="{{ __('career.form_name') }}" required>
        <input type="email" name="email" placeholder="{{ __('career.form_email') }}" required>

        <div class="file-input-wrapper">
            <input type="file" name="resume" id="resume-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
            <label for="resume-input" class="file-label">
                <span class="file-text">{{ __('career.form_resume') }}</span>
            </label>
            <span id="file-name" class="file-name">
                {{ __('career.form_no_file') }}
            </span>
        </div>

        <textarea name="message" placeholder="{{ __('career.form_message') }}"></textarea>

        <!-- ЧЕКБОКСЫ СОГЛАСИЙ -->
        <div class="consent-checkboxes">
            <!-- Согласие на обработку персональных данных (обязательное) -->
            <div class="checkbox-group">
                <input type="checkbox" id="consent-pd" name="consent_pd" required>
                <label for="consent-pd">
                    {!! __('career.consent_pd', [
                        'link' => route('policy', app()->getLocale())
                    ]) !!}
                </label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="consent-marketing" name="consent_marketing">
                <label for="consent-marketing">
                    {{ __('career.consent_marketing') }}
                </label>
            </div>

            <p class="age-notice">
                {{ __('career.age_notice') }}
            </p>
        </div>

        <button type="submit" class="btn-primary" id="submit-btn" disabled>
            {{ __('career.form_submit') }}
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const consentPd = document.getElementById('consent-pd');
    const submitBtn = document.getElementById('submit-btn');
    const form = document.querySelector('.no-vacancy-form form');
    
    consentPd.addEventListener('change', function() {
        submitBtn.disabled = !this.checked;
    });
    
    form.addEventListener('submit', function(e) {
        if (!consentPd.checked) {
            e.preventDefault();
            alert('Необходимо согласие на обработку персональных данных');
            consentPd.focus();
            return false;
        }
    });
    
    const resumeInput = document.getElementById('resume-input');
    const fileNameSpan = document.getElementById('file-name');
    
    if (resumeInput && fileNameSpan) {
        resumeInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameSpan.textContent = this.files[0].name;
                fileNameSpan.style.color = '#333';
            } else {
                fileNameSpan.textContent = '{{ __('career.form_no_file') }}';
                fileNameSpan.style.color = '#666';
            }
        });
    }
});
</script>
@endsection
