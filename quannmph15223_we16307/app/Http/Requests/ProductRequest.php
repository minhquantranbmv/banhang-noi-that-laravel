<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pro_name' => 'required|min:6|max:50',
            // 'pro_img' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'pro_price' => 'required',
            'pro_amount' => 'required',
            'pro_sale' => 'required',
            'pro_description' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để chống',
            'min' => ' :attribute không được nhỏ hơn :min ký tự',
            'max' => ' :attribute không được nhỏ hơn :max ký tự',
            // 'mimes' => 'phải là ảnh'

        ];
    }

}
