<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>['required','string','min:5','max:255'],
            'category_id'=>['required'],
            'origin_price'=>['required','numeric','min:6'],
            'sale_price'=>['required','numeric','min:6'],
            'content'=>['required','string'],
            'status'=>['required'],
        ];
    }
    public function messages(){

        return [
            'required'=>':attribute không được để trống!',
            'string'=>':attribute phải là kiểu chữ !',
            'min'=>':attribute tối thiểu :min ký tự !',
            'max'=>':attribute tối đa :max ký tự !',
            'numeric'=>':attribute phải là kiểu số !',
        ];
    }

    public function attributes(){
        return [
            'name'=>'Tên sản phẩm',
            'category_id'=>'Tên danh mục',
            'origin_price'=>'Giá gốc',
            'sale_price'=>'Giá bán',
            'content'=>'Mô tả sản phẩm',
            'status'=>'Trạng thái sản phẩm',
        ];
    }

}
