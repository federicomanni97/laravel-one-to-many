<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', 'min:3', 'max:255', 'unique:projects' ],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere :min caratteri',
            'name.max' => 'Il nome deve avere :max caratteri',
            'name.unique' => 'Questo nome esiste già'
        ]; 
    }
}
