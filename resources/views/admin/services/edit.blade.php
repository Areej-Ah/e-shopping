@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('services/'.$service->id),'method' => 'put','files'=>true]) !!}


       <div class="form-group">
            {!! Form::label('name_ar', trans('admin.name_ar')) !!}
            {!! Form::text('name_ar',$service->name_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('name_en', trans('admin.name_en')) !!}
          {!! Form::text('name_en',$service->name_en,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('description_ar', trans('admin.description_ar')) !!}
            {!! Form::textarea('description_ar',$service->description_ar,['class'=>'form-control summernote_description_ar']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description_en', trans('admin.description_en')) !!}
            {!! Form::textarea('description_en',$service->description_en,['class'=>'form-control summernote_description_en']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('activation', trans('admin.activation')) !!}
            {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$service->active,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('files', trans('admin.files')) !!}
          @foreach($service->files as $file)
          <a href="{{ Storage::url($file->file) }}" download>{!! $file->{'title_'.session('lang')} !!}</a>
          @endforeach
        </div>

        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.icon') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
              {!! Form::file('icon',['class'=>'custom-file-input']) !!}

            </div>
          </div>

          @if(!empty($service->icon))
            <br/>
            <div class="col-md-3 col-sm-12">
            <div class="info-box bg-light">
              <div class="info-box-content">

              <center> <img style="width:auto; height:50px;" src="{{ Storage::url($service->icon) }}" /></center>

              </span></span></div>
            </div>
            </div>
            <br/>
          @endif

        </div>

        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.image') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('image',trans('admin.image'),['class'=>'custom-file-label']) !!}
              {!! Form::file('image',['class'=>'custom-file-input']) !!}

            </div>
          </div>

          @if(!empty($service->image))
            <br/>
            <div class="col-md-3 col-sm-12">
            <div class="info-box bg-light">
              <div class="info-box-content">

              <center> <img style="width:auto; height:50px;" src="{{ Storage::url($service->image) }}" /></center>

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
@endsection
