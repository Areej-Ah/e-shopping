<div class="kl-slideshow iosslider-slideshow uh_light_gray maskcontainer--shadow_ud iosslider--custom-height scrollme">
	<div class="kl-loader">
		<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewbox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"></path><path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z" transform="rotate(98.3774 20 20)"><animatetransform attributetype="xml" attributename="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatcount="indefinite"></animatetransform></path></svg>
	</div>

	<div class="bgback">
	</div>

	<div class="th-sparkles">
	</div>


	<div class="iosSlider kl-slideshow-inner animateme" data-trans="6000" data-autoplay="1" data-infinite="true" data-when="span" data-from="0" data-to="0.75" data-translatey="300" data-easing="linear">
		<div class="kl-iosslider hideControls">

			@foreach($sliders as $slider)

			<div class="item iosslider__item">
				<div class="slide-item-bg" style="background-image:url({{ Storage::url($slider->image) }});">
				</div>

				<div class="kl-slide-overlay" style="background:rgba(32,55,152,0.4); background: -moz-linear-gradient(left, rgba(32,55,152,0.4) 0%, rgba(17,93,131,0.25) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(32,55,152,0.4)), color-stop(100%,rgba(17,93,131,0.25))); background: -webkit-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: -o-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: -ms-linear-gradient(left, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); background: linear-gradient(to right, rgba(32,55,152,0.4) 0%,rgba(17,93,131,0.25) 100%); ">
				</div>

				<div class="container kl-iosslide-caption kl-ioscaption--style5 fromleft klios-alignleft kl-caption-posv-middle">
					<div class="animateme" data-when="span" data-from="0" data-to="0.75" data-opacity="0.1" data-easing="linear">
						<h2 class="main_title has_titlebig "><span>{!! $slider->{'title_'.session('lang')}  !!}</span></h2>

						<h3 class="title_big">{!! $slider->{'text_'.session('lang')}  !!}</h3>

						<div class="more">
							<a class="btn btn-fullcolor " href="{{ url ('/about') }}" target="_self">{!! trans('admin.about') !!}</a>


							<a class="btn btn-lined " href="{{ url ('/contact') }}" target="_self">{!! trans('admin.contact_us') !!}</a>
						</div>


					</div>

				</div>
			</div>
			@endforeach

		</div>

		<div class="kl-iosslider-prev">
			<span class="thin-arrows ta__prev"></span>

			<div class="btn-label">
            {!! trans('admin.prev') !!}
			</div>
		</div>

		<div class="kl-iosslider-next">
			<span class="thin-arrows ta__next"></span>

			<div class="btn-label">
            {!! trans('admin.next') !!}
			</div>
		</div>
	</div>

	<div class="kl-ios-selectors-block bullets2">
		<div class="selectors">
			<div class="item iosslider__bull-item first">
			</div>

			<div class="item iosslider__bull-item">
			</div>

		</div>
	</div>

	<div class="scrollbarContainer">
	</div>

	<div class="kl-bottommask kl-bottommask--shadow_ud">
	</div>
</div>

<section class="hg_section bg-white ptop-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="action_box style3" data-arrowpos="center" style="margin-top:-25px;">
					<div class="action_box_inner">
						<div class="action_box_content">
							<div class="ac-content-text">
								<h4 class="text">{!! \Illuminate\Support\Str::limit($setting->{'about_'.session('lang')}, 300) !!}</h4>
							</div>

							<div class="ac-buttons">
								<a class="btn btn-fullwhite ac-btn" href="{{ url ('/about') }}" target="_self">{!! trans('admin.learn_more') !!}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
