<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CharacterController;
use App\Inventory;
use App\Log;
use App\Good;

$inventories = Inventory::all();
        
$pickup_time = date_create('2018-01-20 09:00:00'); //get Post
$return_time = date_create('2018-01-21 10:00:00'); //get Post        
$logs = Log::with('Good')->where([['pickup_time', '<=', $return_time],
                   ['prom_return_time', '>=', $pickup_time]])
                   ->get();  
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

?>