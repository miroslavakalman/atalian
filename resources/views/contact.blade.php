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
        
        <form class="contact-form" style="max-width: 600px; margin: 0 auto;">
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.subject') }} *</label>
                <select class="form-select" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Inter'; font-size: 16px;">
                    <option value="">{{ __('messages.choose_subject') }}</option>
                    <option value="general">{{ __('messages.general_question') }}</option>
                    <option value="services">{{ __('messages.services_info') }}</option>
                    <option value="partnership">{{ __('messages.partnership') }}</option>
                    <option value="career">{{ __('messages.career_question') }}</option>
                    <option value="other">{{ __('messages.other') }}</option>
                </select>
            </div>

            <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.name') }} *</label>
                    <input type="text" class="form-input" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Inter'; font-size: 16px;">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.phone') }}</label>
                    <input type="tel" class="form-input" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Inter'; font-size: 16px;">
                </div>
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.email') }} *</label>
                <input type="email" class="form-input" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Inter'; font-size: 16px;">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.company') }}</label>
                <input type="text" class="form-input" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Inter'; font-size: 16px;">
            </div>
            
            <div class="form-group" style="margin-bottom: 30px;">
                <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 500; color: #3f3e3e;">{{ __('messages.message') }} *</label>
                <textarea class="form-textarea" required rows="5" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; resize: vertical; font-family: 'Inter'; font-size: 16px;"></textarea>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%; background: var(--coop-orange-accent); border: none; border-radius: 10px; padding: 15px; font-family: 'FindSansPro'; font-size: 18px; color: white; cursor: pointer; transition: background 0.3s ease;">
                {{ __('messages.send_message') }}
            </button>
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