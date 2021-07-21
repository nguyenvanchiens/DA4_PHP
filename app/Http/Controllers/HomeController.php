<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category;
use App\Model\Slide;
use App\Model\Product;
use App\Model\customer;
use App\Model\order;

class HomeController extends Controller
{
    public function getHome()
    {   
        $data['feature_product'] = Product::where('hot',1)->orderBy('updated_at','desc')->take(6)->get();
        $data['recomments'] = Product::take(6)->get();
        return view('fontend.home.index',$data);
        
    }
    public function searchProduct(Request $request)
    {
        $search = $request->name;
        $data['name_search'] = $request->name;
        $data['prod'] = Product::where('name','like','%'.$search.'%')->get();
        return view('fontend.components.search',$data);
    }
    public function getProfile($id)
    {
        $data['customer'] = customer::find($id);
        return view('fontend.components.profile',$data);
    }
    public function postProfile(Request $request)
    {
        $customer = customer::find($request->id);
        if ($request->name==''||$request->phone==''||$request->address=='') {
            return back();
        }else{
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
            session()->put('customer_name',$request->name);
        }
       
        return back();
    }

   

}
