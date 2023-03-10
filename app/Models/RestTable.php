<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestTable extends Model
{
    protected $guarded = [];

    protected $fillable=['number','name','qr_code','section_id','branch_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

      public function section(){
        return $this->belongsTo(Section::class);
    }

      public function branch(){
        return $this->belongsTo(Branch::class);
    }



}
