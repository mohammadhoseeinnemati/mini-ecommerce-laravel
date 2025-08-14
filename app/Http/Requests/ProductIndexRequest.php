<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $formattedCategories = [];

        foreach ($this->query('category_id') ??[] as $categoryId => $value){
            $formattedCategories[] = $categoryId;
        }

        if(count($formattedCategories) > 0){
            $this->merge([
                'category_id' => $formattedCategories
            ]);
        }



    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>[
                'nullable',
                'array',
            ],
            'category_id.*'=>[
                'nullable',
                'integer',
                'exists:App\Models\Category,id'
            ],
            'exists'=>[
                'nullable',
                'string',
                'in:on'
            ],
            'sort'=>[
                'nullable',
                'string',
                'in:newest,most_wanted,lowest,highest'
            ]
        ];
    }
}
