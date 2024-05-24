<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvironmentRequest extends FormRequest
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
            'environment'=>'required|unique:environments,environment|',
            "floor_id"=>"required|"
        ];
    }

    public function messages()
    {
        return [
            'environment.required'=>'El campo numero ambiente es obligatorio, intente de nuevo',
            'environment.unique'=>'El ambiente especificado ya existe, intente otro'
        ];
    }
}
