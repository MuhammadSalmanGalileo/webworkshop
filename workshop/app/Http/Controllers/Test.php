<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Customer;
use App\Good;
use App\Inventory;
use App\Log;
use App\LogService;
use App\Organization;
use App\RentPrice;

class Test extends Controller
{
    var $data = [
        'nama_orang' => 'M Salman Galileo',
        'header' => ['main' => 'Pickup', 'sub' => 'Halaman untuk pengambilan barang'],
        'sidebar' => [
            [
                'state' => 'active',
                'link' => '#1',
                'fa' => 'fa fa-hand-paper-o',
                'text' => 'Pickup'
            ],
            [
                'state' => '',
                'link' => '#2',
                'fa' => 'fa fa-handshake-o',
                'text' => 'Return'
            ],
            [
                'state' => '',
                'link' => '#3',
                'fa' => 'fa fa-list-alt',
                'text' => 'Log'
            ],
            [
                'state' => '',
                'link' => '#4',
                'fa' => 'fa fa-question-circle',
                'text' => 'Help'
            ],
        ],
    ];

    public function tester()
    {
        return view('pickup', $this->data);
    }

    public function connect()
    {
        $inventories = Inventory::all();
        $customers = Customer::all();
        
        foreach($inventories as $inventory)
        {
            $inventory->categories()->syncWithoutDetaching(range(
                                            rand(1,2),
                                            rand(4,5),
                                            rand(1,2)));
        }


        foreach($customers as $customer)
        {
            $customer->organizations()->syncWithoutDetaching(range(
                                            rand(1,2),
                                            rand(4,5),
                                            rand(1,2)));
        }

        return 'wow';
    }
}
