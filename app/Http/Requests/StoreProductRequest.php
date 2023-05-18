<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
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
            'category_id' => [
                'required',
            ],
            'name' => [
                'required', 'min:5'
            ],
            'description' => [
                'required', 'min:15',
            ],
            'meta_name' => [
                'required', 'min:5'
            ],
            'meta_description' => [
                'required', 'min:15',
            ],
            'price' => [
                'required', 'integer',
            ],
            'discount' => [
                'required', 'integer',
            ],
            'image' => [
                'required',
            ],
        ];
    }
    public function getMenuBarPayload()
    {
        return collect($this->validated())
            ->toArray();
    }
}
