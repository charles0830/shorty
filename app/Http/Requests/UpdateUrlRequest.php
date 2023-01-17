<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->ip() === "127.0.0.1";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'real_url' => 'required|url',
        ];
    }

    public function attributes()
    {
        return [
            'real_url' => 'url'
        ];
    }

    public function messages()
    {
        return [
            'real_url.required' => 'Come on! at least give a URL bruh!',
            'real_url.url' => 'Are you sure it\'s a URL?',
        ];
    }
}
