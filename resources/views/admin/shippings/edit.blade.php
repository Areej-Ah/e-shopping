@extends('admin.index')

@section('content')
@push('js')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAwnTaUXm2yBoSRDVdr2U5FElllMl5r-Cs&sensor=false&&libraries=places"></script>
<script src="{{ url('/') }}/frontend/adminlte/dist/js/locationpicker.jquery.js"></script>
<?php
$lat = !empty($shipping->lat)?$shipping->lat:'24.7461627';
$lng = !empty($shipping->lng)?$shipping->lng:'46.6607619';

?>
<script>
 $('#us1').locationpicker({
     location: {
         latitude: {{ $lat }},
         longitude:{{ $lng }}
     },
     radius: 300,
     markerIcon: '{{ url('frontend/adminlte/dist/img/map-marker.png') }}',
     inputBinding: {
       latitudeInput: $('#lat'),
       longitudeInput: $('#lng'),
      // radiusInput: $('#us2-radius'),
      // locationNameInput: $('#address_en')
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
    {!! Form::open(['url' => aurl('shippings/'.$shipping->id),'method' => 'put','files'=>true]) !!}
    <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">

      <div class="form-group">
        {!! Form::label('name_ar', trans('admin.name_ar')) !!}
        {!! Form::text('name_ar',$shipping->name_ar,['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
        {!! Form::label('name_en', trans('admin.name_en')) !!}
        {!! Form::text('name_en',$shipping->name_en,['class'=>'form-control']) !!}
      </div>





      <div class="form-group">
        {!! Form::label('user_id', trans('admin.owner')) !!}
        {!! Form::select('user_id',App\User::where('membership','company')->pluck('name','id'),$shipping->user_id,['class'=>'form-control']) !!}
      </div>




      <div class="form-group">
        <div id="us1" style="width: 100%; height: 400px;"></div>
      </div>




        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.logo') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
              {!! Form::file('logo',['class'=>'custom-file-input']) !!}

            </div>
          </div>

          @if(!empty($shipping->logo))
            <br/>
            <div class="col-md-3 col-sm-12">
            <div class="info-box bg-light">
              <div class="info-box-content">

              <center> <img style="width:auto; height:50px;" src="{{ Storage::url($shipping->logo) }}" /></center>

              </span></span></div>
            </div>
            </div>
            <br/>
          @endif

        </div>
        <br/>


      <div class="form-group">
        {!! Form::label('activation', trans('admin.activation')) !!}
        {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$shipping->active,['class'=>'form-control']) !!}
      </div>
      <br/>




         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}

    {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>






@endsection
