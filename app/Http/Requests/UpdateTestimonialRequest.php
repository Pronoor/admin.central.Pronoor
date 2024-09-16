<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTestimonialRequest extends FormRequest
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
            'quote' => [
                'required','min:5','max:250'
            ],
            'quotes_given_by' => [
                'required','min:5','max:200'
            ],
            'quotes_given_by_profession' => [
                'required','min:5','max:200'
            ],
            'image' => [
                'image','mimes:jpeg,png,jpg,gif','max:500'
            ],
        ];
    }
    public function getMenuBarPayload()
    {
        return collect($this->validated())
            ->toArray();
    }
}
