<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'number'=>'required|numeric|unique:rest_tables,number,'.$this->table?->id,
            'name'=>'required',
            'branch_id'=>'required',
            'section_id'=>'required',
        ];
    }
}
