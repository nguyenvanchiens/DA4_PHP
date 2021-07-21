<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category;
use Illuminate\Support\Str;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $data['cates'] = category::paginate(9);
        $data['count'] = count($data['cates']);
        return view('backend.category.category',$data);
    }
    public function getAddCategory()
    {
        $data['cate'] = category::orderBy('id','ASC')->get();
        return view('backend.category.addcategory',$data);
    }
    public function postAddCategory(AddCategoryRequest $request)
    {
        $cate = new category();
        $cate->name = $request->name;
        $cate->slug = $request->slug;
        $cate->status = $request->status;
        $cate->parent_id = $request->parent_id;
        $cate->save();
        return Redirect::to('admin/category');
    }
    public function getEditCategory($id)
    {
        $data['cate'] = category::find($id);
        $data['cates'] = category::where('parent_id',0)->get();
        return view('backend.category.editcategory',$data);
    }
    public function postEditCategory(AddCategoryRequest $request,$id)
    {
        $cate = category::find($id);
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->status = $request->status;
        $cate->save();
        return Redirect::to('admin/category');
    }
    public function getDelete($id)
    {
        category::destroy($id);
        return Redirect::to('admin/category');
    }
}
