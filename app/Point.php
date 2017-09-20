<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'giver_id',
        'receiver_id',
        'quantity',
        'reason',
    ];

    /**
    * Get the points received.
    */
    public function userReciver()
    {
        return $this->belongsTo('App\User', 'receiver_id', 'id');
    };

    /**
    * Get the points givered.
    */

    public function userGiver()
    {
        return $this->belongsTo('App\User', 'giver_id', 'id');
    };
}
