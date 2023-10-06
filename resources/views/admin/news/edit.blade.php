@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('news/'.$news->id),'method' => 'put','files'=>true]) !!}


      <div class="form-group">
            {!! Form::label('title_ar', trans('admin.title_ar')) !!}
            {!! Form::text('title_ar',$news->title_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('title_en', trans('admin.title_en')) !!}
          {!! Form::text('title_en',$news->title_en,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('text_ar', trans('admin.text_ar')) !!}
            {!! Form::textarea('text_ar',$news->text_ar,['class'=>'form-control summernote_text_ar']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('text_en', trans('admin.text_en')) !!}
          {!! Form::textarea('text_en',$news->text_en,['class'=>'form-control summernote_text_en']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('activation', trans('admin.activation')) !!}
        {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$news->active,['class'=>'form-control']) !!}
       </div>


        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.image') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('image',trans('admin.image'),['class'=>'custom-file-label']) !!}
              {!! Form::file('image',['class'=>'custom-file-input']) !!}

            </div>
          </div>

          @if(!empty($news->image))
            <br/>
            <div class="col-md-3 col-sm-12">
            <div class="info-box bg-light">
              <div class="info-box-content">

              <center> <img style="width:auto; height:50px;" src="{{ Storage::url($news->image) }}" /></center>

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
      $('.summernote_text_ar').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  <script>
      $('.summernote_text_en').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
@endsection
