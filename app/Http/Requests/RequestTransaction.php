<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransaction extends FormRequest
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
            'tr_phone' => 'required|numeric',
            'tr_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tr_phone.required' => 'Số điện thoại không được để trống',
            'tr_phone.numeric' => 'Số điện thoại phải ở dạng chữ số.',
            'tr_address.required' => 'Địa chỉ không được để trống.',
        ];
    } 
}
