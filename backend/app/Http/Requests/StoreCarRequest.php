<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'vin' => ['required', 'max:255'],
            'user_id' => ['nullable', 'unique:cars,user_id'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Поле обязательно',
            'brand.max' => 'Не более 255 символов',
            'model.max' => 'Не более 255 символов',
            'vin.max' => 'Не более 255 символов',
            'user_id.unique' => 'У данного пользователя уже есть автомобиль',
        ];
    }
}
