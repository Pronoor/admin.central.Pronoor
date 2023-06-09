<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:5', 'max:100'
            ],
            'description' => [
                'required', 'min:15', 'max:1500'
            ],
            'status' => [
                'required',
            ],
            'assignee' => [
                'required',
            ],
            'deadline' => [
                'required',
            ],
        ];
    }
    
}
