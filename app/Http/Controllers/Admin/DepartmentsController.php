<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;

class DepartmentsController extends Controller
{

    public function index()
    {
        return view('admin.departments.index',['title'=>trans('admin.departments')]);

    }



    public function create()
    {
      return view('admin.departments.create',['title'=>trans('admin.create')]);
    }


    public function store()
    {
        $data = $this->validate(request(),
        [
            'dep_name_en'        => 'required',
            'dep_name_ar'        => 'required',
            'active'         => 'required',
            'parent'         => 'sometimes|nullable|numeric',
            'description_ar' => 'sometimes|nullable',
            'description_en' => 'sometimes|nullable',
            'keyword'        => 'sometimes|nullable',
            'icon'           => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'dep_name_en'        => trans('admin.dep_name_en'),
            'dep_name_ar'        => trans('admin.dep_name_ar'),
            'active'         => trans('admin.active'),
            'parent'         => trans('admin.parent'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'keyword'        => trans('admin.keyword'),
            'icon'           => trans('admin.icon'),
        ]

        );

        if(request()->hasFile('icon'))
		{
			$data['icon']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'icon',
				'path'        => 'public/departments',
                'upload_type' => 'single',
                'delete_file' => '',
			]);
		}

        Department::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('departments'));


    }



    public function show($id)
    {


    }


    public function edit($id)
    {
        $department= Department::find($id);
        $title=trans('admin.edit');
        return view('admin.departments.edit',compact('department','title'));

    }


    public function update(Department $department, Request $request)
    {
        $data = $this->validate(request(),
        [
            'dep_name_en'        => 'required',
            'dep_name_ar'        => 'required',
            'active'         => 'required',
            'parent'         => 'sometimes|nullable|numeric',
            'description_ar' => 'sometimes|nullable',
            'description_en' => 'sometimes|nullable',
            'keyword'        => 'sometimes|nullable',
            'icon'           => 'sometimes|nullable|'.validate_image(),

        ],[],[

            'dep_name_en'        => trans('admin.dep_name_en'),
            'dep_name_ar'        => trans('admin.dep_name_ar'),
            'active'         => trans('admin.active'),
            'parent'         => trans('admin.parent'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'keyword'        => trans('admin.keyword'),
            'icon'           => trans('admin.icon'),
        ]

        );

        if(request()->hasFile('icon'))
		{
			$data['icon']=up()->upload([

			    //	'new_name'    => '',
				'file'        => 'icon',
				'path'        => 'departments',
                'upload_type' => 'single',
                'delete_file' => Department::find($department->id)->icon
			]);
		}

        Department::where('id',$department->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('departments'));

    }



	public static function delete_parent(Department $department) {

        $department_parent = Department::where('parent', $department->id)->get();

        foreach ($department_parent as $sub)
        {
			self::delete_parent($sub);
			if (!empty($sub->icon)) {
				Storage::has($sub->icon)?Storage::delete($sub->icon):'';
            }

			if (!empty($sub)) {
				$sub->delete();
			}
        }


		if (!empty($department->icon)) {
			Storage::has($department->icon)?Storage::delete($department->icon):'';
        }

		$department->delete();
    }


	public function destroy(Department $department) {
		self::delete_parent($department);
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('departments'));
	}









    public function multi_delete()
    {

        if(is_array(request('item')))
        {
            foreach (request('item') as  $id)
             {
                $department=Department::find($id);
                Storage::delete($department->icon);
                $department->delete();
             }
        }
        else
        {
            $department=Department::find(request('item'));
            Storage::delete($department->icon);
            $department->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('department'));
    }




}
