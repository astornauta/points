<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'birth_date',
        'avatar',
    ];

    /**
    * Get received points.
    */
    public function receivedPoints()
    {
        return $this->hasMany('App\Point', 'receiver_id', 'id');
    }

    /**
    * Get given points.
    */
    public function givenPoints()
    {
        return $this->hasMany('App\Point', 'receiver_id', 'id');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'is_superadmin',
    ];
}
