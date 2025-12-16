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
<script>
    // Вставьте в конец файла перед закрывающим </body>
document.addEventListener('DOMContentLoaded', function() {
    function adjustImageGrid() {
        const grid = document.querySelector('.sust-img-grid');
        const images = grid.querySelectorAll('img');
        
        if (window.innerWidth <= 1023) {
            // На планшетах убираем специальные классы
            images.forEach(img => {
                img.style.marginTop = '0';
                img.style.width = 'auto';
            });
        } else {
            // На десктопе возвращаем оригинальные стили
            const img1 = document.querySelector('.img-1');
            const img3 = document.querySelector('.img-3');
            if (img1) img1.style.width = '190px';
            if (img3) img3.style.marginTop = '70px';
        }
    }
    
    // Выполняем при загрузке и изменении размера окна
    adjustImageGrid();
    window.addEventListener('resize', adjustImageGrid);
});
</script>