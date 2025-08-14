<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddRequest extends FormRequest
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
            'qty'=>[
                'required',
                'int',
                'min:1',
                'max:5000'
            ],
            'product_id'=>[
                'required',
                'int',
                'exists:App\Models\Product,id'
            ]
        ];
    }

    public function attributes()
    {
        return[
            'qty' => 'موجودی'
        ];
    }
}
