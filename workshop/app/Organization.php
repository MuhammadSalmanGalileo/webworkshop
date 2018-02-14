<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function Customers()
    {
        return $this->belongsToMany('App\Customer');
    }
}
