<div class="services wrapper">
    <h2 class="black">{{ __('messages.services_title') }}</h2>

    <div class="services-row">
        <img src="img/service-1.png" class="service-img" alt="">

        <div class="dropdown-column">
         @foreach(__('messages.services_list') as $service)
    <div class="dropdown-item">
        <div class="dropdown-closed">
            <p class="secondary-p-black">{!! $service['title'] !!}</p>
            <img src="img/arrow.png" class="arrow-down" alt="">
        </div>
        <div class="dropdown-opened">
            <div class="dropdown-opened-row">
                <p class="secondary-p-white">{!! $service['title'] !!}</p>
                <img src="img/arrow-up.png" class="arrow-up" alt="">
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
