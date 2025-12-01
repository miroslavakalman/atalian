<div class="slider">
    <div class="slides-container">
        @foreach(__('messages.slides') as $index => $slide)
            <div class="slide slide-{{ $index + 1 }} {{ $index === 0 ? 'active' : '' }}">
                <div class="txt">
                    <h1>{!! $slide['title'] !!}</h1>
                    <p class="desc">{{ $slide['desc'] }}</p>
                    <button class="btn-primary">{{ $slide['btn'] }}</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
