<section class="hg_section ptop-65">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div>
					<a href="{{ url ('/contact') }}" style="background-color: #34495e;" class="hover-box hover-box-2">
						<span class="hb-circle"></span>
						<img src="{{asset('frontend/lab/images/quote1.svg')}}" class="hb-img rb-right" alt="" title="" />
						<h3>{!! trans('admin.contact_us') !!}</h3>
						<p>
                        {!! trans('admin.contact_intro') !!}<br>
                        {!! trans('admin.contact_intro2') !!}
						</p>
					</a>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div>
					<a href="{{ url ('/jobs') }}"  style="background-color: #34495e;" class="hover-box hover-box-2">
						<span class="hb-circle"></span>
						<img src="{{asset('frontend/lab/images/hb-hiring.svg')}}" class="hb-img rb-right" alt="" title="" />
						<h3>{!! trans('admin.hiring_on') !!}</h3>
						<h4>{!! trans('admin.join_us') !!}</h4>
						<p>
                        {!! trans('admin.send_cv') !!}<br>
								 {!! $setting->employment_email !!}
						</p>
					</a>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div>
					<a href="#" target="_blank" style="background-image:url(images/hb-catalogue1.png); background-color: #34495e; background-size:cover" class="hover-box hover-box-3">
						<img src="images/hb-catalogue1.png" class="hb-img " alt="" title="" />
						<h3>{!! trans('admin.download_profile') !!}</h3>
						<p>
                        {!! trans('admin.read_profile') !!}
						</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
