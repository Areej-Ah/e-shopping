<section id="Brands">
    <div class="container">
        <div class="heading-text heading-line text-center">
            <h4>{!! trans('admin.they_said') !!}</h4>
            <p>{!! trans('admin.our_brands') !!}</p>
        </div>

        <div class="carousel arrows-visibile testimonial testimonial-single" data-items="1" data-loop="true" data-autoplay="true" data-autoplay="3500" data-arrows="false">
            @foreach($brands as $brand)
                <div class="testimonial-item">
                    <img src="{{ Storage::url($brand->logo) }}" alt="{!! $brand->{'name_'.session('lang')} !!}">
                    <p>{!! $brand->{'text_'.session('lang')}  !!}</p>
                    <span>{!! $brand->{'name_'.session('lang')}  !!}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>