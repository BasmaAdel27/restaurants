<?php

namespace App\Models;

use App\Models\Chat\AdminMessage;
use App\Models\Chat\TrainerMessage;
use App\Models\Country\Country;
use App\Models\Society\Society;
use App\Models\State\State;
use App\Traits\HasAssetsTrait;
use App\Traits\HasTimestampTrait;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use MattDaneshvar\Survey\Models\Entry;
use Spatie\Permission\Traits\HasRoles;
use willvincent\Rateable\Rateable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasTimestampTrait ,HasRoles;

    const ADMIN = 'admin';
    const RESTAURANT = 'restaurant';

    const types = [self::ADMIN, self::RESTAURANT];


    protected $guarded = [];

    protected $hidden = [
          'password',
          'remember_token',
    ];


    protected $casts = [
          'email_verified_at' => 'datetime',
    ];
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('admin') && $this->email == config('permission.admin_user_name');
    }
    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCustomCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->translatedFormat('Y-m-d');
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function tables(){
        return $this->hasMany(RestTable::class,'user_id');
    }

}
