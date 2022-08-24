<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'describe' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Tên danh mục chưa điền',
            'describe.required'=> 'Tóm tắt danh mục chưa điền',
            'status.required'=> 'Trạng thái phải có chứ',
        ];
    }
}
