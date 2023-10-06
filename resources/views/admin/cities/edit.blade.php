@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('cities/'.$city->id),'method' => 'put']) !!}


      <div class="form-group">
            {!! Form::label('name_ar', trans('admin.name_ar')) !!}
            {!! Form::text('name_ar',$city->name_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('name_en', trans('admin.name_en')) !!}
          {!! Form::text('name_en',$city->name_en,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country_id', trans('admin.country_id')) !!}
            {!! Form::select('country_id',App\Model\Country::pluck('name_'.session('lang'),'id'),$city->country_id,['class'=>'form-control']) !!}
        </div>





        
         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}
        
    {!! Form::close() !!}
  

    </div>
    <!-- /.card-body -->
  </div>


  
  


@endsection