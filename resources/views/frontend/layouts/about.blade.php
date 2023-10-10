<section class="hg_section bg-white ptop-65">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="kl-title-block clearfix text-center tbk-symbol-- tbk-icon-pos--after-title">
					<h3 class="tbk__title montserrat fs-36 lh-36 fw-bold">{!! trans('admin.about_title',['title' => $setting->{'sitename_'.session('lang')} ]) !!}</h3>

					<h4 class="tbk__subtitle fs-18 fw-vthin">{!! trans('admin.about_intro') !!}</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="hg_section bg-white">
	<div class="full_width">
		<div class="row">
			<div class="col-sm-offset-1 col-md-10 col-sm-10">
				<div class="row gutter-md">
					<div class="col-md-3 col-sm-3">
						<div class="kl-iconbox kl-iconbox--fleft text-left">
							<div class="kl-iconbox__inner">
								<div class="kl-iconbox__icon-wrapper">
									<img class="kl-iconbox__icon" src="{{asset('frontend/lab/images/vision.png')}}" alt="Stunning Page Builder">
								</div>

								<div class="kl-iconbox__content-wrapper">
									<div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
										<h3 class="kl-iconbox__title fs-16 lh-22 fw-normal">{!! trans('admin.mission_vision') !!}</h3>
									</div>

									<div class=" kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
										<p class="kl-iconbox__desc fs-14 gray">
											{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'vision_'.session('lang')}), 200) !!}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="kl-iconbox kl-iconbox--fleft text-left">
							<div class="kl-iconbox__inner">
								<div class="kl-iconbox__icon-wrapper">
									<img class="kl-iconbox__icon" src="{{asset('frontend/lab/images/Quality.png')}}" alt="QUALITY POLICY">
								</div>

								<div class="kl-iconbox__content-wrapper">
									<div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
										<h3 class="kl-iconbox__title fs-16 lh-22 fw-normal ">{!! trans('admin.quality_policy') !!}</h3>
									</div>

									<div class=" kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
										<p class="kl-iconbox__desc fs-14 gray">		
											{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'quality_policy_'.session('lang')}), 200) !!}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="kl-iconbox kl-iconbox--fleft text-left">
							<div class="kl-iconbox__inner">

								<div class="kl-iconbox__icon-wrapper ">
									<img class="kl-iconbox__icon" src="{{asset('frontend/lab/images/goals.png')}}" alt="Mature project">
								</div>


								<div class="kl-iconbox__content-wrapper">
									<div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
										<h3 class="kl-iconbox__title fs-16 lh-22 fw-normal">{!! trans('admin.objective') !!}</h3>
									</div>

									<div class="kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
										<p class="kl-iconbox__desc fs-14 gray">
											{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'objective_'.session('lang')}), 200) !!}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="kl-iconbox kl-iconbox--fleft text-left">
							<div class="kl-iconbox__inner">
								<div class="kl-iconbox__icon-wrapper ">
									<img class="kl-iconbox__icon" src="{{asset('frontend/lab/images/mision.png')}}" alt="Mature project">
								</div>

								<div class="kl-iconbox__content-wrapper">
									<div class="kl-iconbox__el-wrapper kl-iconbox__title-wrapper">
										<h3 class="kl-iconbox__title fs-16 lh-22 fw-normal">{!! trans('admin.corporate_mission') !!}</h3>
									</div>

									<div class=" kl-iconbox__el-wrapper kl-iconbox__desc-wrapper">
										<p class="kl-iconbox__desc fs-14 gray">
											{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'corporate_mission_'.session('lang')}), 200) !!}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
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
				<div class="box image-boxes imgboxes_style4 kl-title_style_bottom">
					<a class="imgboxes4_link imgboxes-wrapper" href="/service/{{ $service->id}}" target="_self">
						<img src="{{ Storage::url($service->image) }}" alt="Microbiology Department" title="{!! $service->{'name_'.session('lang')} !!}" class="img-responsive imgbox_image cover-fit-img">

						<span class="imgboxes-border-helper"></span>

						<h3 class="m_title imgboxes-title">{!! $service->{'name_'.session('lang')} !!}</h3>
					</a>

					<p>{!! $service->{'description_'.session('lang')} !!}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>



<section class="hg_section p-0">
	<div class="full_width">
		<div class="row gutter-lg">
			<div class="col-md-5 col-sm-12">
				<div class="media-container style2 h-615">
					<div class="kl-bg-source">
						<div class="kl-bg-source__bgimage" style="background-image:url(frontend/lab/images/video-image.jpg); background-repeat:no-repeat; background-attachment:scroll; background-position-x:center; background-position-y:center; background-size:cover">
						</div>

						<div class="kl-bg-source__overlay" style="background:rgba(137,173,178,0.3); background: -moz-linear-gradient(left, rgba(137,173,178,0.3) 0%, rgba(53,53,53,0.65) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(137,173,178,0.3)), color-stop(100%,rgba(53,53,53,0.65))); background: -webkit-linear-gradient(left, rgba(137,173,178,0.3) 0%,rgba(53,53,53,0.65) 100%); background: -o-linear-gradient(left, rgba(137,173,178,0.3) 0%,rgba(53,53,53,0.65) 100%); background: -ms-linear-gradient(left, rgba(137,173,178,0.3) 0%,rgba(53,53,53,0.65) 100%); background: linear-gradient(to right, rgba(137,173,178,0.3) 0%,rgba(53,53,53,0.65) 100%); ">
						</div>
					</div>

					<a class="media-container__link media-container__link--btn media-container__link--style-borderanim2 " href="https://www.youtube.com/watch?v=WN_VGtBAmOM" data-lightbox="iframe">
						<div class="borderanim2-svg">
							<svg height="70" width="400" xmlns="http://www.w3.org/2000/svg">
								<rect class="borderanim2-svg__shape" height="70" width="400"></rect>
							</svg>

							<span class="media-container__text">{!! trans('admin.learn_more') !!}</span>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-7 col-sm-12">
				<div class="custom_container p-5">
					<div class="row hg_col_eq_last">
						<div class="col-md-12 col-sm-12">
							<div class="kl-title-block clearfix text-left tbk-symbol--line tbk-icon-pos--after-title pbottom-0">
								<h3 class="tbk__title montserrat fs-38 lh-46 fw-bold">{!! trans('admin.who_we_are') !!}</h3>


							</div>

							<div class="hg_separator style2 clearfix">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<div class="text_box">
								<p>
								{!! $setting->{'about_'.session('lang')} !!}

								</p>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
