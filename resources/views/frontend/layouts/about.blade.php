<section id="About" class="image-block p-t-0 p-b-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4" style="height:609px;background:url({{asset('frontend/daamah/images/about.jpg')}}) 50% 50% / cover no-repeat;">
			</div>
			<div class="col-lg-8">
				<div class="heading-text heading-section">
					<h3>{!! trans('admin.about_title',['title' => $setting->{'sitename_'.session('lang')} ]) !!}</h3>
					<span class="lead">{!! $setting->{'about_'.session('lang')} !!}</span>
				</div>
				<a href="{{ url ('/about') }}" class="btn btn-outline btn-dark"><span>{!! trans('admin.learn_more') !!}</span></a>
				
				<div class="seperator">{!! trans('admin.statistics',['title' => $setting->{'sitename_'.session('lang')} ]) !!}</div>
				<div class="row" style="text-align: center;">
					<div class="col-lg-3">
						<div class="icon-box effect center clean">
							<div class="icon"> <a href="#"><i class="fa fa-map-marker-alt"></i></a> </div>
							 <div class="counter small"> <span data-speed="3500" data-refresh-interval="50" data-to="{{ $setting->number_of_head_office }}" data-from="0" data-seperator="true"></span> </div>
							<p>{!! trans('admin.head_office') !!}</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="icon-box effect center clean">
							<div class="icon"> <a href="#"><i class="fa fa-store"></i></a> </div>
							<div class="counter small"> <span data-speed="3500" data-refresh-interval="50" data-to="{{ $setting->number_of_product }}" data-from="0" data-seperator="true"></span> </div>
							<p>{!! trans('admin.product') !!}</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="icon-box effect center clean">
							<div class="icon"> <a href="#"><i class="fa fa-users"></i></a> </div>
							<div class="counter small"> <span data-speed="3500" data-refresh-interval="50" data-to="{{ $setting->number_of_client }}" data-from="0" data-seperator="true"></span> </div>
							<p>{!! trans('admin.client') !!}</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="icon-box effect center clean">
							<div class="icon"> <a href="#"><i class="fa fa-trophy"></i></a> </div>
							<div class="counter small"> <span data-speed="3500" data-refresh-interval="50" data-to="{{ $setting->number_of_certificate }}" data-from="0" data-seperator="true"></span> </div>
							<p>{!! trans('admin.certificate') !!}</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>