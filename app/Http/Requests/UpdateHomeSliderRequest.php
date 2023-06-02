<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateHomeSliderRequest extends FormRequest
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
            'title' => [
                'required','min:5','max:100'
            ],
            'description' => [
                'required','min:15','max:200'
            ],
            'slider_photos' => [
                'required','mimes:jpg',
            ],
        ];
    }
    public function getMenuBarPayload()
    {
        return collect($this->validated())
            ->toArray();
    }
}
