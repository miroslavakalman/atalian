@extends('layouts.app')

@section('title', __('messages.cookie_policy'))

@section('content')
<div class="cookie-page">
    <h1>{{ __('messages.cookie_policy') }}</h1>

    <p>Мы используем cookies для улучшения работы сайта, аналитики и персонализации контента. Вы можете управлять настройками cookie в любое время.</p>

    <h2>Типы используемых cookie</h2>
    <ul>
        <li>Функциональные: обеспечивают корректную работу сайта.</li>
        <li>Аналитические: помогают понимать, как пользователи используют сайт.</li>
        <li>Сторонние: используются для интеграции с сервисами (например, Яндекс.Метрика).</li>
    </ul>

    <h2>Управление cookie</h2>
    <p>Вы можете отключить cookie через настройки браузера или в баннере согласия.</p>

    <a href="{{ asset('docs/cookie-policy.pdf') }}" target="_blank" download class="btn-primary">
        Скачать PDF
    </a>
</div>
@endsection
