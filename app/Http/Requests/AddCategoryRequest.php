<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name'=>'unique:category,name',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'tên danh mục đã tồn tại',
            'status.required'=>'không được bỏ trống status'
        ];
    }
}
