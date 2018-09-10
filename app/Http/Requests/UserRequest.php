<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->access === 'Admin';
    }

    public function attributes()
    {
        return [
            'name' => __('Name'),
            'password' => __('Password'),
            'email' => __('Email'),
            'access' => __('Access Level'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'password' => 'required|confirmed|min:5|max:191',
            'email' => 'required|email|unique:users|max:191',
            'access' => ['required', Rule::in(['Public', 'User', 'Admin'])],
        ];
    }
}
