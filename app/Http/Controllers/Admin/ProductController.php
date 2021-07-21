<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\category;
use  App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Storage;
use App\Traits\StorageImageTrait;
use App\Model\produt_image;
use App\Model\tags;
use App\Model\product_tag;
use  App\Http\Requests\EditProduct;
use DB;
use App\Model\attributes;
use App\Model\attribute_product;

class ProductController extends Controller
{
    use StorageImageTrait;
    
    public function getProduct()
    {     
        $data['prod'] = Product::paginate(6);  
        $data['count'] = count($data['prod']);


        return view('backend.product.product',$data);
    }
    public function getAddProduct()
    {
        $data['cates'] = category::all();
        $data['attr'] = attributes::all();
        $data['attr_color'] = attributes::where('id',1)->get(); 
        $data['attr_size'] = attributes::where('id',2)->get(); 
        return view('backend.product.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request)
    {
        $dataupload = $this->storageTraiUpload($request,$request->image,forderName:'product');
        $prod = new Product();
        $prod->name = $request->name;
        $prod->slug = $request->slug;
        $prod->originalprice = $request->originalprice;
        $prod->price = $request->price;
        $prod->sale_price = $request->sale_price;
        if(!empty($dataupload)){
            $prod->image = $dataupload['file_name'];
            $prod->image_path = $dataupload['file_path'];
        }        
        $prod->moreimage = '';
        $prod->description = $request->description;
        $prod->quantity = $request->quantity;
        $prod->status = $request->status;
        $prod->hot = $request->hot;
        $prod->cate_id = $request->cate_id;
        $prod->save();
        
        //insert more_image
        if($request->hasFile('image_path')){
            foreach ($request->image_path as $value) {
                $upload_list = $this->storageTraiUploadList($value,forderName:'product');
                $produt_images = new produt_image();
                $produt_images->prod_id=$prod->id;
                $produt_images->image = $upload_list['file_name'];
                $produt_images->name_image = $upload_list['file_path'];
                $produt_images->save();
            }
        }    

        //insert tags
        if(!empty($request->tags)){
            foreach ($request->tags as $tag_item) {
                $tagInsert = tags::firstOrCreate(['name'=>$tag_item]);
                product_tag::create([
                    'prod_id'=>$prod->id,
                    'tag_id'=>$tagInsert->id,
                ]);
            }
        }
        //insert attribute_product
        foreach ($request->color as $item) {
            $attr_color = new attribute_product();
            $attr_color->prod_id = $prod->id;
            $attr_color->attribute_value_id	 = $item;
            $attr_color->save();
        }
        foreach ($request->size as $item) {
            $attr_size = new attribute_product();
            $attr_size->prod_id = $prod->id;
            $attr_size->attribute_value_id = $item;
            $attr_size->save();
        }

        return Redirect::to('admin/product');
    }
    public function getEditProduct($id)
    {       
        $data['prod'] = Product::find($id);
        $data['cates'] = category::all();
        $data['attr'] = attributes::all();
        $data['attr_color'] = attributes::where('id',1)->get(); 
        $data['attr_size'] = attributes::where('id',2)->get(); 
        return view('backend.product.editproduct',$data);
        
    }
    public function postEditProduct(EditProduct $request,$id)
    {
        
        $prod = Product::find($id);
        $prod->name = $request->name;
        $prod->slug = $request->slug;
        $prod->originalprice = $request->originalprice;
        $prod->price = $request->price;
        $prod->sale_price = $request->sale_price;
        $prod->moreimage = '';
        $prod->description = $request->description;
        $prod->quantity = $request->quantity;
        $prod->status = $request->status;
        $prod->hot = $request->hot;
        $prod->cate_id = $request->cate_id;
        if($request->hasFile('image')){
            $dataupload = $this->storageTraiUpload($request,$request->image,forderName:'product');
            $prod->image = $dataupload['file_name'];
            $prod->image_path = $dataupload['file_path'];
        }
        $prod->save();    
           //insert more_image
           if($request->hasFile('image_path')){
            $dele_produt_images = produt_image::where('prod_id',$id)->delete();
            foreach ($request->image_path as $value) {
                $upload_list = $this->storageTraiUploadList($value,forderName:'product');
                $produt_images = new produt_image();            
                $produt_images->prod_id=$id;
                $produt_images->image = $upload_list['file_name'];
                $produt_images->name_image = $upload_list['file_path'];
                $produt_images->save();
            }
        }  
        //insert tags
        if(!empty($request->tags)){
            $dele_tag_product = product_tag::where('prod_id',$id)->delete();
            foreach ($request->tags as $tag_item) {
                $tagInsert = tags::firstOrCreate(['name'=>$tag_item]);
                product_tag::create([
                    'prod_id'=>$prod->id,
                    'tag_id'=>$tagInsert->id,
                ]);
            }
        }   
        foreach ($request->color as $item) {
            $attr_color = new attribute_product();
            $attr_color->prod_id = $prod->id;
            $attr_color->attribute_value_id	 = $item;
            $attr_color->save();
        }
        foreach ($request->size as $item) {
            $attr_size = new attribute_product();
            $attr_size->prod_id = $prod->id;
            $attr_size->attribute_value_id = $item;
            $attr_size->save();
        } 

        return Redirect::to('admin/product');
    }
    public function getDeleteProduct ($id)
    {
        try {
            Product::destroy($id);
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],status:200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function Search(Request $request)
    {
        $search = $request->seach;
        $data['prod'] = Product::where('name','like','%'.$search.'%')->paginate(6);
        return view('backend.product.product',$data);
    }
}
