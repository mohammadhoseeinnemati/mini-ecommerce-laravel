<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'first_name'=>[
                'required',
                'persian_alpha',
                'min:2',
                'max:60'
            ],
            'last_name'=>[
                'required',
                'persian_alpha',
                'min:2',
                'max:60'
            ],
            'email'=>[
                'required',
                'email',
                'unique:App\Models\User,email,'.request()->route()->parameter('userId')
            ],
            'phone'=>[
                'required',
                'ir_mobile:zero',
                'unique:App\Models\User,phone,'.request()->route()->parameter('userId')
            ],
            'password'=>[
                'nullable',
                'min:6',
                'max:100',
            ]

        ];
    }
}
