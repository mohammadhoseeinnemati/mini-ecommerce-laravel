<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name'=>[
                'required',
                'persian_alpha',
                'max:100'
            ],
            'name_en'=>[
                'required',
                'max:100'
            ],
            'price'=>[
                'required',
                'int',
                'min:1000',
                'max:1000000000'
            ],
            'category_id'=>[
                'required',
                'integer',
                'exists:App\Models\Category,id'
            ],
            'discount'=>[
                'required',
                'int',
                'min:1000',
                'max:1000000000'
            ],
            'qty'=>[
                'required',
                'int',
                'min:0',
                'max:1000'
            ],
            'description'=>[
                'nullable',
                'string',
                'max:1000'
            ],
            'images'=>[
                'nullable',
                'array'
            ],
            'images.*'=>[
                'file',
                'mimes:jpg,png,jpeg,webp',
                'max:2048'
            ]

        ];
    }

    public function attributes()
    {
        return[
            'images.*'=> 'تصویر'
        ];
    }
}
