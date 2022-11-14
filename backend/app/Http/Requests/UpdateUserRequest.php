<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required', 'max:255'],
            'email'=>['required', 'email:rfc,dns', 'unique:users,email'],
        ];
    }
    public function messages():array{
        return [
            '*.required'=> 'Поле обязательно',
            'name.max' => 'Не более 255 символов',
            'email.email' => 'Неправильный формат',
        ];
    }
}
