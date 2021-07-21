<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category;
use App\Model\Product;
use App\Model\order;
use App\Model\orderDetail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\OrderShipped;
use App\Model\customer;
use Mail;
use App\Model\Cart;

class CartController extends Controller
{

    public function Addtocart($id)
    {
        //session()->flush('cart');//xóa
        $user = session()->get('customer_id');
        if ($user) {
            $prod = Product::find($id);
            $cart = Cart::where('prod_id',$prod->id)->where('customer_id',$user)->get();
                if($cart->count()>0){
                    $carts = Cart::find($cart[0]->id);
                    $carts->prod_quantity+=1;
                    $carts->save();
                }
                else{
                    $new_cart = new Cart();
                    $new_cart->prod_id = $prod->id;
                    $new_cart->prod_name = $prod->name;
                    $new_cart->customer_id = $user;
                    $new_cart->prod_image = $prod->image_path;
                    $new_cart->prod_price = $prod->price;
                    $new_cart->prod_quantity = 1;
                    $new_cart->save();
                }
                return response()->json([
                    'code'=>200,
                    'message'=>'success'
                ],status: 200);
                //dd($cart);
        }
        else{
            return response()->json([
                'code'=>201,
            ],status: 200);
        }
    }
    public function showCart()
    {
       $user = session()->get('customer_id');
       if ($user) {
        $data['cart'] = Cart::where('customer_id',$user)->get();

            return view('fontend.home.cart',$data);
       }
       else{
        return view('fontend.pages.checklogin');
       }

    }
    public function UpdateCart(Request $request)
    {
        if($request->idcart&&$request->quantity){
            $user = session()->get('customer_id');
            $cart_new = Cart::find($request->idcart);
            $cart_new->prod_quantity = $request->quantity;
            $cart_new->save();
            $new_cart['cart'] = Cart::where('customer_id',$user)->get();
            $cartComponent = view('fontend.components.showcart',$new_cart)->render();
            return response()->json([
                'cart_component'=>$cartComponent,
                'code'=>200,
            ],status:200);
        }
    }
    public function DeleteCart(Request $request)
    {
        if(isset($request->id)){
            Cart::destroy($request->id);
            $user = session()->get('customer_id');
            $new_cart['cart'] = Cart::where('customer_id',$user)->get();
            $cartComponent = view('fontend.components.showcart',$new_cart)->render();
            return response()->json([
                'cart_component'=>$cartComponent,
                'code'=>200,
            ],
                status:200);
        }
    }
    public function AddCartDetail(Request $request)
    {
        $user = session()->get('customer_id');
        if ($user) {
            $prod = Product::find($request->id);
            $id = $request->id;
            $cart = Cart::where('prod_id',$prod->id)->where('customer_id',$user)->get();
            if($cart->count()>0){
                $carts = Cart::find($cart[0]->id);
                $carts->prod_quantity+=$request->quantity;
                $carts->save();
            }
            else
            {
                $new_cart = new Cart();
                $new_cart->prod_id = $prod->id;
                $new_cart->prod_name = $prod->name;
                $new_cart->customer_id = $user;
                $new_cart->prod_image = $prod->image_path;
                $new_cart->prod_price = $prod->price;
                $new_cart->prod_quantity = $request->quantity;
                $new_cart->save();
            }
            session()->put('cart',$cart);
            return response()->json([
                'code'=>200,
                'message'=>'success',
            ],status: 200);
        }
        else{
            return response()->json([
                'code'=>201
            ],status: 200);
        }
    }
    public function CheckOut()
    {
        $user = session()->get('customer_id');
        $data['customer'] = customer::find($user);
        $cart = Cart::where('customer_id',$user)->get();
        if ($cart->count()>0) {
            $data['cart'] = Cart::where('customer_id',$user)->get();
            return view('fontend.pages.checkout',$data);
        }
        else{
            return Redirect::to('/');
        }

    }
    public function Payment(Request $request)
    {
        $user = session()->get('customer_id');
        $cart = Cart::where('customer_id',$user)->get();
        if($cart!=null){
        $order = new order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->custom_id = $user;
        $order->payment = 0;
        $order->status = 0;
        $order->deleted=0;
        $order->check = 0;
        $order->delivery=0;
        $total = 0;
        $order->save();
        $array =  array();
        foreach ($cart as $item) {
            $id = $item->prod_id;
            $prod = Product::find($id);
            $prod->quantity -= $item->quantity;
            $order_detail = new orderDetail();
            $order_detail->quantity = $item->prod_quantity;
            $order_detail->price = $item->prod_price;
            $order_detail->order_id = $order->id;
            $order_detail->prod_id = $item->prod_id;
            $order_detail->status = 1;
            array_push($array,$item);
            $order_detail->save();
            $prod->save();
            $total += $item->prod_price*$item->prod_quantity;
            Cart::destroy($item->id);

        }
        $email=[
            'body'=>'Xin chào bạn',
            'name'=>$order->name,
            'image'=>$order->image,
            'order'=>$array,
            'total'=>$total
        ];
            Mail::to($request->email)->send(new OrderShipped($email));
            return Redirect::to('cart/payment_success');
        }
        return back()->withInput()->with('error','Bạn hãy mua hàng trước khi thanh toán');
    }
    public function payment_success()
    {
        return view('fontend.components.payment_success');
    }
}
