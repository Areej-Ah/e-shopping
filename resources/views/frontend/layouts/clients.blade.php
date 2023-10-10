<section class="hg_section hg_section--relative ptop-80 pbottom-80">
	<div class="kl-bg-source">
		<div class="kl-bg-source__overlay" style="background:rgba(0,165,155,1); background: -moz-linear-gradient(left, rgba(0,165,155,1) 0%, rgba(0,165,155,1) 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(0,165,155,1)), color-stop(100%,rgba(0,165,155,1))); background: -webkit-linear-gradient(left, rgba(0,165,155,1) 0%,rgba(0,165,155,1) 100%); background: -o-linear-gradient(left, rgba(0,165,155,1) 0%,rgba(0,165,155,1) 100%); background: -ms-linear-gradient(left, rgba(0,165,155,1) 0%,rgba(0,165,155,1) 100%); background: linear-gradient(to right, rgba(0,165,155,1) 0%,rgba(0,165,155,1) 100%); ">
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">

					<div class="ts-pt-partners ts-pt-partners--y-title clearfix">
						<div class="ts-pt-partners__title">
                        {!! trans('admin.clients') !!}
						</div>

						<div class="ts-pt-partners__carousel-wrapper">
							<div class="ts-pt-partners__carousel">
								@foreach($customers as $customer)
								<div class="ts-pt-partners__carousel-item">
									<a class="ts-pt-partners__link" href="#" target="_self" title="">
										<img class="ts-pt-partners__img" src="{{ Storage::url($customer->logo) }}" alt="{!! $customer->{'name_'.session('lang')} !!}" title="" />
									</a>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
