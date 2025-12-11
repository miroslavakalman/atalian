@extends('layouts.app')

@section('title', 'Ошибка')

@section('content')
<div class="error-404">
        <h1>{!! __('error.500_title') !!}</h1>
        <p class="desc">{!! __('error.500_desc') !!}</p>
        <button class="btn-white">{!! __('error.500_button') !!}</button>
</div>
@endsection