<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventory;
use App\RentPrice;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unspace($s)
    {
        //return strng without space, and change space into underscores
        $s = str_replace(' ', '_', $s);
        return $s;
    }

    public function showRentPrice($id)
    {
        //return strng without space, and change space into underscores
        $rent_prices = RentPrice::where('inventory_id',$id)->get();
        $s="";
        foreach($rent_prices as $price)
        {
            if ($price->price_per_3hour != 0)
            {
                $s =    "Harga per 3 jam : Rp. ".number_format($price->price_per_3hour,0,',','.');
            }
            $s= $s."<br> Harga per hari  : Rp. ".number_format($price->price_per_day,0,',','.');
        }
        
        return '<p>'.$s.'</p>';
    }

     public function index()
    {
        $inventories = Inventory::all();
        $data = [
            'title' => 'Catalog',
            'inventories' => $inventories
        ];
        return view('customer/catalog', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
