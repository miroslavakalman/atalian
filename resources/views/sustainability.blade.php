@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="../css/pages/_sustainability.css">
@endsection

@section('content')
@section('body-class', 'sust-page-active')

<div class="sust-page">

    {{-- HERO --}}
    <section class="sust-hero">
        <div class="sust-wide">
            <div class="container">

                <h1 class="sust-title">
                    {!! __('sust.hero_title') !!}
                </h1>

                <div class="sust-img-grid">
                    <img src="/img/sustainability/part-1.png" alt="" class="img-1">
                    <img src="/img/sustainability/part-2.png" alt="">
                    <img src="/img/sustainability/part-3.png" alt="" class="img-3">
                    <img src="/img/sustainability/part-4.png" alt="">
                </div>

                <div class="sust-row">
                    <div class="sust-col">
                        <h3>{{ __('sust.ecology_title') }}</h3>
                        <p>{{ __('sust.ecology_text') }}</p>
                    </div>

                    <div class="sust-col">
                        <h3>{{ __('sust.employees_title') }}</h3>
                        <p>{{ __('sust.employees_text') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- LIGHT SECTION --}}
    <section class="sust-light">
        <div class="container sust-two-col">

            <div class="sust-light-img">
                <img src="/img/sustainability/sust-big.png" alt="">
            </div>

            <div class="sust-light-text">

                <div class="sust-item">
                    <span>{{ __('sust.item_01_title') }}</span>
                    <p>{{ __('sust.item_01_text') }}</p>
                </div>

                <div class="sust-item">
                    <span>{{ __('sust.item_02_title') }}</span>
                    <p>{{ __('sust.item_02_text') }}</p>
                </div>

                <div class="sust-item">
                    <span>{{ __('sust.item_03_title') }}</span>
                    <p>{{ __('sust.item_03_text') }}</p>
                </div>

                <div class="sust-item">
                    <span>{{ __('sust.item_04_title') }}</span>
                    <p>{{ __('sust.item_04_text') }}</p>
                </div>

                <div class="sust-item">
                    <span>{{ __('sust.item_05_title') }}</span>
                    <p>{{ __('sust.item_05_text') }}</p>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
