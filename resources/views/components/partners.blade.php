<div class="partners">
    <h2 class="black">{{ __('messages.partners_title') }}</h2>
    <p class="secondary-p-black">{{ __('messages.partners_desc') }}</p>

    <div class="partners-slider">
        <div class="partners-track">
            @foreach([1,2] as $row)
                <div class="partners-slide">
                    @foreach(range(1,6) as $i)
                        <img src="img/logo-{{ $i }}.png" class="partner-logo" alt="Partner {{ $i }}">
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
