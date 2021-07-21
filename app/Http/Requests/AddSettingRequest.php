<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'config_key'=>'required|unique:settings,config_key',
            'config_value'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'config_key.required'=>'Không được để trống config_key',
            'config_key.unique'=>'config_key đã tồn tại',
            'config_value.required'=>'config_value không được bỏ trống',
        ];
    }
}
