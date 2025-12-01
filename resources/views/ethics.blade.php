@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="../css/pages/_ethics.css">
@endsection

@section('content')
@section('body-class', 'ethics-page-active')

<div class="ethics-page">

    <div class="slider">
        <div class="slides-container">
            <div class="slide-ethics">
                <div class="txt">
                    <h1>{!! __('ethics.hero_title') !!}</h1>
                    <p class="desc">{!! nl2br(__('ethics.hero_secondary')) !!}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <section class="ethics-content">
        <div class="ethics-wrapper">
            <div class="advantages">
                <h2 class="black">{!! __('ethics.wrapper_title') !!}</h2>
                <p class="secondary-p-black">{!! nl2br(__('ethics.wrapper_desc')) !!}</p>
                <div class="adv-row">
                    @foreach(__('ethics.cards') as $adv)
                        <div class="advantage">
                            <img src="/img/ellipse-{{ $loop->iteration }}.png" alt="0{{ $loop->iteration }}" class="ellipse">
                            <h4>{!! $adv['title'] !!}</h4>
                            <p class="small">{!! nl2br($adv['desc']) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="program">
        <div class="txt-column">
            <h2 class="black">{!! __('ethics.program_title') !!}</h2>
            <p class="secondary-p-black">{!! nl2br(__('ethics.program_desc')) !!}</p>
        </div>
        <div class="pdfs">
            <img src="/img/ethics/pdf-1.png" alt="">
            <img src="/img/ethics/pdf-2.png" alt="">
        </div>
    </div>

    <div class="compliance">
        <div class="compliance-column">
            <h2 class="black">{!! __('messages.compliance.title') !!}</h2>
            <p class="secondary-p-black">{!! nl2br(__('messages.compliance.desc1')) !!}</p>
            <p class="secondary-p-black">{!! nl2br(__('messages.compliance.desc2')) !!}</p>
            <a href="mailto:larissa.silkina@atalianworld.com" class="btn-primary">{!! __('messages.compliance.btn') !!}</a>
            <p class="disclaimer-black">{!! nl2br(__('messages.compliance.notice')) !!}</p>
        </div>
        <img src="/img/compliance.png" alt="" class="compliance-img">
    </div>

</div>
@endsection
