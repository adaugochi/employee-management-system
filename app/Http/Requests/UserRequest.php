<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name'            => ['required', 'string', 'max:255'],
            'last_name'             => ['required', 'string', 'max:255'],
            'title'                 => ['required', 'string'],
            'salary'                => ['required'],
            'job_title'             => ['required', 'string', 'max:255'],
            'start_date'            => ['required'],
        ];
        //dd($this->request->get('id'));
        if ($this->request->get('id')) {
            $rules['email'] = ['required', 'string', 'email', 'max:255'];
            $rules['international_number'][] = ['required'];
            $rules['phone_number'] = ['required'];
        } else {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $rules['international_number'] = ['required', 'unique:users'];
            $rules['phone_number'] = ['required', 'unique:users'];
        }

        return $rules;
    }
}
