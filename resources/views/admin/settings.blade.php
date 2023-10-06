@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!}

        <div class="form-group">
          {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
          {!! Form::text('sitename_ar',setting()->sitename_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
          {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('slogan_ar',trans('admin.slogan_ar')) !!}
          {!! Form::text('slogan_ar',setting()->slogan_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('slogan_en',trans('admin.slogan_en')) !!}
          {!! Form::text('slogan_en',setting()->slogan_en,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('email',trans('admin.email')) !!}
          {!! Form::email('email',setting()->email,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('employment_email',trans('admin.employment_email')) !!}
          {!! Form::email('employment_email',setting()->employment_email,['class'=>'form-control']) !!}
        </div>

        <br/>
        <br/>

        <div class="form-group">
            <label for="exampleInputFile">{{ trans('admin.logo') }}</label>
            <div class="input-group">
              <div class="custom-file">
                {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
                {!! Form::file('logo',['class'=>'custom-file-input']) !!}

              </div>
            </div>

            @if(!empty(setting()->logo))
              <br/>
              <div class="col-md-3 col-sm-12">
              <div class="info-box bg-light">
                <div class="info-box-content">

                <center> <img style="width:auto; height:50px;" src="{{ Storage::url(setting()->logo) }}" /></center>

                </span></span></div>
              </div>
              </div>
              <br/>
            @endif

        </div>

        <div class="form-group">
            <label for="exampleInputFile">{{ trans('admin.logo2') }}</label>
            <div class="input-group">
              <div class="custom-file">
                {!! Form::label('logo2',trans('admin.logo2'),['class'=>'custom-file-label']) !!}
                {!! Form::file('logo2',['class'=>'custom-file-input']) !!}

              </div>
            </div>

            @if(!empty(setting()->logo2))
              <br/>
              <div class="col-md-3 col-sm-12">
              <div class="info-box bg-light">
                <div class="info-box-content">

                <center> <img style="width:auto; height:50px;" src="{{ Storage::url(setting()->logo2) }}" /></center>

                </span></span></div>
              </div>
              </div>
              <br/>
            @endif

        </div>

        <div class="form-group">
                {!! Form::label('video',trans('admin.video')) !!}
                {!! Form::text('video',setting()->video,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            <label for="exampleInputFile">{{ trans('admin.icon') }}</label>
            <div class="input-group">
              <div class="custom-file">
                {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
                {!! Form::file('icon',['class'=>'custom-file-input']) !!}
              </div>
            </div>

            @if(!empty(setting()->icon))
              <br/>
              <div class="col-md-3 col-sm-12">
              <div class="info-box bg-light">
                <div class="info-box-content">

                <center> <img style="width:auto; height:50px;" src="{{ Storage::url(setting()->icon) }}" /></center>

                </span></span></div>
              </div>
              </div>
              <br/>
            @endif

        </div>

        <br/>
        <br/>

        <div class="form-group">
          {!! Form::label('description_en',trans('admin.description_en')) !!}
          {!! Form::textarea('description_en',setting()->description_en,['class'=>'form-control summernote_description_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('description_ar',trans('admin.description_ar')) !!}
          {!! Form::textarea('description_ar',setting()->description_ar,['class'=>'form-control summernote_description_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('keywords',trans('admin.keywords')) !!}
          {!! Form::textarea('keywords',setting()->keywords,['class'=>'form-control']) !!}
        </div>

        <br/>
        <br/>

        <div class="form-group">
          {!! Form::label('main_lang',trans('admin.main_lang')) !!}
          {!! Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],setting()->main_lang,['class'=>'form-control']) !!}
        </div>

        <br/>
        <br/>

        <div class="form-group">
          {!! Form::label('status',trans('admin.status')) !!}
          {!! Form::select('status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->status,['class'=>'form-control']) !!}
        </div>

        <br/>

        <div class="form-group">
          {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
          {!! Form::textarea('message_maintenance',setting()->message_maintenance,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('message_ar',trans('admin.message_ar')) !!}
          {!! Form::textarea('message_ar',setting()->message_ar,['class'=>'form-control summernote_message_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('message_en',trans('admin.message_en')) !!}
          {!! Form::textarea('message_en',setting()->message_en,['class'=>'form-control summernote_message_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('vision_ar',trans('admin.vision_ar')) !!}
          {!! Form::textarea('vision_ar',setting()->vision_ar,['class'=>'form-control summernote_vision_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('vision_en',trans('admin.vision_en')) !!}
          {!! Form::textarea('vision_en',setting()->vision_en,['class'=>'form-control summernote_vision_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('values_ar',trans('admin.values_ar')) !!}
          {!! Form::textarea('values_ar',setting()->values_ar,['class'=>'form-control summernote_values_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('values_en',trans('admin.values_en')) !!}
          {!! Form::textarea('values_en',setting()->values_en,['class'=>'form-control summernote_values_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('objective_ar',trans('admin.objective_ar')) !!}
          {!! Form::textarea('objective_ar',setting()->objective_ar,['class'=>'form-control summernote_objective_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('objective_en',trans('admin.objective_en')) !!}
          {!! Form::textarea('objective_en',setting()->objective_en,['class'=>'form-control summernote_objective_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('about_ar',trans('admin.about_ar')) !!}
          {!! Form::textarea('about_ar',setting()->about_ar,['class'=>'form-control summernote_about_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('about_en',trans('admin.about_en')) !!}
          {!! Form::textarea('about_en',setting()->about_en,['class'=>'form-control summernote_about_en']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('quality_policy_en',trans('admin.quality_policy_en')) !!}
          {!! Form::textarea('quality_policy_en',setting()->quality_policy_en,['class'=>'form-control summernote_quality_policy_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('quality_policy_ar',trans('admin.quality_policy_ar')) !!}
          {!! Form::textarea('quality_policy_ar',setting()->quality_policy_ar,['class'=>'form-control summernote_quality_policy_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('corporate_mission_en',trans('admin.corporate_mission_en')) !!}
          {!! Form::textarea('corporate_mission_en',setting()->corporate_mission_en,['class'=>'form-control summernote_corporate_mission_en']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('corporate_mission_ar',trans('admin.corporate_mission_ar')) !!}
          {!! Form::textarea('corporate_mission_ar',setting()->corporate_mission_ar,['class'=>'form-control summernote_corporate_mission_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('location_ar',trans('admin.location_ar')) !!}
          {!! Form::text('location_ar',setting()->location_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('location_en',trans('admin.location_en')) !!}
          {!! Form::text('location_en',setting()->location_en,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('number_of_marketing_strategy',trans('admin.number_of_marketing_strategy')) !!}
          {!! Form::text('number_of_marketing_strategy',setting()->number_of_marketing_strategy,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('number_of_new_ideas',trans('admin.number_of_new_ideas')) !!}
          {!! Form::text('number_of_new_ideas',setting()->number_of_new_ideas,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('number_of_done_projects',trans('admin.number_of_done_projects')) !!}
          {!! Form::text('number_of_done_projects',setting()->number_of_done_projects,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('number_of_happy_customers',trans('admin.number_of_happy_customers')) !!}
          {!! Form::text('number_of_happy_customers',setting()->number_of_happy_customers,['class'=>'form-control']) !!}
        </div>



        <div class="form-group">
          {!! Form::label('phone',trans('admin.phone')) !!}
          {!! Form::text('phone',setting()->phone,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('mobile',trans('admin.mobile')) !!}
          {!! Form::text('mobile',setting()->mobile,['class'=>'form-control']) !!}
        </div>

        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>






@endsection

@section('scripts')

    <script>
      $('.summernote_description_ar').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_description_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
        <script>
      $('.summernote_message_ar').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_message_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
        <script>
      $('.summernote_vision_ar').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_vision_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
        <script>
      $('.summernote_values_ar').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_values_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
        <script>
      $('.summernote_quality_policy_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_quality_policy_ar').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_corporate_mission_ar').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_corporate_mission_en').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_about_en').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_about_ar').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_objective_en').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
   <script>
      $('.summernote_objective_ar').summernote({
        tabsize: 2,
        height: 100
      });
   </script>
@endsection
