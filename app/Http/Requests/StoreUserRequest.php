<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           'email'=>['required','string','email','unique:users'],
           'phone'=>['required','regex:/(0)[0-9]{9}/'],
           'address'=>['required','string','min:5','max:255'],
           'password'=>['required','string','min:4'],
           'password_confirmation'=>['required','string','same:password'],
           'role'=>['required'],
        ];
    }
     public function messages()
    {
        return [
            'required'=>':attribute không được để trống !',
            'min'=>':attribute tối thiểu :min ký tự !',
            'max'=>':attribute tối đa :max ký tự !',
            'string'=>':attribute phải là kiểu chữ !',
            'email'=>':attribute phải đúng định dạng email !',
            'numeric'=>':attribute phải là kiểu số !',
            'same'=>':attribute không trùng khớp !',
            'unique'=>':attribute đã tồn tại !',
            'regex'=>':attribute không đúng định dạng !',
             
        ];
    }
    public function attributes()
    {
        return[
            'name'=>'Tên người dùng',
            'email'=>'Email',
            'phone'=>'Số điện thoại',
            'address'=>'Địa chỉ',
            'password'=>'Mật khẩu',
            'role'=>'Quyền user',
            'password_confirmation'=>'Mật khẩu nhập lại',
        ];
        
    }
}
