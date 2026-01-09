<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProizvodStoreRequest extends FormRequest
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
            'naziv' => ['required', 'string', 'max:150'],
            'opis' => ['required', 'string'],
            'cena' => ['required', 'numeric', 'between:-999999.99,999999.99'],
            'stanje' => ['required', 'integer'],
            'kategorija_id' => ['required', 'integer', 'exists:Kategorija,id'],
        ];
    }
}
