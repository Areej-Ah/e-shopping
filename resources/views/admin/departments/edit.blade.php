@extends('admin.index')

@section('content')

@push('js')
<script type="text/javascript">
  $(document).ready(function(){

    $('#jstree').jstree({
     "core" : {
        'data' : {!! load_dep($department->parent,$department->id) !!},
    "themes" : {
      "variant" : "large"
    }
      },
     "checkbox" : {
      "keep_selected_style" : false
       },
      "plugins" : [ "wholerow" ]
     });

  });
  $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.parent_id').val(r.join(', '));
   });
</script>
@endpush



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('departments/'.$department->id),'method' => 'put','files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('dep_name_ar', trans('admin.dep_name_ar')) !!}
            {!! Form::text('dep_name_ar',$department->dep_name_ar,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('dep_name_en', trans('admin.dep_name_en')) !!}
          {!! Form::text('dep_name_en',$department->dep_name_en,['class'=>'form-control']) !!}
        </div>

        <br/>
        <div class="form-group">
          {!! Form::label('department', trans('admin.department')) !!}
          <div class="clearfix"></div>
          <div id="jstree"></div>
          <input type="hidden" name="parent" class="parent_id" value="{{ $department->parent }}">
          <div class="clearfix"></div>
        </div>
        <br/>


        <div class="form-group">
            {!! Form::label('description', trans('admin.description_ar')) !!}
            {!! Form::textarea('description_ar',$department->description_ar,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('description', trans('admin.description_en')) !!}
          {!! Form::textarea('description_en',$department->description_en,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('keyword', trans('admin.keyword')) !!}
          {!! Form::textarea('keyword',$department->keyword,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('activation', trans('admin.activation')) !!}
          {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$department->active,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          <label for="exampleInputFile">{{ trans('admin.icon') }}</label>
          <div class="input-group">
            <div class="custom-file">
              {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
              {!! Form::file('icon',['class'=>'custom-file-input']) !!}

            </div>
          </div>
          @if(!empty($department->icon))
            <br/>
            <div class="col-md-3 col-sm-12">
            <div class="info-box bg-light">
              <div class="info-box-content">

              <center> <img style="width:auto; height:80px;" src="{{ Storage::url($department->icon) }}" /></center>

              </span></span></div>
            </div>
            </div>
            <br/>
          @endif
        </div>


         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}

    {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>






@endsection
