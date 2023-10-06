@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('teams'),'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name_ar', trans('admin.name_ar')) !!}
            {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('name_en', trans('admin.name_en')) !!}
          {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('position_ar', trans('admin.position_ar')) !!}
            {!! Form::text('position_ar',old('position_ar'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('position_en', trans('admin.position_en')) !!}
          {!! Form::text('position_en',old('position_en'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description_ar', trans('admin.description_ar')) !!}
            {!! Form::textarea('description_ar',old('description_ar'),['class'=>'form-control summernote_description_ar']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description_en', trans('admin.description_en')) !!}
            {!! Form::textarea('description_en',old('description_en'),['class'=>'form-control summernote_description_en']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('activation', trans('admin.activation')) !!}
          {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],old('activation'),['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.image') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('image',trans('admin.image'),['class'=>'custom-file-label']) !!}
              {!! Form::file('image',['class'=>'custom-file-input']) !!}

            </div>
          </div>
        </div>
        <br/>


         {!! Form::submit(trans('admin.create'),['class' =>'btn btn-primary' ]) !!}

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
