<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'user_id'=>['nullable', 'exists:users,id','unique:cars,user_id'],
        ];
    }

    public function messages():array{
        return [
            'user_id.exists'=>'Пользователь не существует',
            'user_id.unique'=>'У данного пользователя уже есть автомобиль',
        ];
    }
}
