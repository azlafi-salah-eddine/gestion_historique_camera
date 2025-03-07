<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserrRequest extends FormRequest
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
            'PPR' => 'required|integer|unique:userrs,PPR',
            'Nom_u' => 'required|string|max:50',
            'Prenom_u' => 'required|string|max:50',
            'role' => 'string|in:admin,user',
            'username' => 'required|string|max:50|unique:userrs,username',
            'password' => 'required|string|max:50',
        ];
    }
}
