<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OtherData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use App\File as FileTbl;
use Carbon\Carbon;
use App\DataTables\ProductDatatable;

class ProductsController extends Controller
{

    public function index(ProductDatatable $product)
    {
        return $product->render('admin.products.index',['title'=>trans('admin.products')]);
    }



    public function create()
    {
      $product =  Product::create([
            'title'    => '',
        ]);
        if(!empty ($product))
        {
            return redirect(aurl('products/'.$product->id .'/edit'));
        }

    }
    public function delete_main_image($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        $product->photo = null;
        $product->save();
        return response(['status'=>true],200);

    }

    public function update_product_image($id)
    {
       $product = Product::where('id',$id)->update([
            'photo' => up()->upload([

                    'file'        => 'file',
                    'path'        => 'public/products/'.$id,
                    'upload_type' => 'single',
                    'delete_file' => '',
            ]),
        ]);
        return response(['status'=>true],200); //,'photo'=>$product->photo
    }

    public function store()
    {
       /* $data = $this->validate(request(),
        [
            'name_en' => 'required',
            'name_ar' => 'required',
            'iso'     => 'required',
            'code'    => 'required',
            'logo'    => 'required|'.validate_image(),

        ],[],[

            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'iso'     => trans('admin.iso'),
            'code'    => trans('admin.code'),
            'logo'    => trans('admin.logo'),
        ]

        );

        if(request()->hasFile('logo'))
		{
			$data['logo']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'logo',
				'path'        => 'public/products',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Product::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('products'));*/


    }



    public function show($id)
    {


    }

    public function upload_file($id)
    {
        if(request()->hasFile('file'))
		{
			$fid =up()->upload([

			    //	'new_name'    => '',
				'file'        => 'file',
				'path'        => 'public/products/'.$id,
                'upload_type' => 'files',
                'file_type'   => 'product',
                'relation_id' => $id,
			]);
            return response(['status'=>true,'id'=>$fid],200);
		}
    }

    public function delete_file()
    {
        if(request()->has('id'))
		{
			 up()->delete(request('id'));
		}
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.product',['title'=>trans('admin.create_or_edit.product',['title'=>$product->title]),'product'=>$product]);

    }



    public function update($id)
    {
        $data = $this->validate(request(),
        [
            'title'=>'required',
            'content'=>'required',
            'department_id'=>'required|numeric',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'start_at'=>'required|date',
            'end_at'=>'required|date',
            'start_offer_at'=>'sometimes|nullable|date',
            'end_offer_at'=>'sometimes|nullable|date',
            'price_offer'=>'sometimes|nullable|numeric',
            'status'=>'sometimes|nullable|in:pending,refused,active',
            'reason'=>'sometimes|nullable|numeric',


        ],[],[
            'title' => trans('admin.product_title'),
            'content' => trans('admin.content'),
            'department_id' => trans('admin.department_id'),
            'price' => trans('admin.price'),
            'stock' => trans('admin.stock'),
            'start_at' => trans('admin.start_at'),
            'end_at' => trans('admin.end_at'),
            'start_offer_at' => trans('admin.start_offer_at'),
            'end_offer_at' => trans('admin.end_offer_at'),
            'price_offer' => trans('admin.price_offer'),
            'status' => trans('admin.status'),
            'reason' => trans('admin.reason'),
        ]);
        if(request()->has('input_value') && request()->has('input_key')){
            $i = 0;
            $other_data = '';
            OtherData::where('product_id',$id)->delete();
            foreach(request('input_key') as $key){
                $data_value = !empty(request('input_value')[$i])?request('input_value')[$i]:'';
                OtherData::create([
                    'product_id'=>$id,
                    'data_key'=> $key,
                    'data_value'=> $data_value,
                ]);
                $i++;
            }
            $data['other_data'] = rtrim($other_data,'|');
        }

        Product::where('id',$id)->update($data);
        return response(['status'=>true,'message'=>trans('admin.record_edited')],200);
    }

    public function copy_product($id)
    {
        if(request()->ajax()){
        $relation_data = Product::find($id);
        $copy = Product::find($id)->toArray();
        unset($copy['id']);
        $create = Product::create($copy);
        if(!empty($copy['photo'])){
            $ext = \File::extension($copy['photo']);
            $new_path = 'public/products/'.$create->id.'/'.\Str::random(30).'.'.$ext;
            \Storage::copy($copy['photo'],$new_path);
            $create->photo = $new_path;
            $create->save();
        }

        //otherdata product

            foreach($relation_data->other_data()->get() as $otherdata){

                OtherData::create([
                    'product_id'=>$create->id,
                    'data_key'=> $otherdata->data_key,
                    'data_value'=> $otherdata->data_value,
                ]);
            }

        //$files = FileTbl::where('file_type','product')->where('relation_id',$id)->get();

            foreach($relation_data->files()->get() as $file){
                $hashname = \Str::random(30);
                $ext = \File::extension($file->path);
                $new_path = 'public/products/'.$create->id.'/'.$hashname.'.'.$ext;
                \Storage::copy($file->path,$new_path);
                $add = FileTbl::create([
                    'name' => $file->name,
                    'size' => $file->size,
                    'file' => $hashname,
                    'path' => 'public/products/'.$create->id.'/' .$hashname.'.'.$ext,
                    'mime_type' => $file->mime_type,
                    'file_type'=> 'product',
                    'relation_id' => $create->id,
                ]);
            }


        return response([
            'status'=>true,
            'message'=>trans('admin.product_created'),
            'id'=>$create->id
        ],200);
    }
    else{
        return redirect(aurl('/'));
    }
    }

    public function deleteProduct($id)
    {
        $products = Product::find($id);
        !is_null($products->photo) && Storage::delete($products->photo);
        up()->delete_files($id);
        $products->delete();

    }


    public function destroy($id)
    {
        $this->deleteProduct($id);
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('products'));
    }



    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $this->deleteProduct($id);
             }
        }
        else
        {
            $this->deleteProduct(request('item'));
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('products'));
    }




}
