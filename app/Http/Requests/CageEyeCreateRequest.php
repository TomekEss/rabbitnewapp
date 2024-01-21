<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CageEyeCreateRequest extends FormRequest
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
            'cage_name' => 'required',
            'eye_number' => 'required',
            'cleaning_date' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'cage_name.required' => 'Wybierz nazwę klatki',
            'eye_number.required' => 'Wpisz numer oczka',
            'cleaning_date' => 'Wpisz datę ostatniego sprzątania',
        ];
    }
}
