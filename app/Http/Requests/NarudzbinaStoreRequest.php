<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NarudzbinaStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:User,id'],
            'ukupna_cena' => ['required', 'numeric', 'between:-999999.99,999999.99'],
            'status' => ['required', 'string', 'max:50'],
        ];
    }
}
