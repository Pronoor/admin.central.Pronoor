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
                'required', 'min:5','max:200'
            ],
            'url' => [
                'required'
            ],
            'order' => [
                'required', 'integer', 'max:12', 'min:1'
            ],
            'content' => [
                'required','min:15','max:1500'
            ],
        ];
    }

    public function getMenuBarPayload()
    {
        $data = collect($this->validated())->toArray();
        $data['content'] = (collect($this->validated())->toArray()['content']);
        return $data;
    }
}
