@extends('layouts.app')

@section('title', __('messages.contact', [], app()->getLocale()))

@section('content')
<div class="slider">
    <div class="slides-container">
        <div class="slide-contact">
            <div class="txt">
                <h1>{{ __('messages.contact_title') }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Форма для вопросов -->
<div class="contact-form-section" style="background: #f6f6f6; padding: 80px var(--content-padding); margin-top: 0px !important">
    <div class="container">
        <h2 class="black" style="text-align: center; margin-bottom: 1em;">{{ __('messages.contact_us') }}</h2>
        <p class="secondary-p-black" style="text-align: center; max-width: 600px; margin: 0 auto 3em;">{{ __('messages.contact_us_desc') }}</p>
        
<form class="contact-form" method="POST" action="{{ route('contact.submit', app()->getLocale()) }}" style="max-width: 600px; margin: 0 auto;" enctype="multipart/form-data">
    @csrf

    <!-- Honeypot -->
    <input type="text" name="website" style="display:none" autocomplete="off">

    <div class="form-group" style="margin-bottom: 20px;">
        <label class="form-label">{{ __('messages.subject') }} *</label>
        <select name="subject" class="form-select" required>
            <option value="">{{ __('messages.choose_subject') }}</option>
            <option value="general">{{ __('messages.general_question') }}</option>
            <option value="services">{{ __('messages.services_info') }}</option>
            <option value="partnership">{{ __('messages.partnership') }}</option>
            <option value="career">{{ __('messages.career_question') }}</option>
            <option value="other">{{ __('messages.other') }}</option>
        </select>
    </div>

    <input type="text" name="name" required placeholder="{{ __('messages.name') }}">
    <input type="tel" name="phone" placeholder="{{ __('messages.phone') }}">
    <input type="email" name="email" required placeholder="{{ __('messages.email') }}">
    <input type="text" name="company" placeholder="{{ __('messages.company') }}">
    <textarea name="message" required placeholder="{{ __('messages.message') }}"></textarea>

    <button type="submit" class="btn-primary">{{ __('messages.send_message') }}</button>
</form>

    </div>
</div>
    <h2 class="black">{{ __('messages.addresses') }}</h2>
    <div class="row">
        <div class="row-1">
            <p class="secondary-p-black">{{ __('messages.moscow_address') }}</p>
            <!-- Интерактивная карта Москвы -->
            <div id="map-moscow" style="width: 428px; height: 252px; border-radius: 10px;"></div>
        </div>
        
        <!-- Горизонтальная линия между адресами -->
        <div class="vertical-divider"></div>
        
        <div class="row-1">
            <p class="secondary-p-black">{{ __('messages.spb_address') }}</p>
            <!-- Интерактивная карта СПб -->
            <div id="map-spb" style="width: 428px; height: 252px; border-radius: 10px;"></div>
        </div>
    </div>

    <h2 class="black" style="margin-top: 2em;">{{ __('messages.contacts') }}</h2>
    <div class="row" style="margin-bottom: 2em;">
        <div class="row-1">
            <p class="secondary-p-black">+7 (495) 411 56 45</p>
            <p class="secondary-p-black">+7 (495) 411 56 43</p>
            <p class="secondary-p-black">+7 (812) 384 49 81</p>
        </div>
        
        <!-- Горизонтальная линия между контактами -->
        <div class="vertical-divider"></div>
        
        <div class="row-1">
            <a href="mailto:info@atalian.ru" class="orange-link">
                <h2 class="orange">info@atalian.ru</h2>
            </a>
        </div>
    </div>
</div>



<!-- Подключение API Яндекс Карт -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=960f1898-64ae-4883-b052-f9b6e7e999af&lang=ru_RU" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Карта Москвы
        ymaps.ready(function () {
            var mapMoscow = new ymaps.Map('map-moscow', {
                center: [55.77640375130164,37.5740400598111],
                zoom: 16
            });
            
            var placemarkMoscow = new ymaps.Placemark([55.77640375130164,37.5740400598111], {
                hintContent: '{{ __('messages.moscow_hint') }}',
                balloonContent: '{{ __('messages.moscow_balloon') }}'
            });
            
            mapMoscow.geoObjects.add(placemarkMoscow);
        });

        // Карта СПб
        ymaps.ready(function () {
            var mapSpb = new ymaps.Map('map-spb', {
                center: [59.849966,30.30295],
                zoom: 16
            });
            
            var placemarkSpb = new ymaps.Placemark([59.849966,30.30295], {
                hintContent: '{{ __('messages.spb_hint') }}',
                balloonContent: '{{ __('messages.spb_balloon') }}'
            });
            
            mapSpb.geoObjects.add(placemarkSpb);
        });
    });
</script>

@endsection