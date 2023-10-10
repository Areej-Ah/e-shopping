<section class="hg_section ptop-65 pbottom-65">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="latest_posts default-style">
					<h3 class="m_title montserrat">{!! trans('admin.latest_news') !!}</h3>

					<div class="row">
						@foreach($news as $new)
						<div class="col-sm-6 col-lg-4 post">
							<a href="/new/{{ $new->id}}" class="hoverBorder plus">
								<span class="hoverBorderWrapper">
									<img src="{{ Storage::url($new->image) }}" class="img-responsive" width="370" height="200" alt="" title="" />
									<span class="theHoverBorder"></span>
								</span>
								<h6>{!! trans('admin.read_more') !!} +</h6>
							</a>
							<em>{!! $new->created_at->toFormattedDateString() !!} </em>
							<h3 class="m_title"><a href="/new/{{ $new->id}}">{!! $new->{'title_'.session('lang')} !!}</a></h3>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
