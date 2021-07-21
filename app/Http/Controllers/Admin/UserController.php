<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Redirect;
use App\User;

class UserController extends Controller
{
    public function getUser()
    {
        $data['uesr'] = User::all();
        return view('backend.user.user',$data);
    }

    public function getAddUser()
    {
        return view('backend.user.adduser');
    }
    public function postAddUser(AddUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return Redirect::to('admin/user');
    }
    public function getEditUser($id)
    {
        $data['user'] = User::find($id);
        return view('backend.user.edituser',$data);
    }
    public function postEditUser(AddUserRequest $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return Redirect('admin/user');
    }
}
