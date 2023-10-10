@extends('frontend.index2')
@section('page_name','OUR SERVICES')
@section('content')
<div id="page_header" class="page-subheader site-subheader-cst uh_zn_def_header_style maskcontainer--mask6">
	<div class="bgback"></div>

	<div class="kl-bg-source">
		<div class="kl-video-container kl-bg-source__video">
			<div class="kl-video-wrapper video-grid-overlay">
				<div class="kl-video valign halign" style="width: 100%; height: 100%;" data-setup='{
					"position": "absolute",
					"loop": true,
					"autoplay": true,
					"muted": true,
					"mp4":"{{URL::asset('frontend/lab/videos/laboratory.mp4')}}",
					"poster":"images/s1.jpg",
					"video_ratio": "1.7778"
					}'>
				</div>
			</div>
		</div>

		<div class="kl-bg-source__overlay" style="background:rgba(130,36,227,0.3); background: -moz-linear-gradient(left, rgba(130,36,227,0.3) 0%, rgba(51,158,221,0.4) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(130,36,227,0.3)), color-stop(100%,rgba(51,158,221,0.4))); background: -webkit-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: -o-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: -ms-linear-gradient(left, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); background: linear-gradient(to right, rgba(130,36,227,0.3) 0%,rgba(51,158,221,0.4) 100%); ">
		</div>
	</div>

	<div class="th-sparkles"></div>

	<div class="ph-content-wrap">
		<div class="ph-content-v-center">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<ul class="breadcrumbs fixclear">
							<li><a href="{{ url ('/') }}">{!! trans('admin.home') !!}</a></li>
							<li>{!! trans('admin.services') !!}</li>
						</ul>

						<div class="clearfix"></div>
					</div>

					<div class="col-sm-6">
						<div class="subheader-titles">
							<h2 class="subheader-maintitle">{!! trans('admin.services') !!}</h2>
							<h4 class="subheader-subtitle">{!! trans('admin.know_better') !!}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="kl-bottommask kl-bottommask--mask3">
		<svg width="5000px" height="57px" class="svgmask " viewBox="0 0 5000 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
				<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask3">
					<feOffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
					<feGaussianBlur stdDeviation="2" in="shadowOffsetInner1" result="shadowBlurInner1"></feGaussianBlur>
					<feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
					<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.4 0" in="shadowInnerInner1" type="matrix" result="shadowMatrixInner1"></feColorMatrix>
					<feMerge>
						<feMergeNode in="SourceGraphic"></feMergeNode>
						<feMergeNode in="shadowMatrixInner1"></feMergeNode>
					</feMerge>
				</filter>
			</defs>
			<path d="M9.09383679e-13,57.0005249 L9.09383679e-13,34.0075249 L2418,34.0075249 L2434,34.0075249 C2434,34.0075249 2441.89,33.2585249 2448,31.0245249 C2454.11,28.7905249 2479,11.0005249 2479,11.0005249 L2492,2.00052487 C2492,2.00052487 2495.121,-0.0374751261 2500,0.000524873861 C2505.267,-0.0294751261 2508,2.00052487 2508,2.00052487 L2521,11.0005249 C2521,11.0005249 2545.89,28.7905249 2552,31.0245249 C2558.11,33.2585249 2566,34.0075249 2566,34.0075249 L2582,34.0075249 L5000,34.0075249 L5000,57.0005249 L2500,57.0005249 L1148,57.0005249 L9.09383679e-13,57.0005249 Z" class="bmask-bgfill" filter="url(#filter-mask3)" fill="#ffffff"></path>
		</svg>
		<i class="glyphicon glyphicon-chevron-down"></i>
	</div>

</div>
<section class="hg_section ptop-50 bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="text-left tbk-symbol--line tbk-icon-pos--after-title clearfix">
					<h2 class="black fs-34 fw-semibold">{!! trans('admin.services') !!}</h2>

					<div class="tbk__symbol ">
						<span></span>
					</div>

					<h5 class="tbk__subtitle fs-18 light-gray fw-thin">{!! trans('admin.services_intro') !!}</h5>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="hg_section bg-white">
	<div class="container">
		<div class="row">
			@foreach($services as $service)
			<div class="col-md-6 col-sm-6">
				<div class="services_box services_box--boxed sb--hasicon">
					<div class="services_box__inner clearfix">
						<div class="kl-iconbox kl-iconbox--type-icon kl-iconbox--sh kl-iconbox--sh-circle">
							<div class="kl-iconbox__inner">
								<div class="kl-iconbox__icon-wrapper ">
									<span class="kl-iconbox__icon">
										<img class="kl-iconbox__icon small" src="{{ Storage::url($service->icon) }}" alt="Microbiology Department">
									</span>
								</div>
							</div>
						</div>

						<div class="services_box__content">
							<h4 class="services_box__title">{!! $service->{'name_'.session('lang')}  !!}</h4>

							<div class="services_box__desc">
								<p>
								{!! $service->{'description_'.session('lang')}  !!}
								</p>
							</div>

							{{--  <div class="services_box__list-wrapper">
								<span class="services_box__list-bg"></span>
								<!-- List with custom padding top-->
								<ul class="services_box__list" style="padding-top: 300px;">
									<li><span class="services_box__list-text">Report Title </span></li>
									<li><span class="services_box__list-text">Report Title </span></li>
									<li><span class="services_box__list-text">Report Title </span></li>
								</ul>
							</div>  --}}

						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="hg_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="hg_separator clearfix mb-65">
				</div>
			</div>

			<div class="col-md-9 col-sm-9">
				<div class="kl-title-block clearfix tbk--text-default tbk--left text-left tbk-symbol-- tbk-icon-pos--after-title">
					<h3 class="tbk__title montserrat fw-semibold tcolor">{!! trans('admin.work_with_us') !!}</h3>
					<h4 class="tbk__subtitle">{!! trans('admin.work_intro') !!}</h4>
				</div>
			</div>

			<div class="col-md-3 col-sm-3">
				<div class="th-spacer clearfix" style="height: 10px;">
				</div>

				<div class="zn_buttons_element text-left">
					<a class="btn-element btn btn-lined lined-custom btn-md btn-block" href="{{ url ('/contact') }}" style="margin:0 0 10px 0;"><span>{!! trans('admin.contact_us') !!}</span></a>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
