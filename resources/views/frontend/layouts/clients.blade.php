<section id="Clients" class="text-center p-b-100" >
	<div class="container">
		<div class="heading-text heading-line text-center">
			<h4>{!! trans('admin.clients') !!}</h4>
			<p>{!! trans('admin.clients_desc') !!}</p>
		</div>
		<div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2" data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay="3000" data-loop="true">
			@foreach($customers as $customer)
				<div>
					<a href="#"><img alt="{!! $customer->{'name_'.session('lang')} !!}" src="{{ Storage::url($customer->logo) }}"> </a>
				</div>
			@endforeach
		</div>
	</div>
</section>
