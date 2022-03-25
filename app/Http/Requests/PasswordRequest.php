<?php

namespace App\Http\Requests;

class PasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
