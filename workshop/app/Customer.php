<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function log()
    {
        return $this->hasMany('App\Log');
    }

    public function organizations()
    {
        return $this->belongsToMany('App\Organization');
    }
}
