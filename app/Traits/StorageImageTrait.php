<?php
namespace App\Traits;
use Storage;
use Illuminate\Support\Str;
trait StorageImageTrait{
    public function storageTraiUpload($request,$image,$forderName){
            if($request->hasFile('image')){
            $filenameOriginal = $image->getClientOriginalName();//lấy duoodo ảnh
            $fileNameHash = Str::random(length:20).'.'.$image->getClientOriginalExtension();//lưu định dạng ảnh nhưng radom 20 kí tự sau tránh trùng lặp của file ảnh
            $file_path = $request->file('image')->storeAs('public/'.$forderName,$fileNameHash);//lưu ảnh dưới ddinjg dạng public/product/tên ảnh đã mã hóa
            $dataupload = [
                'file_name'=>$filenameOriginal,//lấy ra tên ảnh
                'file_path'=>Storage::url($file_path)//Storage::url là khi lấy ra đường dẫn thì có luôn storage ở đầu
            ];
            return $dataupload;//trả về file name và file_path sau khi mã hóa
        }
        return null;
    }
    public function storageTraiUploadList($file,$forderName){
        $filenameOriginal = $file->getClientOriginalName();
        $fileNameHash = Str::random(length:20).'.'.$file->getClientOriginalExtension();
        $file_path = $file->storeAs('public/'.$forderName,$fileNameHash);
        $dataupload = [
            'file_name'=>$filenameOriginal,
            'file_path'=>Storage::url($file_path)
        ];
        return $dataupload;
}
}