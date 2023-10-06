<button type="button" data-toggle="modal" data-target="#delete{{ $id }}"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="delete{{ $id }}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {!! Form::open(['route'=>['videos.destroy',$id],'method'=>'delete']) !!}
            <div class="modal-body">
            <p>{{ trans('admin.delete_item',['title'=> session('lang')=='ar'? $title_ar : $title_en ]) }}  </p>
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
