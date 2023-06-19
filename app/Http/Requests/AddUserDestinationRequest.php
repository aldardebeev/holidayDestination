<?php

namespace App\Http\Requests;

use App\Models\Destination;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class AddUserDestinationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'destination_id' => [
                'required',
                'integer',
                "exists:destinations,id",
                Rule::unique('destination_user', 'destination_id')->where(function ($query) {
                    $query->where('user_id', $this->user()->id);
                }),
                function ($attribute, $value, $fail)  {
                    if ($this->user()->destinations()->count() >= 3) {
                        $fail('Пользователь достиг максимального количества избранных мест.');
                    }
                },
            ],
        ];

    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages(): array
    {
        return [
            'destination_id.exists' => 'Такого места не существует',
            'destination_id.unique' => 'Это место уже добавлено',
        ];
    }
}
