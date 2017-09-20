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
    * Get the points received.
    */
    public function pointReciver()
    {
        return $this->belongsTo('App\Point', 'id', 'receiver_id');
    };

    /**
    * Get the points givered.
    */

    public function pointGiver()
    {
        return $this->belongsTo('App\Point', 'id', 'giver_id');
    };

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
