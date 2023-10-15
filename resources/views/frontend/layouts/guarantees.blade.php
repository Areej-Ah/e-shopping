<section id="Guarantees" class="no-padding equalize" data-equalize-item=".text-box">
    <div class="row col-no-margin">

        <div class="col-lg-4">
            <div class="text-box hover-effect text-dark" style="height: 330px;">
                <a href="#"> <i class="fas fa-money-bill"></i>
                    <h3>{!! trans('admin.price_guarantee') !!}</h3>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'price_guarantee_'.session('lang')}), 400) !!}</p>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="text-box hover-effect text-dark" style="height: 330px;">
                <a href="#"> <i class="fa fa-chart-line"></i>
                    <h3>{!! trans('admin.quality_assurance') !!}</h3>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'quality_assurance_'.session('lang')}), 400) !!}</p>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="text-box hover-effect text-dark" style="height: 330px;">
                <a href="#"> <i class="fa fa-user-clock"></i>
                    <h3>{!! trans('admin.after_sales_service') !!}</h3>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($setting->{'after_sales_service_'.session('lang')}), 400) !!}</p>
                </a>
            </div>
        </div>
        
    </div>
</section>