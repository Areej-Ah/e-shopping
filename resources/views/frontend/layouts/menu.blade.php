<header id="header" class="site-header style5 cta_button" data-header-style="5">
	<div class="container siteheader-container header--oldstyles">
		<div class="logo-container hasInfoCard logosize--yes">
			<h1 class="site-logo logo " id="logo">
				<a href="{{ url ('/') }}">
					<img src="{{ Storage::url(setting()->logo) }}" class="logo-img" alt="Confirmation Lab" title="Confirmation Lab" />
				</a>
			</h1>

			<div id="infocard" class="logo-infocard">
				<div class="custom">
					<div class="row">
						<div class="col-sm-5">
							<p>&nbsp;

							</p>
							<p style="text-align: center;">
								<img src="{{ Storage::url(setting()->logo2) }}" class="" alt="Confirmation Lab" title="Confirmation Lab" />
							</p>
							<p style="text-align: center;">
							{!! $setting->{'sitename_'.session('lang')}  !!}
							</p>
						</div>

						<div class="col-sm-7">
							<div class="custom contact-details">
								<p>
									<strong>{!! $setting->mobile !!}</strong><br>
									Email:&nbsp;<a href="mailto:sales@yourwebsite.com">{!! $setting->email !!}</a>
								</p>
								<p>
								{!! $setting->{'location_'.session('lang')}  !!}

								</p>
								<a href="http://goo.gl/maps/1OhOu" class="map-link" target="_blank" title="">
									<span class="glyphicon glyphicon-map-marker icon-white"></span>
									<span>{!! trans('admin.open_in_map') !!}</span>
								</a>
							</div>
							<div style="height:20px;">
							</div>
							<ul class="social-icons sc--clean">
								@foreach($socialMedia as $item)
								<li><a href="{{ $item->link }}" target="_blank" class="icon-{{$item->icon}}"></a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="separator site-header-separator visible-xs mb-0"></div>

		<div class="header-links-container">
			<ul class="social-icons sc--clean topnav navRight">
				@foreach($socialMedia as $item)
				<li><a href="{{ $item->link }}" target="_blank" class="icon-{{$item->icon}}"></a></li>
				@endforeach

			</ul>

			<ul class="topnav navLeft topnav--lang">
				<li class="languages drop">
					<a href="#">
						<span class="globe glyphicon glyphicon-globe icon-white xs-icon"></span>
						<span class="hidden-xs">{!! trans('admin.languages') !!}</span>
					</a>
					<div class="pPanel">
						<ul class="inner">
							<li class="toplang-item">
								<a href="{{ url('lang/en')}}">
									<img src="{{asset('frontend/lab/images/en.png')}}" class="toplang-flag" alt="English" title="" /> English
								</a>
							</li>
							<li class="toplang-item">
								<a href="{{ url('lang/ar')}}">
									<img src="{{asset('frontend/lab/images/ar.png')}}" class="toplang-flag" alt="Arabic" title="Arabic" /> Arabic
								</a>
							</li>

						</ul>
					</div>
				</li>
			</ul>
		</div>

		<div class="separator site-header-separator visible-xs"></div>

		<div id="search" class="header-search">
			<a href="#" class="searchBtn "><span class="glyphicon glyphicon-search icon-white"></span></a>
			<div class="search-container">
				<form id="searchform" class="header-searchform" action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)" target="_blank">
					<input type="hidden" id="q" name="q"/>
					<input name="s" maxlength="20" class="inputbox" type="text" size="20" value="SEARCH ..." onblur="if (this.value=='') this.value='SEARCH ...';" onfocus="if (this.value=='SEARCH ...') this.value='';">
					<button type="submit" id="searchsubmit" class="searchsubmit glyphicon glyphicon-search icon-white"></button>
					<span class="kl-field-bg"></span>
				</form>
			</div>
		</div>


		<div id="zn-res-menuwrapper">
			<a href="#" class="zn-res-trigger zn-header-icon"></a>
		</div>


				<div id="main-menu" class="main-nav zn_mega_wrapper ">
					<ul id="menu-main-menu" class="main-menu zn_mega_menu">
						<li><a href="{{ url ('/') }}">{!! trans('admin.home') !!}</a></li>
						<li><a href="{{ url ('/about') }}">{!! trans('admin.about') !!}</a></li>
						<li class="menu-item-has-children"><a href="{{ url ('/services') }}">{!! trans('admin.services') !!}</a>
							<ul class="sub-menu clearfix">
                                @foreach($services as $service)
								<li><a href="/service/{{ $service->id}}">{!! $service->{'name_'.session('lang')} !!}</a></li>
                                @endforeach

							</ul>
						</li>
						<li><a href="{{ url ('/news') }}">{!! trans('admin.news') !!}</a></li>
						<li class="menu-item-has-children"><a href="#">{!! trans('admin.gallery') !!}</a>
							<ul class="sub-menu clearfix">
								<li><a href="{{ url ('/videos') }}">{!! trans('admin.video') !!}</a></li>
								<li><a href="{{ url ('/images') }}">{!! trans('admin.photo') !!}</a></li>
							</ul>
						</li>
						<li><a href="{{ url ('/jobs') }}">{!! trans('admin.jobs') !!}</a></li>
						<li><a href="{{ url ('/contact') }}">{!! trans('admin.contact_us') !!}</a></li>

					</ul>
		</div>
	</div>
</header>

