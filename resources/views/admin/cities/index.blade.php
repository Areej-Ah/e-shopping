@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    
<!--dataTable Variable is render from admin controller index function-->
    {!! Form::open(['id'=>'form_data','url' => aurl('cities/destroy/all'),'method'=>'delete']) !!}
    {!! $dataTable->table(['class'=>'dataTable table table-bordered table-hover'],true) !!}
    {!! Form::close() !!}

    </div>
    <!-- /.card-body -->
  </div>




  <div class="modal fade" id="MultiDelete">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="empty_record hidden">{{ trans('admin.please_check_some_records') }} </p>
          <p class="not_empty_record hidden">{{ trans('admin.ask_delete_item') }} <span class="record_count"></span> ?  </p> 
        </div>
        <div class="modal-footer justify-content-between">
         
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
          <button type="submint" name="del_all" class="btn btn-default del_all not_empty_record hidden">{{ trans('admin.delete') }}</button>
         
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  
  

@push('js')
<script>
delete_all();
</script>
  {!! $dataTable->scripts() !!}
@endpush

@endsection