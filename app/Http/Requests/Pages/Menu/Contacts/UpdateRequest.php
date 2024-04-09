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
            'id' => ['required', 'integer', 'exists:contacts,id'],
            'code' => ['required', 'integer'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'schedule' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:contacts,email,' . $this->id],
            'contact_phone' => ['required', 'max:255'],
            'manager' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле обовʼязкове для заповнення',
            'title.integer' => 'Це поле повинне бути числом',
            'phone.required' => 'Це поле обовʼязкове для заповнення',
            'phone.max' => 'Це поле може містити до 255 символів',
            'address.required' => 'Це поле обовʼязкове для заповнення',
            'address.max' => 'Це поле може містити до 255 символів',
            'schedule.required' => 'Це поле обовʼязкове для заповнення',
            'schedule.max' => 'Це поле може містити до 255 символів',
            'email.required' => 'Це поле обовʼязкове для заповнення',
            'email.max' => 'Це поле може містити до 255 символів',
            'email.email' => 'Це поле повинне містити example@example.example',
            'contact_phone.required' => 'Це поле обовʼязкове для заповнення',
            'contact_phone.max' => 'Це поле може містити до 255 символів',
            'manager.required' => 'Це поле обовʼязкове для заповнення',
            'manager.max' => 'Це поле може містити до 255 символів',
        ];
    }
}
