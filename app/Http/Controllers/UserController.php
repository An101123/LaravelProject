<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getList()
    {
        $user = User::all();
        return view('admin.User.list')->with('user', $user);
    }
    public function getCreate()
    {
        return view('admin.User.create');
    }
    public function postCreate(Request $request)
    {
       $this->validate($request,
       [
        'name'=>'required|min:3',
        'email'=>'required|unique:Users,email',
        'password'=>'required|min:8|max:32',
        'passwordConfirm'=>'required|same:password'
       ],
       [
           'name.required'=>'Name is require!',
           'name.min'=>'Name must be at least three characters long',
           'email.required'=>'Email is require!',
           'email.unique'=>'Email has existed',
           'password.required'=>'Password is require!',
           'password.min'=>'Password must be at least eight characters long',
           'password.max'=>'The largest length of the password is 32 characters',
           'passwordConfirm.required'=>'Password Confirm is required',
           'passwordConfirm.same'=>'Password Confirm is wrong!'
       ]
    );
    $user= new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);

    $user->save();

    return redirect('admin/user/create')->with('notification','Created');
    }

    public function getUpdate($id)
    {
        $user = User::find($id);
        return view('admin.User.update')->with('user', $user);

    }
    public function postUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,
        [
            'name'=>'required|min:3'
           ],
           [
               'name.required'=>'Name is require!',
               'name.min'=>'Name must be at least three characters long'
           ]
    );
    $user->name=$request->name;
    if($request->changPassword == "on"){
        $this->validate($request,
        [
         'password'=>'required|min:8|max:32',
         'passwordConfirm'=>'required|same:password'
        ],
        [
            'password.required'=>'Password is require!',
            'password.min'=>'Password must be at least eight characters long',
            'password.max'=>'The largest length of the password is 32 characters',
            'passwordConfirm.required'=>'Password Confirm is required',
            'passwordConfirm.same'=>'Password Confirm is wrong!'
        ]
     );
     $user->password=bcrypt($request->password);
    }
    $user->save();
    return redirect('admin/user/update/'.$id) ->with('notification','Updated');
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('notification','Deleted');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, 
        [
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'Email is required',
            'password.required'=>'Password is required',
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('admin/status/list');
        }
        else
        {
            return redirect('admin/login')->with('notification','Email of password is incorrect');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}