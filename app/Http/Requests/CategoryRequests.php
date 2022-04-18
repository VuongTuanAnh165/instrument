<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'max:5120'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được phép để trống',
            'image.max' => 'Ảnh không quá 5MB'
        ];
    }
}
