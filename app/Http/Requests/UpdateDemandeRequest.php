<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDemandeRequest extends FormRequest
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
            'Objet' => 'required|string|max:100',
            'Reff' => 'required|string|max:100',
            'Sauvegarder' => 'required|boolean',
            'But' => 'nullable|string|max:255',
            'Date_operation' => 'required|date',
            'id_u' => 'required|exists:userrs,Id_u',
            'Id_emp' => 'required|exists:employes,Id_emp',
        ];
    }
}
