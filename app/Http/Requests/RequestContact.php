<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'ct_name' => 'required|min:3|max:30',
            'ct_email' => 'required|email',
            'ct_phone' => 'required|numeric',
            'ct_title' => 'required',
            'ct_content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ct_name.required' => 'Tên liên hệ không được để trống.',
            'ct_name.min' => 'Chiều dài tên phải trên 3 ký tự.',
            'ct_name.max' => 'Chiều dài tên phải dưới 30 ký tự.',
            'ct_email.required' => 'Email không được để trống!',
            'ct_email.email' => 'Email không đúng định dạng',
            'ct_phone.required' => 'Số điện thoại không được để trống',
            'ct_phone.numeric' => 'Số điện thoại phải ở dạng chữ số.',
            'ct_title.required' => 'Tiêu đề không được để trống.',
            'ct_content.required' => 'Nội dung không được để trống.'
        ];
    }
}
