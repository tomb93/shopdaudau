<?php

namespace App\Http\Requests\Product;

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
     * @return array
     */
    public function rules()
    {
        return [
            'txtTenSP' => 'required',
            'thumb' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'txtTenSP.required' => 'Tên sản phẩm không được để trống',
            'thumb.required' => 'hình ảnh sản phẩm không được để trống'
        ];
    }
}
