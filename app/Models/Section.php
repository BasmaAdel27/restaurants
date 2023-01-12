<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory,HasTimestampTrait;

    protected $fillable=['name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
