@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>

    <div class="card-body">
    {!! Form::open(['url' => aurl('subscriptions'),'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title_ar', trans('admin.title_ar')) !!}
            {!! Form::text('title_ar',old('title_ar'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('title_en', trans('admin.title_en')) !!}
          {!! Form::text('title_en',old('title_en'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('requirments_ar', trans('admin.requirments_ar')) !!}
            {!! Form::textarea('requirments_ar',old('requirments_ar'),['class'=>'form-control summernote_requirments_ar']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('requirments_en', trans('admin.requirments_en')) !!}
            {!! Form::textarea('requirments_en',old('requirments_en'),['class'=>'form-control summernote_requirments_en']) !!}
        </div>

        <br/>


        <div class="form-group">
            {!! Form::label('benefits_ar', trans('admin.benefits_ar')) !!}
            {!! Form::textarea('benefits_ar',old('benefits_ar'),['class'=>'form-control summernote_benefits_ar']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('benefits_en', trans('admin.benefits_en')) !!}
            {!! Form::textarea('benefits_en',old('benefits_en'),['class'=>'form-control summernote_benefits_en']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('activation', trans('admin.activation')) !!}
          {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],old('activation'),['class'=>'form-control']) !!}
        </div>

        
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

      $('.summernote_requirments_ar').summernote({
        tabsize: 2,
        height: 100
      });


      $('.summernote_requirments_en').summernote({
        tabsize: 2,
        height: 100
      });


      $('.summernote_benefits_ar').summernote({
        tabsize: 2,
        height: 100
      });


      $('.summernote_benefits_en').summernote({
        tabsize: 2,
        height: 100
      });

    </script>
@endsection