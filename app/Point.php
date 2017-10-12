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
    * Get the user who received the points.
    */
    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id', 'id');
    }

    /**
    * Get the user who gived the points.
    */
    public function giver()
    {
        return $this->belongsTo('App\User', 'giver_id', 'id');
    }
}
