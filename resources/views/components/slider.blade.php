<div class="slider">
    <div class="slides-container">
        @foreach(trans('messages.slides') as $index => $slide)
            <div class="slide slide-{{ $index + 1 }} {{ $index === 0 ? 'active' : '' }}">
                <div class="txt">
                    <h1>{!! $slide['title'] !!}</h1>
                    <p class="desc">{{ $slide['desc'] }}</p>

                    <a
                        href="{{ route($slide['route'], ['locale' => app()->getLocale()]) }}"
                        class="btn-primary"
                    >
                        {{ $slide['btn'] }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
