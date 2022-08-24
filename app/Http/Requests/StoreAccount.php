<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreAccount extends FormRequest
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
            'email' => 'required|email|unique:accounts',
            'username' => 'required|unique:accounts|min:7|max:20',
            'password' => 'required|min:5',
            
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Tên danh mục đã tồn tại',
            'email.required' => 'Tên email chưa nhập',
            'username.required' => 'Tên username chưa nhập',
            'username.unique' => 'Tên username đã tồn tại',
            'username.min' => 'Tên username nhập phải lớn hơn 7 kí tự',
            'username.max' =>  'Tên username nhập phải nhỏ hơn 20 kí tự',
            'password.require' => 'Mật khẩu chưa nhập',
            'usernam.min' => 'Mật khẩu nhập phải lớn hơn 5 kí tự',
        ];
    }
}
