<?php

namespace App\Http\Requests\Show;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CreateShowRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|min:2|required',
            'description' => 'string|required',
            'category' => 'string|required',
            'author' => 'string|required',
            'podcast_owner' => 'string|required',
            'email_owner' => 'email|required',
            'copyright' => 'string|required',
        ];
    }

    public function messages()
    {
        return [
            'title' => 'Invalid title',
            'description' => 'Invalid description',
        ];
    }

    /**
     * Format errors
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
