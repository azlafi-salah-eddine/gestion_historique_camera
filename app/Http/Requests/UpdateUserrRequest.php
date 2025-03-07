<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserrRequest extends FormRequest
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
        // Obtention de l'ID de l'utilisateur actuel
        $userId = $this->route('user');

        return [
            'PPR' => 'required|integer|unique:userrs,PPR,' . $userId . ',Id_u',
            'Nom_u' => 'required|string|max:50',
            'Prenom_u' => 'required|string|max:50',
            'role' => 'string|max:10',
            'username' => 'required|string|max:50|unique:userrs,username,' . $userId . ',Id_u',
            'password' => 'nullable|string|max:50',
        ];
    }
}
