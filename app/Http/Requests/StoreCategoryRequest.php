<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'slug'=>['required','string'],
            'parent_id'=>['required','numeric'],
            'depth'=>['required','numeric'],
           
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
            'name'=>'Tên danh mục',
            'slug'=>'Đường dẫn danh mục',
            'parent_id'=>'Danh mục cha',
            'depth'=>'Độ sâu danh mục',
        ];
    }
}
