@extends('admin.index')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        $(document).on('click','.save_and_continue',function(){
         var form_data = $('#product_form').serialize();
        $.ajax({
            url:"{{ aurl('products/'.$product->id) }}",
            dataType: 'json',
            type:'post',
            data: form_data,
            beforeSend: function(){
                $('.loading_save_c').removeClass('hidden');
                $('.validate_message').html('');
                $('.error_message').addClass('hidden');
                $('.success_message').html('').addClass('hidden');

            }, success: function(data){
                if(data.status == true){
                    $('.loading_save_c').addClass('hidden');
                    $('.success_message').html('<h1>'+data.message+'</h1>').removeClass('hidden');
                }

            }, error(response){
                $('.loading_save_c').addClass('hidden');
                var error_li = '';
                $.each(response.responseJSON.errors,function(index,value){
                    error_li += '<li>'+value+'</li>';
                });
                $('.validate_message').html(error_li);
                $('.error_message').removeClass('hidden');

            }

        });
        return false;
    });
});
</script>
@endpush



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('products'),'method'=>'put','files'=>true, 'id'=>'product_form' ]) !!}

    <a href="" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-save"></i></a>
    <a href="" class="btn btn-success save_and_continue">{{trans('admin.save_and_continue')}} <i class="fa fa-save"></i>
    <i class="fa fa-spin fa-spinner loading_save_c hidden"></i></a>
    <a href="" class="btn btn-info copy">{{trans('admin.copy')}} <i class="fa fa-copy"></i></a>
    <a href="" class="btn btn-danger delete" data-toggle="modal" data-target="#delete{{ $product->id }}">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
    <hr />
    <div class="alert alert-danger error_message hidden">
        <ul class="validate_message">

        </ul>
    </div>

    <div class="alert alert-success success_message hidden"></div>
    <hr />



    <ul class="nav nav-tabs" >
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#product_info">{{trans('admin.product_info')}} <i class="fa fa-info"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#product_department">{{trans('admin.product_department')}} <i class="fa fa-list"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#product_setting">{{trans('admin.product_setting')}} <i class="fa fa-cog"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#product_media">{{trans('admin.product_media')}} <i class="fa fa-image"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#product_size_weight">{{trans('admin.product_size_weight')}} <i class="fa fa-info-circle"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#other_data">{{trans('admin.other_data')}} <i class="fa fa-database"></i></a>
    </li>
  </ul>
  <div class="tab-content">
    @include('admin.products.tabs.product_info')
    @include('admin.products.tabs.product_department')
    @include('admin.products.tabs.product_setting')
    @include('admin.products.tabs.product_media')
    @include('admin.products.tabs.product_size_weight')
    @include('admin.products.tabs.other_data')
  </div>
  <hr />

    <a href="" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-save"></i></a>
    <a href="" class="btn btn-success save_and_continue">{{trans('admin.save_and_continue')}} <i class="fa fa-save"></i>
    <i class="fa fa-spin fa-spinner loading_save_c hidden"></i></a>
    <a href="" class="btn btn-info copy">{{trans('admin.copy')}} <i class="fa fa-copy"></i></a>
    <a href="" class="btn btn-danger delete">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>

    {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>

  <div class="modal fade" id="delete{{ $product->id }}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {!! Form::open(['route'=>['products.destroy',$product->id ],'method'=>'delete']) !!}
            <div class="modal-body">
            <p>{{ trans('admin.delete_item',['name'=> $product->title ]) }}  </p>
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

@endsection
