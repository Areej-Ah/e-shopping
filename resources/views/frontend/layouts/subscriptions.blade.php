<section id="Pricing" class="background-grey">
    <div class="container">
        <div class="heading-text heading-line text-center">
            <h4>{!! trans('admin.subscriptions') !!}</h4>
            <p>{!! trans('admin.subscriptions_desc') !!}</p>
        </div>
        

        <div class="row pricing-table">
            @foreach($subscriptions as $subscription)
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="plan">
                        <div class="plan-header">
                            <h2>{!! $subscription->{'title_'.session('lang')} !!}</h2>
                            <br>

                            <div class="plan-price">{!! trans('admin.requirments') !!}</div>
                        </div>
                        <div class="plan-list">{!! $subscription->{'requirments_'.session('lang')} !!}</div>
                        <div class="plan-header">
                            <div class="plan-price">{!! trans('admin.benefits') !!}</div>
                        </div>
                        <div class="plan-list">
                            {!! $subscription->{'benefits_'.session('lang')} !!}

                        {{--  <div class="plan-button">
                                <a href="#" class="btn btn-primary">أطلبها الأن</a>
                            </div>
                         --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>