<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'fullname' => 'required|min:6|max:50',
            'name' => 'required|min:6|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
            'password_confirm' => 'required|same:password',
            'address' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để chống',
            'min' => ' :attribute không được nhỏ hơn :min ký tự',
            'max' => ' :attribute không được nhỏ hơn :max ký tự',
            'email' => ':attribute phải là email',
            'same' => 'Mật khẩu phải trùng nhau'
        ];
    }

}   
