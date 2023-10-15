<section id="Subscribe" class="background-colored text-center p-t-80  p-b-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="widget widget-newsletter">
                    <form class="widget-subscribe-form" action="include/subscribe-form.php" role="form" method="post" novalidate="novalidate">
                        <h4 class="text-light">{!! trans('admin.newsletter') !!}</h4>

                        <div class="input-group mb-0">
                            <span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
                            <input type="email" required name="widget-subscribe-form-email" class="form-control required email" placeholder="{!! trans('admin.email') !!}">
                            <button type="submit" id="widget-subscribe-submit-button" class="btn btn-light">{!! trans('admin.subscribe') !!}</button>
                        </div>

                        <small class="text-light">{!! trans('admin.newsletter_desc') !!}</small>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>