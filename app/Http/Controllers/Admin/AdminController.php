<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use App\Admin;
use DB;
use Carbon\Carbon;
use Mail;
use App\DataTables\AdminDatatable;

class AdminController extends Controller
{
    public function index(AdminDatatable $admin)
    {

        return $admin->render('admin.admins.index',['title'=>trans('admin.admin')]);
    }



    public function create()
    {

        return view('admin.admins.create',['title'=>trans('admin.create')]);

    }

    public function store()
    {
        $data = $this->validate(request(),
        [
            'name'      => 'required',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:6',
        ],[],[

            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password'),
        ]

        );


        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('admin'));


    }



    public function show($id)
    {


    }


    public function edit(Admin $admin)
    {
        $title=trans('admin.edit');
        return view('admin.admins.edit',compact('admin','title'));

    }


    public function update(Admin $admin, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name'      => 'required',
            'email'     => 'required|email|unique:admins,email,'.$admin->id,
            'password'  => 'sometimes|nullable|min:6',
        ],[],[

            'name'      => trans('admin.name'),
            'email'     => trans('admin.email'),
            'password'  => trans('admin.password'),
        ]

        );

        if(request()->has('password'))
        {
            $data['password'] = bcrypt(request('password'));
        }

        Admin::where('id',$admin->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('admin'));


    }



    public function destroy(Admin $admin)
    {

        $admin->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('admin'));
    }



    public function multi_delete()
    {
        if(is_array(request('item')))
        {
            Admin::destroy(request('item'));
        }
        else
        {
            Admin::find(request('item'))->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('admin'));
    }


    public function login()
    {

        return view('admin.login');
    }



    public function check()
    {
        $remember_me= request('remember_me') ==1 ? true : false ;

        if (admin()->attempt(['email'=>request('email'),'password'=>request('password')],$remember_me))
        {
            return redirect(aurl());
        }
        else
        {
            session()->flash('error',trans('admin.incorrect_info_login'));
            return redirect(aurl('login'));

        }

    }


    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(aurl('login'));
    }



    public function forgot_password()
    {
        return view('admin.forgot_password');
    }



    public function send_password()
    {
        $admin= Admin::Where('email',request('email'))->first();
        if(!empty($admin))
        {
            $token=app('auth.password.broker')->createToken($admin);

            $data=DB::table('password_resets')->insert([

                'email'      => $admin->email,
                'token'      => $token,
                'created_at' => Carbon::now()


            ]);


            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('admin.the_link_reset_sent'));
            return back();
        }
        return back();
    }



    public function reset_password($token)
    {
        $check_token=DB::table('password_resets')
                        ->where('token',$token)
                        ->where('created_at','>',Carbon::now()->subHours(2))
                        ->first();

        if (!empty($check_token))
        {
            return view('admin.reset_password',['data'=> $check_token]);



        }
        else
        {
            return redirect(aurl('forgot/password'));
        }

    }



    public function reset_password_done($token)
    {
       $this->validate(request(),[

        'password'                 =>'required|confirmed',
        'password_confirmation'    =>'required',

       ]);

      $check_token=DB::table('password_resets')
                        ->where('token',$token)
                        ->where('created_at','>',Carbon::now()->subHours(2))
                        ->first();

        if (!empty($check_token))
        {
            $admin= Admin::where('email',$check_token->email)->update([
                   'email'=>$check_token->email,
                   'password'=>bcrypt(request('password'))
                   ]);

            DB::table('password_resets')->where('email',request('email'))->delete();

            admin()->attempt(['email'=>$check_token->email,'password'=>request('password')],true);

            return redirect(aurl());
        }
        else
        {
            return redirect(aurl('forgot/password'));
        }
    }
}
