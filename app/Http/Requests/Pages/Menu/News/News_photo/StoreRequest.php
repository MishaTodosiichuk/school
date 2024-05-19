<?php

namespace App\Http\Requests\Pages\Menu\News\News_photo;

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
            'news_id' => ['required', 'integer', 'exists:news,id'],
            'news_images'=> ['nullable'],
            'news_files' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'news_id.required' => 'Це поле обовʼязкове для заповнення',
            'news_id.integer' => 'Це поле повинно бути числом',
            'news_id.exists' => 'Це поле повинне бути у базі даних',
        ];
    }
}
