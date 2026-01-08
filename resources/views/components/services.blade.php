<div class="services wrapper" id="wrapper-adv">
    <h2 class="black">{{ __('messages.services_title') }}</h2>

    <div class="services-row">
        <img src="img/service-1.png" class="service-img" alt="{{ __('messages.services_img_alt') }}">

        <div class="dropdown-column">
         @foreach(__('messages.services_list') as $service)
    <div class="dropdown-item">
        <div class="dropdown-closed">
            <p class="secondary-p-black">{!! $service['title'] !!}</p>
            <img src="img/icons/arrow.webp" class="arrow-down" alt="{{ __('messages.arrow_down_alt') }}">
        </div>
        <div class="dropdown-opened">
            <div class="dropdown-opened-row">
                <p class="secondary-p-white">{!! $service['title'] !!}</p>
                <img src="img/icons/arrow-up.webp" class="arrow-up" alt="{{ __('messages.arrow_up_alt') }}">
            </div>
            <ul class="dropdown-list">
                @foreach($service['items'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach

        </div>
    </div>
</div>
