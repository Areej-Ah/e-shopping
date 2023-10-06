@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('admin/'.$admin->id),'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name', trans('admin.name')) !!}
            {!! Form::text('name',$admin->name,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            {!! Form::email('email',$admin->email,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('password', trans('admin.password')) !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        
         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}
        
    {!! Form::close() !!}
  

    </div>
    <!-- /.card-body -->
  </div>


  
  


@endsection