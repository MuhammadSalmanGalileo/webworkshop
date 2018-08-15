<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentPrice extends Model
{
    protected $table = 'rent_prices';

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'inventory_id');
    }
}
