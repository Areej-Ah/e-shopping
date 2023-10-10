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

<section class="hg_section  ptop-65 pbottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="row hg-portfolio-item">
					<div class="col-sm-12 col-md-7">
						<div class="portfolio-item-content">
							<h1 class="page-title portfolio-item-title">{!! $service->{'name_'.session('lang')} !!}</h1>

							<div class="portfolio-item-desc">
								<div class="portfolio-item-desc-inner">
									<p>
                                    {!! $service->{'description_'.session('lang')} !!}
									</p>
								</div>

								<a href="#" class="portfolio-item-more-toggle js-toggle-class" data-target=".portfolio-item-desc" data-target-class="is-opened" data-more-text="{!! trans('admin.see_more') !!}" data-less-text="{!! trans('admin.show_less') !!}">
									<span class="glyphicon glyphicon-menu-down"></span>
								</a>
							</div>

							{{--  <div class="mb-30 clearfix">

								<ul class="fancy-list fs-normal pull-left w-50 w-md-100 ml-0">
									<li>Reprot Title</li>
									<li>Reprot Title</li>
									<li>Reprot Title</li>
								</ul>
								<ul class="fancy-list fs-normal pull-left w-50 w-md-100 ml-0">
									<li>Reprot Title</li>
									<li>Reprot Title</li>
									<li>Reprot Title</li>
								</ul>
							</div>  --}}

							{{--  <div class="portfolio-item-otherdetails clearfix">
								<div class="portfolio-item-share clearfix" data-share-title="SHARE:">
									<a href="https://twitter.com/intent/tweet?text=Check+out+-+Progressively+harness&amp;url=http%3A%2F%2Fhogash-demo.com%2Fdemo%2Fkwp%2Fportfolio%2Fprogressively-harness%2F%3Futm_source%3Dsharetw" title="SHARE ON TWITTER" class=" portfolio-item-share-twitter">
										<span class="icon-twitter"></span>
									</a>
									<a href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u=http%3A%2F%2Fhogash-demo.com%2Fdemo%2Fkwp%2Fportfolio%2Fprogressively-harness%2F%3Futm_source%3Dsharefb" title="SHARE ON FACEBOOK" class=" portfolio-item-share-facebook">
										<span class="icon-facebook"></span>
									</a>
									<a href="https://plus.google.com/share?url=http%3A%2F%2Fhogash-demo.com%2Fdemo%2Fkwp%2Fportfolio%2Fprogressively-harness%2F%3Futm_source%3Dsharegp" title="SHARE ON GPLUS" class=" portfolio-item-share-gplus">
										<span class="icon-gplus"></span>
									</a>
									<a href="http://pinterest.com/pin/create/button?description=Check+out+-+Progressively+harness&amp;url=http%3A%2F%2Fhogash-demo.com%2Fdemo%2Fkwp%2Fportfolio%2Fprogressively-harness%2F%3Futm_source%3Dsharepi" title="SHARE ON PINTEREST" class=" portfolio-item-share-pinterest">
										<span class="icon-pinterest"></span>
									</a>
									<a href="mailto:?body=You can see it live here http%3A%2F%2Fhogash-demo.com%2Fdemo%2Fkwp%2Fportfolio%2Fprogressively-harness%2F%3Futm_source%3Dsharemail . Made by Kallyas Demo http://hogash-demo.com/demo/kwp&amp;subject=Check out this awesome project: Progressively harness" title="SHARE ON MAIL" class=" portfolio-item-share-mail">
										<span class="glyphicon glyphicon-envelope"></span>
									</a>
								</div>

							</div>  --}}
						</div>
					</div>

					<div class="col-sm-12 col-md-5">
						<div class="portfolio-item-right mfp-gallery images">
							<a href="{{ Storage::url($service->image) }}" class="hoverLink" data-lightbox="mfp" data-mfp="image" title="Progressively harness" >
								<span class="hoverBorderWrapper">
									<img src="{{ Storage::url($service->image) }}" class="img-responsive" alt="" title="" />

									<span class="theHoverBorder"></span>
								</span>
							</a>

						</div>
					</div>

					<div class="clearfix">
					</div>
				</div>

				<div class="hg_separator clearfix"></div>
			</div>
		</div>
	</div>
</section>


@endsection
