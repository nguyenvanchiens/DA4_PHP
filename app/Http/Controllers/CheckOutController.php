<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\customer;
use App\Model\order;
use App\Model\orderDetail;
use App\Model\Product;

class CheckOutController extends Controller
{
    public function viewOrderCustomer($id)
    {
        $data['Ordernotconfirmed'] = order::orderBy('updated_at','DESC')->where('custom_id',$id)
        ->where('Status',0)
        ->where('check',0)
        ->where('delivery',0)
        ->where('deleted',0)
        ->where('payment',0)
        ->get();
        $data['Orderconfirmed'] = order::orderBy('updated_at','DESC')->where('custom_id',$id)
        ->where('Status',1)
        ->where('check',1)
        ->where('delivery',0)
        ->where('deleted',0)
        ->where('payment',0)
        ->get();
        $data['delivery'] = order::orderBy('updated_at','DESC')->where('custom_id',$id)
        ->where('Status',1)
        ->where('check',1)
        ->where('delivery',1)
        ->where('deleted',0)
        ->where('payment',0)
        ->get();
        $data['success'] = order::orderBy('updated_at','DESC')->where('custom_id',$id)
        ->where('Status',1)
        ->where('check',1)
        ->where('delivery',1)
        ->where('deleted',0)
        ->where('payment',1)
        ->get();
        $data['deleted'] = order::orderBy('updated_at','DESC')->where('custom_id',$id)
        ->where('deleted',1)
        ->get();
       return view('fontend.components.vieworder_customer',$data);
       //dd($data['Ordernotconfirmed']);
    }
    public function deletOrder($id)
    {
        $order = order::find($id);
        $order->deleted = 1;
        $order->save();
        return back();
    }
    public function Repurchase($id)
    {
        $user_id = session()->get('customer_id');
        $order = order::find($id);
        $order_new = new order();
        $order_new->name = $order->name;
        $order_new->email = $order->email;
        $order_new->phone = $order->phone;
        $order_new->address = $order->address;
        $order_new->custom_id = $order->custom_id;
        $order_new->payment=0;
        $order_new->status=0;
        $order_new->deleted=0;
        $order_new->check=0;
        $order_new->delivery=0;
        $order_new->save();
        foreach ($order->child_order as $item) {
            //$prod = Product::find($item->prod_id);
            $order_detail = new orderDetail();
            $order_detail->quantity =  $item->quantity;
            $order_detail->price = $item->price;
            $order_detail->order_id = $order_new->id;
            $order_detail->prod_id = $item->prod_id;
            $order_detail->status = 1;
            $order_detail->save();
        }     
        return back();  
    }
}
