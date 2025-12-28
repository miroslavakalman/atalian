<div class="partners">
    <h2 class="black">{{ __('messages.partners_title') }}</h2>
    <p class="secondary-p-black">{{ __('messages.partners_desc') }}</p>

    <div class="partners-static"> 
        <div class="partners-t">
            <div class="partners-static">
                @foreach(range(1,2) as $i)
                    @if($i == 2)
                        <a href="https://proffadmin.ru" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="partner-link">
                            <img src="img/logo-{{ $i }}.png" class="partner-logo" alt="{{ __('messages.partner_logo_alt', ['num' => $i]) }}">
                        </a>
                    @else
                        <img src="img/logo-{{ $i }}.png" class="partner-logo" alt="{{ __('messages.partner_logo_alt', ['num' => $i]) }}">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
