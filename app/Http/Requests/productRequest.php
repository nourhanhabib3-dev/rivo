<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "img"=>"required|array",
            "img.*"=>"image|mimes:png,jpg,gif,jpeg",
            "name"=>"required|string",
            "price"=>"required|numeric|gt:0",
            "count"=>"required|integer|min:0",
            "sale"=>"required|numeric|",
            "brand"=>"required|string"

        ];
    }
}
