<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmSale extends FormRequest
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
            'discountcode'=> 'required',
            'price'=>'required',
            'exist'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'discountcode.required'=> 'Chưa điền trường mã giảm giá',
            'price.required'=>'Chưa điền giá',
            'exist.required'=>'Chưa điền thời gian gia hạn phim',
        ];
    }
}
