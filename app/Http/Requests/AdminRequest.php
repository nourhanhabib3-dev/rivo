<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            "img"=>"required|image|mimes:png,jpg",
            "name"=>"required|string|min:3",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|string|min:6",
            "phone"=>"required|numeric|digits:11|starts_with:010,011,012,015",
            "role"=>"required|in:admin,super admin,manger ",
            "address"=>"required|string"

        ];
    }
}