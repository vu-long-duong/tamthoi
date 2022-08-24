<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserprofile extends FormRequest
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
            'name'=> 'required',
            'age' => 'required|max:2',
            'address' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000',
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'=> 'Tên chưa điền',
            'age.required'=> 'Tuổi chưa điền',
            'address.required'=> 'Tên địa chỉ phải có chứ',
            'hinhanh.required' => 'Hình ảnh  đã có đâu, thêm vào đê',

        ];
    }
}
