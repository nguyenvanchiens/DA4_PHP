<?php
namespace App\Traits;
use Strong;
use Illuminate\Support\Str;
/**
 * 
 */
trait UploadImageSlide
{
    public function upload($request,$image,$folderName)
    {
        if($request->hasFile('image')){//kiểm tra xem người dùng ấn chọn ảnh không
            $fileName = $image->getClientOriginalName();//lấy ra đuôi của ảnh
            $fileNameHash = Str::random(length:20).'.'.$image->getClientOriginalExtension();//mã hóa ảnh bằng hàm random tránh trùng
            $file_path = $request->file('image')->storeAs('public/'.$forderName,$fileNameHash);//lưu đường dẫn file ảnh
            $dataupload = [
                'file_name'=>$fileName,
                'file_path'=>Storage::url($file_path)
            ];
            return $dataupload;
        }
            return null;
    }
}



