<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }

    public function log()
    {
        return $this->belongsTo('App\Log');
    }
}
