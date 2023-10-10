<section class="hg_section bg-white pt-80 pb-80">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="kl-title-block clearfix text-center tbk-icon-pos--after-title pbottom-50">
					<h3 class="tbk__title fs-32 lh-52 fw-thin">{!! trans('admin.team') !!}</h3>

					<div class="symbol-line">
						<span class="kl-icon tcolor"><img class="kl-iconbox__icon small-logo" src="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" alt="Stunning Page Builder"></span>
					</div>

					<h4 class="tbk__subtitle fs-14">{!! trans('admin.team_intro') !!}</h4>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="team-carousel caroufredsel stg-slim-arrows" data-setup='{ "navigation": true, "pagination": false, "width": "variable", "items_width": "360", "items_height": "variable", "auto_duration": 9000, "items": {"min":1, "max":4} }'>
					<ul class="slides">
						@foreach($teams as $team)
						<li>
							<div class="team-member tm-hover text-center">
								<a href="{{ Storage::url($team->image) }}" class="grayscale-link" data-lightbox="image"><img src="{{ Storage::url($team->image) }}" alt="" class="img-responsive"></a>
								<h5 class="mmb-title">{!! $team->{'name_'.session('lang')} !!}</h5>
								<h6 class="mmb-position">{!! $team->{'position_'.session('lang')} !!}</h6>
								<p class="mmb-desc">{!! $team->{'description_'.session('lang')} !!}</p>

							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
