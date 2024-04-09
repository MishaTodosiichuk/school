<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user' => ['required', 'max:255'],
            'email' => ['required'],
            'phone' => ['required', 'min:10'],
            'text' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'Це поле обовʼязкове для заповнення',
            'user.max' => 'Це поле може містити до 255 символів',
            'email.required' => 'Це поле обовʼязкове для заповнення',
            'email.email' => 'Це поле повинне містити example@example.example',
            'phone.required' => 'Це поле обовʼязкове для заповнення',
            'phone.min' => 'Це поле може містити 10 і більше символів',
            'phone.max' => 'Це поле може містити до 255 символів',
            'text.required' => 'Це поле обовʼязкове для заповнення',

        ];
    }
}
