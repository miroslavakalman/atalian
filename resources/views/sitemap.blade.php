@extends('layouts.app')

@section('title', __('sitemap.page_title'))

@section('meta')
    <meta name="description" content="{{ __('sitemap.meta_description') }}">
    <meta name="keywords" content="{{ __('sitemap.meta_keywords') }}">
    <meta property="og:title" content="{{ __('sitemap.og_title') }}">
    <meta property="og:description" content="{{ __('sitemap.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="container sitemap-page">
    <h1>{{ __('sitemap.title') }}</h1>
    <p class="sitemap-description">{{ __('sitemap.description') }}</p>
    
    <div class="sitemap-content">
        <!-- Main Pages -->
        <section class="sitemap-section">
            <h2>{{ __('sitemap.main_pages') }}</h2>
            <ul class="sitemap-list">
                <li><a href="{{ url(app()->getLocale() . '/') }}">{{ __('sitemap.home') }}</a></li>
                <li><a href="{{ route('about', app()->getLocale()) }}">{{ __('sitemap.about') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/contact') }}">{{ __('sitemap.contact') }}</a></li>
                <li><a href="{{ route('career', app()->getLocale()) }}">{{ __('sitemap.career') }}</a></li>
            </ul>
        </section>
        
        <!-- Services -->
        <section class="sitemap-section">
            <h2>{{ __('sitemap.services') }}</h2>
            <ul class="sitemap-list">
                <li><a href="{{ route('services.index', app()->getLocale()) }}">{{ __('sitemap.all_services') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/cleaning') }}">{{ __('sitemap.cleaning') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/technical') }}">{{ __('sitemap.technical') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/facility') }}">{{ __('sitemap.facility') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/logistics') }}">{{ __('sitemap.logistics') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/administrative') }}">{{ __('sitemap.administrative') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/services/custom') }}">{{ __('sitemap.custom') }}</a></li>
            </ul>
        </section>
        
        <!-- Industries -->
        <section class="sitemap-section">
            <h2>{{ __('sitemap.industries') }}</h2>
            <ul class="sitemap-list">
                <li><a href="{{ url(app()->getLocale() . '/industries') }}">{{ __('sitemap.industries_page') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#offices') }}">{{ __('sitemap.offices') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#industrial') }}">{{ __('sitemap.industrial') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#retail_service') }}">{{ __('sitemap.retail_service') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#public') }}">{{ __('sitemap.public') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#transport') }}">{{ __('sitemap.transport') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#healthcare') }}">{{ __('sitemap.healthcare') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/industries/#premium_housing') }}">{{ __('sitemap.premium_housing') }}</a></li>
            </ul>
        </section>
        
        <!-- Company Information -->
        <section class="sitemap-section">
            <h2>{{ __('sitemap.company_info') }}</h2>
            <ul class="sitemap-list">
                <li><a href="{{ route('ethics', app()->getLocale()) }}">{{ __('sitemap.ethics') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/sustainability') }}">{{ __('sitemap.sustainability') }}</a></li>
            </ul>
        </section>
        
        <!-- Legal Documents -->
        <section class="sitemap-section">
            <h2>{{ __('sitemap.legal') }}</h2>
            <ul class="sitemap-list">
                <li><a href="{{ route('cookies', app()->getLocale()) }}">{{ __('sitemap.cookies') }}</a></li>
                <li><a href="{{ route('policy', app()->getLocale()) }}">{{ __('sitemap.privacy_policy') }}</a></li>
            </ul>
        </section>
    </div>
</div>
@endsection

