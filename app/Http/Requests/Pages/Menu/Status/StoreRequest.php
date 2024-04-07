<?php

namespace App\Http\Requests\Pages\Menu\Status;

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
            'title' => ['required', 'max:255'],
            'info' => ['required'],
            'image' => ['required','file']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле обовʼязкове для заповнення',
            'title.max:255' => 'Це поле може містити до 255 символів',
            'info.required' => 'Це поле обовʼязкове для заповнення',
            'image.required' => 'Це поле обовʼязкове для заповнення',
            'image.file' => 'Це поле повинне містити файл',
        ];
    }
}