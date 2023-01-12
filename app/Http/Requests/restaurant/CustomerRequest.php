<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
              'first_name' => 'required|min:2|max:255',
              'last_name' => 'required|min:2|max:255',
              'email' => 'required|min:2|max:255|unique:customers,email,'. $this->customer?->id,
              'phone' => 'required|unique:customers,phone,'. $this->customer?->id,
              'address'=>'required|string',
              'birth_date'=>'nullable'
        ];


    }
}
