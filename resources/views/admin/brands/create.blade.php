@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>

    <div class="card-body">
    {!! Form::open(['url' => aurl('brands'),'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name_ar', trans('admin.name_ar')) !!}
            {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('name_en', trans('admin.name_en')) !!}
          {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text_ar', trans('admin.text_ar')) !!}
            {!! Form::textarea('text_ar',old('text_ar'),['class'=>'form-control summernote_text_ar']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text_en', trans('admin.text_en')) !!}
            {!! Form::textarea('text_en',old('description_en'),['class'=>'form-control summernote_text_en']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('activation', trans('admin.activation')) !!}
          {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],old('activation'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.logo') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
              {!! Form::file('logo',['class'=>'custom-file-input']) !!}
             
            </div>
          </div>        
        </div>
        <br/>

        
         {!! Form::submit(trans('admin.create'),['class' =>'btn btn-primary' ]) !!}
        
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