<footer id="footer">
   <div class="footer-content">
	   <div class="container">
		   <div class="row gap-y">
			   <div class="col-md-6 col-xl-4">
				   <p>
					   <a href="#"><img src="{{ Storage::url(setting()->logo) }}" alt="{!! $setting->{'sitename_'.session('lang')} !!}"></a>
				   </p>
				   <p>{!! $setting->{'slogan_'.session('lang')} !!}</p>
			   </div>
			   <div class="col-6 col-md-3 col-xl-2">
				   <div class="widget">
					   <h4>{!! trans('admin.recent_projects') !!}</h4>
					   <ul class="list">
						   <li><a href="project.html">عنوان المشروع</a></li>
						   <li><a href="project.html">عنوان المشروع</a></li>
						   <li><a href="project.html">عنوان المشروع</a></li>
					   </ul>
				   </div>
			   </div>
			   <div class="col-6 col-md-3 col-xl-2">
				   <div class="widget">
					   <h4>{!! trans('admin.contact') !!}</h4>
					   <ul class="list">
						   <li><a href="{{ url ('/contact') }}">{!! trans('admin.contact_us') !!}</a></li>
						   <li><a href="{{ url ('/jobs') }}">{!! trans('admin.join_us') !!}</a></li>
					   </ul>
				   </div>
			   </div>
			   <div class="col-6 col-md-6 col-xl-2">
				   <div class="widget">
					   <h4>{!! trans('admin.about_company') !!}</h4>
					   <ul class="list">
						   <li><a href="{{ url ('/about') }}">{!! trans('admin.about') !!}</a></li>
						   <li><a href="{{ url ('/brands') }}">{!! trans('admin.brands') !!}</a></li>
					   </ul>
				   </div>
			   </div>
			   <div class="col-6 col-md-6 col-xl-2">
				   <a class="btn btn-primary btn-block" href="#">{!! trans('admin.profile') !!}</a>
				   <br>
				   <h6>{!! trans('admin.social') !!}</h6>
				   <div class="social-icons social-icons-colored social-icons-rounded float-left">
					   <ul>
							@foreach($socialMedia as $item)
								<li class="social-{{$item->icon}}"><a href="{{ $item->link }}"><i class="fab fa-{{$item->icon}}"></i></a></li>
							@endforeach
					   </ul>
				   </div>
			   </div>
		   </div>
	   </div>
   </div>
   <div class="copyright-content">
	   <div class="container">
		   <div class="copyright-text text-center">{!! trans('admin.rights',['company'=> setting()->sitename_ar]) !!}</div>
	   </div>
   </div>
</footer>

</div>
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<script src="{{URL::asset('frontend/daamah/js/jquery.js')}}"></script>
<script src="{{URL::asset('frontend/daamah/js/plugins.js')}}"></script>
<script src="{{URL::asset('frontend/daamah/js/functions.js')}}"></script>

</body>

</html>