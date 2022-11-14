<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'password'=>['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages():array{
        return [
            '*.required'=> 'Поле обязательно',
            'name.max' => 'Не более 255 символов',
            'email.email' => 'Неправильный формат',
            'password.min'=> 'Не менее 8 символов',
            'password_confirmation.same' => 'Пароли не совпадают',
        ];
    }
}
