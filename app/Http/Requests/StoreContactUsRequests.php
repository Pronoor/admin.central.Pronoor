<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequests extends FormRequest
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
            'first_name' => [
                'required', 'min:5', 'max:255'
            ],
            'last_name' => [
                'required','min:5', 'max:255'
            ],
            'email' => [
                'required', 'email'
            ],
            'message_body' => [
                'required','min:15', 'max:1500'
            ],
        ];
    }
}
