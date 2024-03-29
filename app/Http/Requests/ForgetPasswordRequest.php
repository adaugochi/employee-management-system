<?php

namespace App\Http\Requests;


class ForgetPasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required'
        ];
    }
}
