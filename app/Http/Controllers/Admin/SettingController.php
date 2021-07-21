<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddSettingRequest;
use Illuminate\Support\Facades\Redirect;
use App\Model\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::latest()->paginate(5);
        return view('backend.setting.setting',$data);
    }
    public function getaddsetting()
    {
        return view('backend.setting.addsetting');
    }
    public function postaddsetting(AddSettingRequest $request)
    {
        $setting = new Setting();
        $setting->config_key=$request->config_key;
        $setting->config_value=$request->config_value;
        $setting->save();
        return Redirect::to('admin/setting');
    }
    public function geteditsetting($id)
    {
        $data['setting'] = setting::find($id);
        return view('backend.setting.editsetting',$data);
    }
    public function posteditsetting(AddSettingRequest $request,$id)
    {
        $setting = Setting::find($id);
        $setting->config_key=$request->config_key;
        $setting->config_value=$request->config_value;
        $setting->save();
        return Redirect::to('admin/setting');
    }
    public function getDelete($id)
    {
        try {
            Setting::destroy($id);
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],status:200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
