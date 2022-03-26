<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;

class ChangePasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'old_password' => ['required', new MatchOldPassword()],
            'password'     => ['required', 'string', 'min:8']
        ];
    }
}

