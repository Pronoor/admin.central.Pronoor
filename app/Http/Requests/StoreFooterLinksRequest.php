<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFooterLinksRequest extends FormRequest
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
            'url' => [
                'required', 'unique:footer_links', 'max:50',
            ],
            'content' => [
                'required', 'min:50', 'max:1500'
            ],
        ];
    }

    public function getMenuBarPayload()
    {
        return collect($this->validated())
            ->toArray();
    }
}
