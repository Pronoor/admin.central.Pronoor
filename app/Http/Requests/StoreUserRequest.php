<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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
                'required', 'min:5','max:50'
            ],
            'email' => [
                'required', 'unique:users',
            ],
            'password' => [
                'required',
            ],
            'user_type' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'description' => [
                'max:255'
            ],
        ];
    }
    public function getMenuBarPayload()
    {
        $data = collect($this->validated())->toArray();
        $data['password'] = Hash::make(collect($this->validated())->toArray()['password']);
        return $data;
    }
}
