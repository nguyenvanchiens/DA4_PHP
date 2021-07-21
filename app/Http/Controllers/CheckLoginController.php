<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category;
use App\Model\customer;
use App\Http\Requests\AddCustomer;
use Illuminate\Support\Facades\Redirect;
class CheckLoginController extends Controller
{
    public function checkLogin()
    {


        $user = session()->get('customer_id');
        if($user){
            return Redirect::to('cart/checkout');
        }
        return view('fontend.pages.checklogin');
    }
    public function AddCustomer(AddCustomer $request)
    {
        $customer = new customer();
        $customer->name = $request->name;
        $customer->phone = '';
        $customer->address = '';
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->save();
        session()->put('customer_id',$customer->id);
        session()->put('customer_name',$request->name);
        return Redirect::to('/');
    }



    public function Login(Request $request)
    {
        $password = md5($request->password);
        $result = customer::where('email',$request->email)->where('password',$password)->first();
        if($result){
            session()->put('customer_id',$result->id);
            session()->put('customer_name',$result->name);
            return Redirect::to('/');
        }
        else{
            return back()->withInput()->with('error','Tên tài khoản mật khẩu không đúng');
        }

    }
    public function Logout()
    {
        session()->put('customer_id','');
        session()->put('customer_name','');
        return Redirect::to('/');
    }
}
