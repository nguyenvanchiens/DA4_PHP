<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\order;
use App\Model\orderDetail;
use App\Model\Product;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function index()
    {
        $data['order'] = order::orderBy('created_at','DESC')->where('Status',0)
        ->where('check',0)
        ->where('delivery',0)
        ->where('deleted',0)
        ->where('payment',0)
        ->get();
        
        return view('backend.order.list_order',$data);
    }
    public function viewOrder($id)
    {
        $data['order'] = order::find($id);
        return view('backend.order.view_order',$data);
       
    }
    public function orderprocessing($id)
    {
        $order = order::find($id);
        $order->status = 1;
        $order->check=1;
        $order->save();
        return Redirect::to('admin/order/assigned');
    }
    public function Assigned()
    {
        $data['order'] = order::orderBy('created_at','desc')->where('Status',1)
        ->where('check',1)
        ->where('delivery',0)
        ->where('deleted',0)
        ->where('payment',0)->get();
        return view('backend.order.Assigned',$data);
    }
    public function getdelivery()
    {
        $data['order'] = order::orderBy('created_at','desc')->where('Status',1)
        ->where('check',1)
        ->where('delivery',1)
        ->where('deleted',0)
        ->where('payment',0)->get();
        return view('backend.order.delivery',$data);
    }
    public function Delivery($id)
    {
        $order = order::find($id);
        $order->delivery=1;
        $order->save();
        return Redirect::to('admin/order/showdelevery');
    }
    public function succes($id)
    {
        $order = order::find($id);
        $order->payment=1;
        foreach ($order->child_order as $item) {
            $prod = Product::find($item->prod_id);
            $prod->quantity -=$item->quantity;
            $prod->save();
        }
        $order->save();
        return Redirect::to('admin/order/view_order_succes');
    }
    public function showOrderSucces()
    {
        $data['order'] = order::orderBy('created_at','DESC')->where('Status',1)
        ->where('check',1)
        ->where('delivery',1)
        ->where('deleted',0)
        ->where('payment',1)->get();
        return view('backend.order.list_order_SUCCESS',$data);
    }
    public function DeleteOrder($id)
    {
        $order = order::find($id);
        foreach ($order->child_order as $key => $item) {
            $prod = Product::find($item->prod_id);
            $prod->quantity+=$item->quantity;
            $prod->save();
        }
        $order->deleted = 1;
        $order->save();
        return Redirect::to('admin/order');
        
    }
    public function showOrderDeleted()
    {
        $data['order'] = order::orderBy('created_at','DESC')->where('deleted',1)->get();
        return view('backend.order.orderDeleted',$data);
    }

    public function Statistical()
    {
        
        $data['order'] = order::where('payment',1)->paginate(6);
        return view('backend.order.statistical',$data); 
    }
    public function revenueByDay()
    {
        $data = order::where('payment',1)->get();
        $date = Carbon::now()->toDateString();
        $total = 0;
        $totalProduct=0;
        $profit = 0;
        foreach ($data as  $item) {
            if($item->created_at->format('Y-m-d')==$date){
               foreach ($item->child_order as $or_detai) {
                $prod = Product::find($or_detai->prod_id);
                $totalProduct += $prod->originalprice*$or_detai->quantity;
                $total+= $or_detai->quantity*$or_detai->price;
               }
           }
        }
        $profit = $total - $totalProduct;
        return response()->json([
            'code'=>200,
            'message'=>'success',
            'total'=>$total,
            'profit'=>$profit
        ],status: 200);
    }
    public function revenueByMonth()
    {
        $data = order::where('payment',1)->get();
        $month = Carbon::now()->month; //tháng
        $year = Carbon::now()->year; //năm
        $total = 0;
        $totalProduct =0;
        $profit=0;
        foreach ($data as  $item) {
            if($item->created_at->format('Y')==$year && $item->created_at->format('m') == $month){
               foreach ($item->child_order as $or_detai) {
                   $prod = Product::find($or_detai->prod_id);
                   $totalProduct += $prod->originalprice*$or_detai->quantity;
                    $total+= $or_detai->quantity*$or_detai->price;
               }
           }
        }
        $profit = $total-$totalProduct;
        return response()->json([
            'code'=>200,
            'message'=>'success',
            'total'=>$total,
            'profit'=>$profit
        ]);
    }
    public function revenueByYear()
    {
        $data = order::where('payment',1)->get();
        $date = Carbon::now()->year;
        $total = 0;
        $totalProduct=0;
        $profit = 0;
        foreach ($data as  $item) {
            if($item->created_at->format('Y')==$date){
               foreach ($item->child_order as $or_detai) {
                 $prod = Product::find($or_detai->prod_id);
                 $totalProduct += $prod->originalprice*$or_detai->quantity;
                 $total+= $or_detai->quantity*$or_detai->price;
               }
           }
        }
        $profit =$total-$totalProduct;
        return response()->json([
            'code'=>200,
            'message'=>'success',
            'total'=>$total,
            'profit'=>$profit
        ],status: 200);
    }

    public function Calculatorevenue(Request $request)
    {
        $data = order::where('payment',1)->get();
        $date_form = $request->date_from;
        $date_to = $request->date_to;
        $total = 0;
        $totalProduct=0;
        $profit = 0;
        foreach ($data as $item) {
            if(strtotime($item->created_at->format('Y-m-d'))>=strtotime($date_form)&&strtotime($item->created_at->format('d-m-Y'))<=strtotime($date_to)){
                foreach ($item->child_order as $or_detai) {
                    $prod = Product::find($or_detai->prod_id);
                    $totalProduct += $prod->originalprice*$or_detai->quantity;
                    $total+= $or_detai->quantity*$or_detai->price;
                  }
            }
        }
        $profit =$total-$totalProduct;
        return response()->json([
            'code'=>200,
            'total'=>$total,
            'profit'=>$profit,
            'date_from'=>$date_form,
            'date_to'=>$date_to
        ]);
        // $today = date("Y-m-d");
        //     $another_date = "2011-08-16";
        //     if (strtotime($today) > strtotime($another_date)) {
        //     echo "Yesterday";
        //     } else {
        //     echo "Tomorrow";
        //     }
    }
}
