<?php

namespace App\Http\Requests;

class ProfileRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'                 => ['required', 'string', 'max:255'],
            'first_name'            => ['required', 'string', 'max:255'],
            'last_name'             => ['required', 'string', 'max:255'],
            'middle_name'           => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string',],
            'state'                 => ['required', 'string'],
            'city'                  => ['required'],
            'street_address'        => ['required', 'string'],
        ];
    }
}
