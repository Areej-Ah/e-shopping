@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('users')]) !!}

        <div class="form-group">
            {!! Form::label('name', trans('admin.name')) !!}
            {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('password', trans('admin.password')) !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('membership', trans('admin.membership')) !!}
          {!! Form::select('membership', ['user' => trans('admin.user'), 'vendor' => trans('admin.vendor'), 'company' => trans('admin.company')],old('membership'),['class'=>'form-control']) !!} 
        </div>


        

        <div class="form-group">
          {!! Form::label('activation', trans('admin.activation')) !!}
          {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],old('activation'),['class'=>'form-control']) !!} 
        </div>

        
         {!! Form::submit(trans('admin.create'),['class' =>'btn btn-primary' ]) !!}
        
    {!! Form::close() !!}
  

    </div>
    <!-- /.card-body -->
  </div>


  
  


@endsection