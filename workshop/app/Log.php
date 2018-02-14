<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function service()
    {
        return $this->hasOne('App\LogService', 'log_id');
    }

    public function good()
    {
        return $this->hasMany('App\Good');
    }
}