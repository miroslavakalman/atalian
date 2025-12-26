@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ __('sust.meta_description') }}">
    <meta name="keywords" content="{{ __('sust.meta_keywords') }}">
    <meta property="og:title" content="{{ __('sust.og_title') }}">
    <meta property="og:description" content="{{ __('sust.og_description') }}">
    <meta property="og:image" content="{{ asset('img/sustainability/og-image.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

@endsection

@section('title', __('sust.page_title'))

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages/_sustainability.css') }}">
@endsection

@section('content')
@section('body-class', 'sust-page-active')

<div class="sust-page">

    <section class="sust-hero" aria-labelledby="sustainability-hero-title">
        <div class="sust-wide">
            <div class="container">

                <h1 class="sust-title" id="sustainability-hero-title">
                    {!! __('sust.hero_title') !!}
                </h1>

                <div class="sust-img-grid" role="img" aria-label="{{ __('sust.hero_grid_alt') }}">
                    <img src="/img/sustainability/part-1.png" 
                         alt="{{ __('sust.img_part1_alt') }}" 
                         class="img-1"
                         loading="lazy">
                    <img src="/img/sustainability/part-2.png" 
                         alt="{{ __('sust.img_part2_alt') }}" 
                         class="img-2"
                         loading="lazy">
                    <img src="/img/sustainability/part-3.png" 
                         alt="{{ __('sust.img_part3_alt') }}" 
                         class="img-3"
                         loading="lazy">
                    <img src="/img/sustainability/part-4.png" 
                         alt="{{ __('sust.img_part4_alt') }}"
                         class="img-4"
                         loading="lazy">
                </div>

                <div class="sust-row">
                    <div class="sust-col" role="article" aria-labelledby="ecology-title">
                        <h3 id="ecology-title">{{ __('sust.ecology_title') }}</h3>
                        <p>{{ __('sust.ecology_text') }}</p>
                    </div>

                    <div class="sust-col" role="article" aria-labelledby="employees-title">
                        <h3 id="employees-title">{{ __('sust.employees_title') }}</h3>
                        <p>{{ __('sust.employees_text') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="sust-light" aria-label="{{ __('sust.section_light_aria') }}">
        <div class="container sust-two-col">

            <div class="sust-light-img">
                <img src="/img/sustainability/sust-big.png" 
                     alt="{{ __('sust.main_image_alt') }}"
                     loading="lazy">
            </div>

            <div class="sust-light-text" role="list">
                
                <div class="sust-item" role="listitem">
                    <span>{{ __('sust.item_01_title') }}</span>
                    <p>{{ __('sust.item_01_text') }}</p>
                </div>

                <div class="sust-item" role="listitem">
                    <span>{{ __('sust.item_02_title') }}</span>
                    <p>{{ __('sust.item_02_text') }}</p>
                </div>

                <div class="sust-item" role="listitem">
                    <span>{{ __('sust.item_03_title') }}</span>
                    <p>{{ __('sust.item_03_text') }}</p>
                </div>

                <div class="sust-item" role="listitem">
                    <span>{{ __('sust.item_04_title') }}</span>
                    <p>{{ __('sust.item_04_text') }}</p>
                </div>

                <div class="sust-item" role="listitem">
                    <span>{{ __('sust.item_05_title') }}</span>
                    <p>{{ __('sust.item_05_text') }}</p>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection