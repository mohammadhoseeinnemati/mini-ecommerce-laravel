<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPostRequest extends FormRequest
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
            'province'=>[
                'required',
                'string',
                'max:50'
            ],

            'city'=>[
                'required',
                'string',
                'max:50'
            ],

            'user_address'=>[
                'required',
                'string',
                'min:3',
                'max:255'
            ],

            'postal_code'=>[
                'required',
                'string',
                'max:10',
                'ir_postal_code'
            ],

            'phone'=>[
                'nullable',
                'string',
                'max:20',
                'ir_phone:true'
            ],

            'description'=>[
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }
}
