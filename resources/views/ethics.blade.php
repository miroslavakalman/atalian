@extends('layouts.app')

@section('title', __('ethics.page_title'))

@section('meta')
    <meta name="description" content="{{ __('ethics.meta_description') }}">
    <meta name="keywords" content="{{ __('ethics.meta_keywords') }}">
    <meta property="og:title" content="{{ __('ethics.og_title') }}">
    <meta property="og:description" content="{{ __('ethics.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

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
            <a
                href="/docs/Политика информирования о нарушениях.pdf"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img src="/img/ethics/pdf-1.png" alt="{{ __('ethics.pdf1_alt') }}">
            </a>

            <a
                href="/docs/Кодекс деловой этики.pdf"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img src="/img/ethics/pdf-2.png" alt="{{ __('ethics.pdf2_alt') }}">
            </a>
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
