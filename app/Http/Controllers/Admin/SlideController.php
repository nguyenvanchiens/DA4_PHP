<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
use Illuminate\Support\Facades\Redirect;
use App\Traits\StorageImageTrait;

class SlideController extends Controller
{
    use StorageImageTrait;
    public function getSlide()
    {
        $data['slide'] = Slide::paginate(6);
        return view('backend.slide.slide',$data);
    }
    public function getAddSlide()
    {
        return view('backend.slide.addslide');
    }
    public function postAddSlide(Request $request)
    {
        $file = $this->storageTraiUpload($request,$request->image,forderName:'slide');
        $slide = new Slide();
        $slide->name_shop = $request->name_shop;
        $slide->header = $request->header;
        $slide->content = $request->content;
        if(!empty($file)){
            $slide->image = $file['file_path'];
        }       
        $slide->save();
        return Redirect('admin/slide');
    }
    public function getEditSlide($id)
    {
        $data['slide'] = Slide::find($id);
        return view('backend.slide.editslide',$data);
    }
    public function postEditSlide(Request $request,$id)
    {
        $uploadFile = $this->storageTraiUpload($request,$request->image,forderName:'slide');
        $slide = Slide::find($id);
        $slide->name_shop = $request->name_shop;
        $slide->header = $request->header;
        $slide->content = $request->content;
        if($request->hasFile('image')){
            $uploadFile = $this->storageTraiUpload($request,$request->image,forderName:'slide');
            $slide->image = $uploadFile['file_path'];
        }
        $slide->save();     
        return Redirect('admin/slide');
    }
    public function getDelete($id)
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
}
