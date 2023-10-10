@extends('frontend.index2')
@section('page_name','OUR NEWS')
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
							<li>{!! trans('admin.news') !!}</li>
						</ul>

						<div class="clearfix"></div>
					</div>

					<div class="col-sm-6">
						<div class="subheader-titles">
							<h2 class="subheader-maintitle">{!! trans('admin.news') !!}</h2>
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
<section class="hg_section ptop-50">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9">
				<div class="itemListView clearfix eBlog">
					<div class="itemList">
						{{--  <div class="itemContainer featured-post">
							<div class="zn_full_image">
								<img class="zn_post_thumbnail" src="images/n1.jpg" alt="">
							</div>

							<div class="itemFeatContent">
								<div class="itemFeatContent-inner">
									<div class="itemHeader">
										<h3 class="itemTitle">
											<a href="{{ url ('/new') }}" title="Progressively">News Title</a>
										</h3>

										<div class="post_details">
											<span class="catItemDateCreated">
											Friday, 07 August 2017 </span>

										</div>
									</div>
									<div class="clearfix">
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>  --}}
						@foreach($news as $new)
						<div class="itemContainer">
							<div class="itemHeader">
								<h3 class="itemTitle">
									<a href="{{ url ('/new') }}" title="Enthusiastically">{!! $new->{'title_'.session('lang')} !!}</a>
								</h3>

								<div class="post_details">
									<span class="catItemDateCreated">
									{{ $new->created_at->toFormattedDateString()}} </span>

								</div>
							</div>

							<div class="itemBody">
								<div class="itemIntroText">
									<div class="hg_post_image">
										<a href="/new/{{ $new->id}}" class="pull-left" title="Enthusiastically">
											<img src="{{ Storage::url($new->image) }}" class="" width="457" height="320" alt="Enthusiastically" title="Enthusiastically" />
										</a>
									</div>
									<p>
									{!! $new->{'text_'.session('lang')} !!}
									</p>
								</div>

								<div class="clear">
								</div>

								<div class="itemBottom clearfix">
									<div class="itemReadMore">
										<a class="btn btn-fullcolor readMore" href="/new/{{ $new->id}}" title="">{!! trans('admin.read_more') !!}</a>
									</div>
								</div>
								<div class="clear">
								</div>

							</div>


							<div class="clear">
							</div>
						</div>
						<div class="clear"></div>
						@endforeach

					</div>

					{{--  <ul class="pagination">
						<li class="pagination-prev">
							<span>
								<span></span>
							</span>
						</li>
						<li class="active">
							<span>1</span>
						</li>
						<li>
							<a href="#">
								<span>2</span>
							</a>
						</li>
						<li class="pagination-next">
							<a href="#">
								<span class="glyphicon glyphicon-menu-right"></span>
							</a>
						</li>
					</ul>  --}}

				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div id="sidebar-widget" class="sidebar">
					<div class="widget widget_search">
						<div class="search gensearch__wrapper">
							<form id="searchform" class="gensearch__form" action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)" target="_blank">
								<input id="s" name="s" maxlength="20" class="inputbox gensearch__input" type="text" size="20" value="SEARCH ..." onblur="if (this.value=='') this.value='SEARCH ...';" onfocus="if (this.value=='SEARCH ...') this.value='';"><button type="submit" id="searchsubmit" value="go" class="gensearch__submit glyphicon glyphicon-search"></button>
							</form>
						</div>
					</div>
					<div class="widget widget_recent_entries">
						<div class=" latest_posts style3">
							<h3 class="widgettitle title">{!! trans('admin.recent_news') !!}</h3>
							<ul class="posts">
								@foreach($news as $new)
								<li class="lp-post">
									<a href="/new/{{ $new->id}}" class="hoverBorder pull-left">
										<span class="hoverBorderWrapper">
											<img src="{{ Storage::url($new->image) }}" style="width: 70px; height: auto;" alt="News Title">
											<span class="theHoverBorder"></span>
										</span>
									</a>
									<h4 class="title">
										<a href="/new/{{ $new->id}}" title="News Title">{!! $new->{'title_'.session('lang')} !!}</a>
									</h4>

								</li>
								@endforeach
							</ul>
						</div>
					</div>


					<div class="widget widget_categories">
						<h3 class="widgettitle title">{!! trans('admin.services') !!}</h3>
						<ul class="menu">
							@foreach($services as $service)
								<li class="cat-item"><a href="/service/{{ $service->id}}">{!! $service->{'name_'.session('lang')} !!}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="widget widget_meta">
						<h3 class="widgettitle title">{!! trans('admin.gallery') !!}</h3>
						<ul>
							<li><a href="{{ url ('/videos') }}">{!! trans('admin.video') !!}</a></li>
							<li><a href="{{ url ('/images') }}">{!! trans('admin.photo') !!}</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
