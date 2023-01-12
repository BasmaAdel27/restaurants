<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory,HasTimestampTrait;

    protected $fillable=['first_name','last_name','phone','address','email','birth_date'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
