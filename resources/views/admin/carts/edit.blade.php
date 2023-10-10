@extends('admin.index')

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    {!! Form::open(['url' => aurl('carts/'.$cart->id),'method' => 'put','files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('status', trans('admin.status')) !!}
            {!! Form::select('status', ['1' => trans('admin.paid'), '0' => trans('admin.not_paid')],$cart->status,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('seen', trans('admin.seen')) !!}
            {!! Form::select('seen', ['1' => trans('admin.seen'), '0' => trans('admin.not_seen')],$cart->seen,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::label('products_info', trans('admin.products_info')) !!}
            <table class="table">
                <thead>
                    <tr>
                       <th>{{trans('admin.product_title')}}</th>
                       <th>{{trans('admin.product_quantity')}}</th>
                       <th>{{trans('admin.cost')}}</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($cart->products as $product)
                   <tr>
                     <td>{{$product->title}}</td>
                     <td>{{$product->pivot->quantity}}</td>
                     <td>{{$product->pivot->cost}}</td>
                   </tr>
                   @endforeach
                </tbody>


            </table>
        </div>

        <div class="form-group">
            {!! Form::label('total_price', trans('admin.total_price')) !!}
            {!! Form::text('total_price',$cart->total_price,['class'=>'form-control','placeholder'=>trans('admin.total_price')]) !!}
      </div>

        <div class="form-group">
            {!! Form::label('activation', trans('admin.activation')) !!}
            {!! Form::select('active', ['1' => trans('admin.active'), '0' => trans('admin.inactive')],$cart->active,['class'=>'form-control']) !!}
        </div>


        <br/>



         {!! Form::submit(trans('admin.edit'),['class' =>'btn btn-primary' ]) !!}

    {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
  </div>






@endsection

