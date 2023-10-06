<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Mail;
use App\DataTables\UsersDatatable;

class UsersController extends Controller
{

    public function index(UsersDatatable $user)
    {

        return $user->render('admin.users.index',['title'=>trans('admin.users')]);
    }



    public function create()
    {

        return view('admin.users.create',['title'=>trans('admin.create')]);

    }

    public function store()
    {
        $data = $this->validate(request(),
        [
            'name'        => 'required',
            'membership'  => 'required|in:user,vendor,company',
            'active'      => 'required|in:1,0',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:6',
        ],[],[

            'name'        => trans('admin.name'),
            'membership'  => trans('admin.membership'),
            'active'     => trans('admin.activation'),
            'email'       => trans('admin.email'),
            'password'    => trans('admin.password'),
        ]

        );


        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('users'));


    }



    public function show($id)
    {


    }


    public function edit(User $user)
    {
        $title=trans('admin.edit');
        return view('admin.users.edit',compact('user','title'));

    }


    public function update(User $user, Request $request)
    {
        $data = $this->validate(request(),
        [
            'name'        => 'required',
            'membership'  => 'required|in:user,vendor,company',
            'membership'  => 'required|in:user,vendor,company',
            'active'      => 'required|in:1,0',
            'email'       => 'required|email|unique:users,email,'.$user->id,
            'password'    => 'sometimes|nullable|min:6',
        ],[],[

            'name'       => trans('admin.name'),
            'membership' => trans('admin.membership'),
            'active'     => trans('admin.activation'),
            'email'      => trans('admin.email'),
            'password'   => trans('admin.password'),
        ]

        );

        if(request()->has('password'))
        {
            $data['password'] = bcrypt(request('password'));
        }

        User::where('id',$user->id)->update($data);
        session()->flash('success',trans('admin.record_edited'));
        return redirect(aurl('users'));


    }



    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }



    public function multi_delete()
    {
        if(is_array(request('item')))
        {
            User::destroy(request('item'));
        }
        else
        {
            User::find(request('item'))->delete();
        }


        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
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
        $admin= User::Where('email',request('email'))->first();
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
            $admin= User::where('email',$check_token->email)->update([
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
