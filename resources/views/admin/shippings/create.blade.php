@extends('admin.index')

@section('content')

@push('js')
    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAwnTaUXm2yBoSRDVdr2U5FElllMl5r-Cs&sensor=false&&libraries=places"></script>
<script src="{{ url('/') }}/frontend/adminlte/dist/js/locationpicker.jquery.js"></script>
<?php
$lat = !empty(old('lat'))?old('lat'):'24.7461627';
$lng = !empty(old('lng'))?old('lng'):'46.6607619';
?>
<script>
  $('#us1').locationpicker({
      location: {
          latitude: 24.7461627,
          longitude: 46.6607619
      },
      radius: 300,
      markerIcon: '{{ url('frontend/adminlte/dist/img/map-marker.png') }}',
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
      //  radiusInput: $('#us2-radius'),
      //  locationNameInput: $('#address_en'),

    }

  });

</script>
@endpush


<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('shippings'),'files'=>true]) !!}

    <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">

        <div class="form-group">
          {!! Form::label('name_ar', trans('admin.name_ar')) !!}
          {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('name_en', trans('admin.name_en')) !!}
          {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
        </div>

        


        <div class="form-group">
          {!! Form::label('user_id', trans('admin.owner')) !!}
          {!! Form::select('user_id',App\User::where('membership','company')->pluck('name','id'),old('user_id'),['class'=>'form-control']) !!}
        </div>


 


        <div class="form-group">
          <div id="us1" style="width: 100%; height: 400px;"></div>         
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
    <!-- /.card-body -->
  </div>


  
  


@endsection