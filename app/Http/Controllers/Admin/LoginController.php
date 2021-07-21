<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login.login');
    }
    public function postLogin(Request $request){
        $remember = $request->remember? true : false;
        $arr = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($arr,$remember)){
            return Redirect::to('admin');
        }
        else{
            return back()->withInput()->with('error','Tên tài khoản mật khẩu không đúng');
        }
    }
}
