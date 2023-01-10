<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestTable extends Model
{
    protected $guarded = [];

    protected $fillable=['number','cost','user_id','date','qr_code'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
