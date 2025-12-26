<div class="partners">
    <h2 class="black">{{ __('messages.partners_title') }}</h2>
    <p class="secondary-p-black">{{ __('messages.partners_desc') }}</p>

    <div class="partners-slider">
        <div class="partners-track">
            @foreach([1, 2] as $row)
                <div class="partners-slide">
                    @foreach(range(1,2) as $i)
                        @if($i == 2)
                            <a href="https://proffadmin.ru" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="partner-link">
                                <img src="img/logo-{{ $i }}.png" class="partner-logo">
                            </a>
                        @else
                            <img src="img/logo-{{ $i }}.png" class="partner-logo">
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>