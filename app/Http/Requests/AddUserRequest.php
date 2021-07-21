<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'unique:users,email|email',
            'confirm_password'=>'same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'không được bỏ trống tên',
            'email.unique'=>'email đã tồn tại',
            'email.email'=>'email không đúng định dạng',
            'confirm_password.sam'=>'mật khẩu không khớp'
        ];
    }
}
