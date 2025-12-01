@extends('layouts.app')

@section('title', __('messages.home_title'))

@section('content')
    @include('components.slider')
    @include('components.stats')
    @include('components.advantages')
    @include('components.services')
    @include('components.partners')
    @include('components.compliance')   
@endsection
