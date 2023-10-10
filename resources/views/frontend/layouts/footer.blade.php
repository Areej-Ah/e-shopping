<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div>
					<h3 class="title m_title">{!! trans('admin.menu') !!}</h3>
					<div class="sbs">
						<ul class="menu">
							<li><a href="{{ url ('/about') }}">{!! trans('admin.about') !!}</a></li>
							<li><a href="{{ url ('/services') }}">{!! trans('admin.services') !!}</a></li>
							<li><a href="{{ url ('/news') }}">{!! trans('admin.news') !!}</a></li>
                            <li><a href="{{ url ('/images') }}">{!! trans('admin.gallery') !!}</a></li>
							<li><a href="{{ url ('/jobs') }}">{!! trans('admin.jobs') !!}</a></li>
                            <li><a href="{{ url ('/contact') }}">{!! trans('admin.contact_us') !!}</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div>
					<h3 class="title m_title">{!! trans('admin.touch') !!}</h3>
					<div class="contact-details"><p><strong>{!! $setting->mobile !!}</strong><br>
                    {!! trans('admin.email') !!}: <a href="#">{!! $setting->email !!}</a></p>
						<p> {!! $setting->{'location_'.session('lang')} !!}</p>
						<p><a href="http://goo.gl/maps/1OhOu" target="_blank"><i class="icon-map-marker icon-white"></i>{!! trans('admin.open_in_map') !!}</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="bottom clearfix">
					<ul class="social-icons sc--clean clearfix">
						<li class="title">{!! trans('admin.social') !!}</li>
						@foreach($socialMedia as $item)
						<li><a href="{{ $item->link }}" target="_blank" class="icon-{{$item->icon}}"></a></li>
						@endforeach
					</ul>

					<div class="copyright">
						<a href="{{ url ('/') }}">
							<img style="width: 100px; height: auto;" src="{{ Storage::url(setting()->logo) }}" alt="Confirmation lab">
						</a>
						<p>{!! trans('admin.rights') !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<a href="#" id="totop">{!! trans('admin.top') !!}</a>

<script type="text/javascript" src="{{URL::asset('frontend/lab/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/kl-plugins.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/plugins/scrollme/jquery.scrollme.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/plugins/_sliders/ios/jquery.iosslider.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/slider/ios/kl-ios-slider.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/kl-screenshot-box.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/kl-partners-carousel.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/kl-recent-work-carousel.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/kl-logo-carousel.js')}}"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/plugins/jquery.counterup.min.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0o13wnCMLdZdjlEZgK40yH8vY5ELzA9U"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/plugins/jquery.gmap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/trigger/kl-google-maps.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/kl-scripts.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/lab/js/kl-custom.js')}}"></script>


</body>
</html>

