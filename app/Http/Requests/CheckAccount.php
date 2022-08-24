<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckAccount extends FormRequest
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
            'username' => 'required|min:7|max:20',
            'password' => 'required|min:5',
            
        ];
    }
    public function messages()
    {
        
        return[
            'username.required' => 'Tên username chưa nhập',
            'username.min' => 'Tên username nhập phải lớn hơn 7 kí tự',
            'username.max' =>  'Tên username nhập phải nhỏ hơn 20 kí tự',
            'password.require' => 'Mật khẩu chưa nhập',
            'usernam.min' => 'Mật khẩu nhập phải lớn hơn 5 kí tự',

        ];
        
    }
}
