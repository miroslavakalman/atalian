<div class="wrapper">
<div class="advantages">
    <h2 class="black">{{ __('messages.advantages_title') }}</h2>
    <p class="secondary-p-black">{{ __('messages.advantages_desc') }}</p>
    <div class="adv-row">
        @foreach(__('messages.advantages') as $adv)
            <div class="advantage">
                <img src="img/ellipse-{{ $loop->iteration }}.png" alt="0{{ $loop->iteration }}" class="ellipse">
                <h4>{!! $adv['title'] !!}</h4>
                <p class="small">{{ $adv['desc'] }}</p>
            </div>
        @endforeach
    </div>
</div>
</div>