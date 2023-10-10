@extends('frontend.index2')
@section('page_name','ABOUT US')
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
							<li>{!! trans('admin.about') !!}</li>
						</ul>

						<div class="clearfix"></div>
					</div>

					<div class="col-sm-6">
						<div class="subheader-titles">
							<h2 class="subheader-maintitle">{!! trans('admin.about_company') !!}</h2>
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
<section class="hg_section hg_section--relative bg-white ptop-80 pbottom-80">
			<div class="container">
				<div class="row">

                    <div class="col-md-12 col-sm-12">
                          <div class="kl-title-block clearfix text-left tbk-symbol--icon tbk--colored tbk-icon-pos--left-title">
							<h3 class="tbk__title ansation fs-38 lh-38  fw-bold">
								<span class="tbk__symbol">
									<span class="tbk__icon glyphicon glyphicon-option-horizontal blue"></span>
								</span>
								{!! trans('admin.who_we_are') !!}
							</h3>
						</div>
                    </div>

					<div class="col-md-8 col-sm-8">
						<div class="hg_accordion_element style3">

							<div class="th-accordion">
								<div class="acc-group">
									<a data-toggle="collapse" data-target="#acc13" class="" aria-expanded="true">{!! trans('admin.about') !!}<span class="acc-icon"></span></a>

									<div id="acc13" class="collapse in" aria-expanded="true">
										<div class="content">
											<p>
                                                <div style="text-align: justify;">
                                                {!! $setting->{'about_'.session('lang')} !!}

                                                </div>
											</p>
										</div>
									</div>
								</div>

								<div class="acc-group">
									<a data-toggle="collapse" data-target="#acc14" class="collapsed">{!! trans('admin.quality_policy') !!}<span class="acc-icon"></span></a>

									<div id="acc14" class="collapse ">
										<div class="content">
											<p>
                                                <div style="text-align: justify;">
                                                {!! $setting->{'quality_policy_'.session('lang')} !!}

                                                </div>
											</p>
										</div>
									</div>
								</div>

								<div class="acc-group">
									<a data-toggle="collapse" data-target="#acc15" class="collapsed">{!! trans('admin.objective') !!}<span class="acc-icon"></span></a>

									<div id="acc15" class="collapse ">
										<div class="content">
											<p>
												<div style="text-align: justify;">
                                                {!! $setting->{'objective_'.session('lang')} !!}
                                                </div>
											</p>
										</div>
									</div>
								</div>

								<div class="acc-group">
									<a data-toggle="collapse" data-target="#acc16" class="collapsed">{!! trans('admin.corporate_mission') !!}<span class="acc-icon"></span></a>

									<div id="acc16" class="collapse ">
										<div class="content">
								            <p  style="text-align: justify;">
                                            {!! $setting->{'corporate_mission_'.session('lang')} !!}
											</p>
										</div>
									</div>
								</div>


								<div class="acc-group">
									<a data-toggle="collapse" data-target="#acc17" class="collapsed">{!! trans('admin.mission_vision') !!} <span class="acc-icon"></span></a>
									<div id="acc17" class="collapse ">
										<div class="content">
								            <p  style="text-align: justify;">
                                            {!! $setting->{'vision_'.session('lang')} !!}
											</p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4">
						<div class="adbox video mb-50">
							<img src="{{asset('frontend/lab/images/video-image.jpg')}}" style="height: 640px; width: auto;" alt="" title="">

							<div class="video_trigger_wrapper">
								<div class="adbox_container">
									<a class="playVideo" data-lightbox="iframe" href="https://www.youtube.com/watch?v=WN_VGtBAmOM"></a>
								</div>
							</div>
						</div>
					</div>

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
							<a class="btn-element btn btn-lined lined-custom btn-md btn-block " href="{{ url ('/contact') }}" style="margin:0 0 10px 0;"><span>{!! trans('admin.contact_us') !!}</span></a>
						</div>
					</div>
				</div>
			</div>
		</section>


@endsection
