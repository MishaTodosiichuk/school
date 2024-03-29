<?php

namespace App\Http\Requests\Pages\Menu\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'code' => ['required', 'integer'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'schedule' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'contact_phone' => ['required', 'max:255'],
            'manager' => ['required', 'max:255'],
        ];
    }
}
