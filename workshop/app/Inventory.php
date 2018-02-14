<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function price()
    {
        return $this->hasMany('App\RentPrice', 'inventory_id');
    }

    public function good()
    {
        return $this->hasMany('App\Good');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public static function getAvailableInventory($pickup_time, $return_time)
    {
        $inventories = Inventory::all();

        $pickup_time = date_create($pickup_time); //get Post
        $return_time = date_create($return_time); //get Post
        $logs = Log::with('Good')->where([['pickup_time', '<=', $return_time], ['prom_return_time', '>=', $pickup_time]])->get();

        foreach($inventories as $inventory)
        {
            $qty_av[$inventory->id]= $inventory->quantity_ready;
        }

        foreach($logs as $log)
        {
            foreach($log->good as $stuff)
            {
                $qty_av[$stuff->inventory_id] -= $stuff->qty;
            }
        }
        //if $quantity<=0, hide, else show with max number $quantity
        //echo $id.'with'.$quantity.'<br>' ;
        $data = [
            'inventories'=> $inventories,
            'qty_av' => $qty_av
        ];

        return $data;
    }
}
