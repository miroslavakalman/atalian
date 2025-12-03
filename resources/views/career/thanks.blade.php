@extends('layouts.app')

@section('title', 'Спасибо за отклик')

@section('content')
<div class="thanks-page">
    <div class="container">
        <h1>Спасибо!</h1>
        <p>Ваш отклик успешно отправлен. Мы свяжемся с вами при необходимости.</p>

        <a href="{{ route('career', app()->getLocale()) }}" class="back-btn">
            Вернуться к вакансиям
        </a>
    </div>
</div>
@endsection
