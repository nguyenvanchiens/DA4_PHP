<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\category;
use App\Model\Product;

class CategoryController extends Controller
{
    public function getCategoryDetail($slug,$id)
    {
        $data['prod_cate'] = Product::where('cate_id',$id)->orderBy('created_at','desc')->paginate(9);
        return view('fontend.home.category_detail',$data);
    }
}
