<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StavkaNarudzbineStoreRequest extends FormRequest
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
            'proizvod_id' => ['required', 'integer', 'exists:Proizvod,id'],
            'narudzbina_id' => ['required', 'integer', 'exists:Narudzbina,id'],
            'kolicina' => ['required', 'integer'],
            'cena' => ['required', 'numeric', 'between:-999999.99,999999.99'],
        ];
    }
}
