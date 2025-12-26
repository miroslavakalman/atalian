@extends('layouts.app')

@section('title', __('messages.home_title'))

@section('meta')
    <meta name="description" content="{{ __('messages.home_meta_description') }}">
    <meta name="keywords" content="{{ __('messages.home_meta_keywords') }}">
    <meta property="og:title" content="{{ __('messages.home_og_title') }}">
    <meta property="og:description" content="{{ __('messages.home_og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
    @include('components.slider')
    @include('components.stats')
    @include('components.advantages')
    @include('components.services')
    @include('components.partners')
    @include('components.compliance')   
@endsection
