<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category;
use App\Model\Product;
use App\Model\product_tag;

class ProductController extends Controller
{
    public function getProductDetail($slug,$id)
    {
        $data['prod_detail'] = Product::find($id);
        $cate_id = $data['prod_detail']->cate_id;
        $data['product_relationship'] = Product::where('cate_id',$cate_id)->whereNotIn('id',[$id])->orderBy('created_at','desc')->take(4)->get();
        return view('fontend.home.product_detail',$data);
    }
}
