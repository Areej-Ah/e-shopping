<div id="topbar" class="topbar-fullwidth d-none d-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ul class="top-menu">
					<li><a href="tel:{{ $setting->mobile }}"> {!! $setting->mobile !!}</a></li>
					<li><a href="mailto:{{ $setting->email }}"> {!! $setting->email !!}</a></li>
				</ul>
			</div>
			<div class="col-md-6 d-none d-sm-block">
				<div class="social-icons social-icons-colored-hover">
					<ul>
						@foreach($socialMedia as $item)
							<li class="social-{{ $item->icon }}"><a href="{{ $item->link }}"><i class="fab fa-{{ $item->icon }}"></i></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<header id="header" data-fullwidth="true">
	<div class="header-inner">
		<div class="container">

			<div id="logo">
				<a href="{{ url ('/') }}">
					<img src="{{ Storage::url(setting()->logo) }}" class="logo-default">
					<img src="{{ Storage::url(setting()->logo) }}" class="logo-sticky">
				</a>
			</div>

			<div id="search">
				<a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
				<form class="search-form" action="search-results-page.html" method="get">
					<input class="form-control" name="q" type="text" placeholder="{!! trans('admin.search') !!}"/>
					<span class="text-muted">{!! trans('admin.search_des') !!}</span>
				</form>
			</div>

			<div class="header-extras">
				<ul>
					<li>
						<a id="btn-search" href="#"> <i class="icon-search"></i></a>
					</li>
					<li>
						<div class="p-dropdown">
							<a href="#"><i class="icon-globe"></i></a>
							<ul class="p-dropdown-content">
								<li><a href="{{ url('lang/ar')}}">{!! trans('admin.ar') !!}</a></li>
								<li><a href="{{ url('lang/en')}}">English</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>

			<div id="mainMenu-trigger">
				<a class="lines-button x"><span class="lines"></span></a>
			</div>
			
			<div id="mainMenu">
				<div class="container">
					<nav>
						<ul>
							<li><a href="{{ url ('/') }}">{!! trans('admin.home') !!}</a></li>
							<li><a href="{{ url ('/about') }}">{!! trans('admin.about') !!}</a></li>
							<li class="dropdown"><a href="#">{!! trans('admin.products') !!}</a>
								<ul class="dropdown-menu">
									@foreach($departments as $department)
										<li class="{{ empty($department['children']) ? '' : 'dropdown-submenu' }}">
											@if(empty($department['children']))
												<a href="/products/{{ $department['id']}}">{!! $department['dep_name_'.session('lang')]  !!}</a>
											@else
												<a href="#">{!! $department['dep_name_'.session('lang')]  !!}</a>
												<ul class="dropdown-menu">
													@foreach($department['children'] as $sub_department)
														<li class="{{ empty($sub_department['children']) ? '' : 'dropdown-submenu' }}">
															@if(empty($sub_department['children']))
																<a href="/products/{{ $sub_department['id']}}">{!! $sub_department['dep_name_'.session('lang')]  !!}</a>
															@else
																<a href="#">{!! $sub_department['dep_name_'.session('lang')]  !!}</a>
																<ul class="dropdown-menu">
																	@foreach($sub_department['children'] as $sub_sub_department)
																		<li><a href="/products/{{ $sub_sub_department['id']}}">{!! $sub_sub_department['dep_name_'.session('lang')]  !!}</a></li>
																	@endforeach	
																</ul>
															@endif
														</li>
													@endforeach
												</ul>
											@endif
										</li>
									@endforeach
								</ul>
							</li>
							<li><a href="{{ url ('/brands') }}">{!! trans('admin.brands') !!}</a></li>
							<li><a href="{{ url ('/projects') }}">{!! trans('admin.projects') !!}</a></li>
							<li><a href="{{ url ('/jobs') }}">{!! trans('admin.jobs') !!}</a></li>
							<li><a href="{{ url ('/contact') }}">{!! trans('admin.contact_us') !!}</a></li>
						</ul>
					</nav>
				</div>
			</div>
			
		</div>
	</div>
</header>

<nav id="dotsMenu">
	<ul>
		<li><a href="#Sliders"><span>{!! trans('admin.start') !!}</span></a></li>
		<li><a href="#About"><span>{!! trans('admin.about') !!}</span></a></li>
		<li><a href="#Guarantees"><span>{!! trans('admin.guarantees') !!}</span></a></li>
		<li><a href="#Products"><span>{!! trans('admin.recent_products') !!}</span></a></li>
		<li><a href="#Brands"><span>{!! trans('admin.brands') !!}</span></a></li>
		<li><a href="#Pricing"><span>{!! trans('admin.brands') !!}</span></a></li>
		<li><a href="#Clients"><span>{!! trans('admin.customers') !!}</span></a></li>
	</ul>
</nav>
