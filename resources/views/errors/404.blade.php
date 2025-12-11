@extends('layouts.app')

@section('title', 'Ошибка')

@section('content')
<div class="error-404">
        <h1>{!! __('error.404_title') !!}</h1>
        <p class="desc">{!! __('error.404_desc') !!}</p>
        <button class="btn-white">{!! __('error.404_button') !!}</button>
</div>
@endsection