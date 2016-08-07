<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'txtName' => 'required | unique:products,name',
            'txtPrice' => 'required',
            'fImages' => 'required | mimes:jpg,jpeg,png',
            'fproduct.*' => 'mimes:jpg,jpeg,png',
            'cateID' => 'required'
        ];
    }

    public function messages() {
        return [
            'txtName.required' => 'Vui Lòng Nhập tên product',
            'txtName.unique' => 'product đã tồn tại',
            'txtPrice.required' => 'Vui Lòng Nhập gia',
            'fImages.required' => 'Vui Lòng chọn hình ảnh',
            'fImages.mimes' => 'vui lòng chọn file ảnh đuôi jpg, jpeg, png',
            'fproduct.*.mimes' => 'vui lòng chọn file ảnh đuôi file jpg, jpeg, png',
            'cateID.required' => 'Vui Lòng chọn category',
        ];
    }
}
