<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMenuBarRequest extends FormRequest
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
                'required',
            ],
            'url' => [
                'required|url|unique:footer_links'
            ],
            'order' => [
                'required', 'integer', 'max:12', 'min:1'
            ],
        ];
    }

    public function getMenuBarPayload()
    {
        return collect($this->validated())
            ->toArray();
    }
}
