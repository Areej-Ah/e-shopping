@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('videos/'.$video->id),'method' => 'put','files'=>true]) !!}


      <div class="form-group">
            {!! Form::label('title_ar', trans('admin.title_ar')) !!}
            {!! Form::text('title_ar',$video->title_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('title_en', trans('admin.title_en')) !!}
          {!! Form::text('title_en',$video->title_en,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('video', trans('admin.video')) !!}
            {!! Form::text('video',$video->video,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
        {!! Form::label('activation', trans('admin.activation')) !!}
        {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$video->active,['class'=>'form-control']) !!}
       </div>


        <br/>



         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}

    {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>






@endsection
