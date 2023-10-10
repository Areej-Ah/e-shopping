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



    public function create()
    {
      return view('admin.carts.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'logo'    => 'required|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/brands',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Brand::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('brands'));


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
        'products.*.id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
        'products.*.cost' => 'required|numeric|min:0',
    ]);

    // Update the cart with the validated data
    $cart->update($request->only(['total_price', 'seen', 'status', 'active']));

    // Update the products associated with the cart
    $productsData = $request->input('products', []);
    $cart->products()->sync([]);
    foreach ($productsData as $productData) {
        $product = Product::findOrFail($productData['id']);
        $cart->products()->attach($product, [
            'quantity' => $productData['quantity'],
            'cost' => $productData['cost'],
        ]);
    }

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
                //Storage::delete($brand->logo);
                $cart->delete();
             }
        }
        else
        {
            $cart=Cart::find(request('item'));
           // Storage::delete($brand->logo);
            $cart->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('carts'));
    }




}
