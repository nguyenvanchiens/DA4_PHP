<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'image'=>'required',
            'originalprice'=>'required|min:0|not_in:0',
            'price'=>'required|min:0|not_in:0',
            'sale_price'=>'lt:price',
            'quantity'=>'required|min:0',
            'cate_id'=>'required',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Tên sản phẩm không được bỏ trống',
            'name.image'=>'Tên sản phẩm không được bỏ trống',
            'originalprice.required'=>'Giá nhập không được bỏ trống',
            'originalprice.min'=>'Giá nhập không được nhỏ hơn 0',
            'price.required'=>'Giá bán không được bỏ trống',
            'price.min'=>'Giá bán không được nhỏ hơn không',
            'sale_price.lt'=>'Giá khuyến mại không được lớn hơn giá bán',
            'quantity.required'=>'Số lượng không được bỏ trống',
            'color.color'=>'Màu sắc không được bỏ trống',
            'color.size'=>'Kích thước không được bỏ trống',
            'cate_id.required'=>'Loại sản phẩm không được bỏ trống',
            'status.required'=>'Status không được bỏ trống',
        ];
    }
}
