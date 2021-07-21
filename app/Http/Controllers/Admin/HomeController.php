<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\customer;
use App\User;
use App\Model\Order;
use Auth;

class HomeController extends Controller
{
    public function getHome()
    {
        $data['customer'] = customer::all();
        $data['user'] = User::all();
        $data['order'] = Order::where('status',0)->get();
        $data['order_success'] = Order::where('payment',1)->where('deleted',0)->get();
        return view('backend.index',$data);
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect('login');
    }
}
