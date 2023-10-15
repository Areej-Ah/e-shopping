<div id="Sliders" class="inspiro-slider slider-halfscreen dots-creative">
	@foreach($sliders as $slider)
		<div class="slide kenburns" data-bg-image="{{ Storage::url($slider->image) }}">
			<div class="bg-overlay"></div>
			<div class="container">
				<div class="slide-captions text-center text-light">
					<span class="strong">
						<h4 class="business">{!! $slider->{'title_'.session('lang')}  !!}</h4>
					</span>
					<h2>{!! $slider->{'text_'.session('lang')}  !!}</h2>
					<div>
						<a href="{{ url ('/about') }}" class="btn btn-primary">{!! trans('admin.learn_more') !!}</a>
						<a href="{{ url ('/contact') }}" type="button" class="btn btn-light">{!! trans('admin.contact_us') !!}</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>


