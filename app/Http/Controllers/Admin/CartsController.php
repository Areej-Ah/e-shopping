<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
use App\DataTables\CartsDatatable;

class CartsController extends Controller
{

    public function index(CartsDatatable $cart)
    {
        return $cart->render('admin.carts.index',['title'=>trans('admin.carts')]);
    }


    public function show($id)
    {


    }


    public function edit($id)
    {
        $cart = Cart::with('user', 'products')->findOrFail($id);
        $title=trans('admin.edit');
        return view('admin.carts.edit',compact('cart','title'));

    }


    public function update($id, Request $request)
    {
        $cart = Cart::findOrFail($id);

    // Validate the request data
    $request->validate([
        'total_price' => 'required|numeric',
        'seen' => 'required',
        'status' => 'required',
        'active' => 'required',
    ]);

    // Update the cart with the validated data
    $cart->update($request->only(['seen', 'status', 'active']));

    // Redirect or return a response

        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('carts'));

    }



    public function destroy(Cart $cart)
    {
        //Storage::delete($brand->logo);
        $cart->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('carts'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $cart=Cart::find($id);

                $cart->delete();
             }
        }
        else
        {
            $cart=Cart::find(request('item'));

            $cart->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('carts'));
    }




}
