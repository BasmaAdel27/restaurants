<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        $rules = [
              'name' => 'required|min:2|max:255',
              'email' => 'required|min:2|max:255|unique:users,email,'. $this->restaurant?->id,
              'phone' => 'required',
              'address'=>'required|string'
        ];

        if (!$this->isMethod('PUT'))
            $rules['password'] = 'required|min:8|confirmed';

        return $rules;

    }
}
