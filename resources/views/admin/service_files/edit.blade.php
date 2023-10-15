@extends('admin.index')

@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
    {!! Form::open(['url' => aurl('service_files/'.$serviceFile->id),'method' => 'put','files'=>true]) !!}

      <div class="form-group">
        {!! Form::label('title_ar', trans('admin.title_ar')) !!}
        {!! Form::text('title_ar',$serviceFile->title_ar,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('title_en', trans('admin.title_en')) !!}
        {!! Form::text('title_en',$serviceFile->title_en,['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
        {!! Form::label('text_ar', trans('admin.text_ar')) !!}
        {!! Form::textarea('text_ar',$serviceFile->text_ar,['class'=>'form-control summernote_text_ar']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('text_en', trans('admin.text_en')) !!}
        {!! Form::textarea('text_en',$serviceFile->text_en,['class'=>'form-control summernote_text_en']) !!}
      </div>

        <div class="form-group">
        {!! Form::label('activation', trans('admin.activation')) !!}
        {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$serviceFile->active,['class'=>'form-control']) !!}
       </div>

       <div class="form-group">
            {!! Form::label('service_name', trans('admin.service_name')) !!}
            {!! Form::select('service_id',App\Models\Service::pluck('name_'.session('lang'),'id'),$serviceFile->service_id,['class'=>'form-control']) !!}
       </div>

       <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.file') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('file',trans('admin.file'),['class'=>'custom-file-label']) !!}
              {!! Form::file('file',['class'=>'custom-file-input']) !!}

            </div>
          </div>

          @if(!empty($serviceFile->file))
            <br/>
            <div class="col-md-3 col-sm-12">
              <div class="info-box bg-light">
              <div class="info-box-content">


              <!--<embed src="{{ Storage::url($serviceFile->file) }}" width="auto" height="100px" /> -->
              <a href="{{ Storage::url($serviceFile->file) }}" download>{!! $serviceFile->{'title_'.session('lang')} !!}</a>

              </span></span></div>
            </div>
            </div>
            <br/>
          @endif

        </div>


        <br/>


         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}

    {!! Form::close() !!}


    </div>
  </div>



@endsection

@section('scripts')
    <script>

      $('.summernote_text_ar').summernote({
        tabsize: 2,
        height: 100
      });

      $('.summernote_text_en').summernote({
        tabsize: 2,
        height: 100
      });

    </script>
@endsection
