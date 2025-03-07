<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
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
            'Nom_emp' => 'required|string|max:50',
            'Prenom_emp' => 'required|string|max:50',
            'Id_aff' => 'required|exists:entite_affectations,Id_aff',
        ];
    }
}
