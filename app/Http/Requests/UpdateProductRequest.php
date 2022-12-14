<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'unit_price' => 'required|numeric',
            'description' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ];
    }
}
