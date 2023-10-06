@extends('admin.index')

@section('content')

@push('js')


<div class="modal fade" id="delete_bootstrap_modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {!! Form::open(['url'=>'','method'=>'delete','id'=>'form_Delete_department']) !!}
            <div class="modal-body">
            <p> {{ trans('admin.ask_delete_department') }} <span id="dep_name"></span> </p>
            </div>
            <div class="modal-footer justify-content-between">

            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
            {!! Form::submit(trans('admin.delete'), ['class'=>'btn btn-default']) !!}
            </div>
        {!! Form::close() !!}

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<script type="text/javascript">
  $(document).ready(function(){

    $('#jstree').jstree({
     "core" : {
        'data' : {!! load_dep() !!},
    "themes" : {
      "variant" : "large"
    }
      },
     "checkbox" : {
      "keep_selected_style" : true
       },
      "plugins" : [ "wholerow" ] //, "checkbox"
     });

  });

  $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    var  name = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
        name.push(data.instance.get_node(data.selected[i]).text);
    }
    $('#form_Delete_department').attr('action','{{ aurl('departments') }}/'+r.join(', '));
    $('#dep_name').text(name.join(', '));
    if(r.join(', ') != '')
    {
      $('.showbtn_control').removeClass('hidden');
      $('.edit_dep').attr('href','{{ aurl('departments') }}/'+r.join(', ')+'/edit');
    }else{
      $('.showbtn_control').addClass('hidden');
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
    <a href="" class="btn btn-info edit_dep showbtn_control hidden " ><i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a>
    <a href="" class="btn btn-danger delete_dep showbtn_control hidden" data-toggle="modal" data-target="#delete_bootstrap_modal"><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</a>



      <div id="jstree"></div>
      <input type="hidden" name="parent" class="parent_id" value="">


    </div>
    <!-- /.card-body -->
  </div>





@endsection
