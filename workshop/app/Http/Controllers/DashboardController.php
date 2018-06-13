<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Good;
use App\Inventory;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    var $data = [
        //'nama_orang' => 'Workshop HME',
        'sidebar' => [
            [
                'state' => '',
                'link' => 'pickup',
                'fa' => 'fa fa-hand-paper-o',
                'text' => 'Pickup'
            ],
            [
                'state' => '',
                'link' => 'return',
                'fa' => 'fa fa-handshake-o',
                'text' => 'Return'
            ],
            [
                'state' => '',
                'link' => 'log',
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

    public function __construct(){
        
        $this->middleware('auth');
        //$this->data['nama_orang'] = Auth::check();
    }

    public function pickupBarang()
    {
       //return Auth::user();
        //$this->data['nama_orang'] = Auth::user()->name;
        $this->data['sidebar'][0]['state'] = 'active';
        $this->data['header'] = ['main' => 'Pickup', 'sub' => 'Halaman untuk pengambilan barang'];

        $logs = Log::with(['customer.organizations','good.inventory','service'])->where('status','tagged')->get();
        //return $logs[0];
        $return_log = array();
        foreach($logs as $key=>$log){
            $return_log[$key]['id'] = $log->id;
            $return_log[$key]['name'] = $log->customer->name;
            $return_log[$key]['hp'] = $log->customer->no_tlp;
            $return_log[$key]['pickup'] = $log->service->pickup_nim;
            $return_log[$key]['org'] = null;//$log->customer->organizations->pluck('name');
            $return_log[$key]['rent'] = null;//$log->good->inventory->name;
            $return_log[$key]['from'] = $log->pickup_time;
            $return_log[$key]['until'] = $log->prom_return_timep;
        }
        $this->data['pickup_log'] = $return_log;

        return view('pickup', $this->data);
        //return $pickup_log[1];
    }

    public function returnBarang()
    {
        $this->data['sidebar'][1]['state'] = 'active';
        $this->data['header'] = ['main' => 'Return', 'sub' => 'Halaman untuk pengembalianbarang'];
        $logs = Log::with(['customer.organizations','good.inventory','service'])->where('status','picked')->get();
        //return $logs[0];
        // ada nama, hp, pickup, 
        //org, rent, until, from
        $return_log = array();
        foreach($logs as $key=>$log){
            $return_log[$key]['id'] = $log->id;
            $return_log[$key]['hp'] = $log->customer->no_tlp;
            $return_log[$key]['name'] = $log->customer->name;
            $return_log[$key]['pickup'] = $log->service->pickup_nim;
            $return_log[$key]['org'] = null;//$log->customer->organizations->pluck('name');
            $return_log[$key]['rent'] = null;//$log->good->inventory->name;
            $return_log[$key]['from'] = $log->pickup_time;
            $return_log[$key]['until'] = $log->prom_return_timep;
        }
        $this->data['return_log'] = $return_log;

        return view('return', $this->data);
    }

    public function logBarang()
    {
        $this->data['sidebar'][2]['state'] = 'active';
        $this->data['header'] = ['main' => 'Log', 'sub' => 'Halaman untuk pendataan peminjaman'];
        //butuh
        // id, nama, status, update
        //pickup, return, org
        //rent, from, until
        $logs = Log::with(['customer.organizations', 'good.inventory', 'service'])->get();
        

        foreach($logs as $key=>$log){
            $logs_data[$key]['id'] = $log->id;
            $logs_data[$key]['name'] = $log->customer->name;
            $logs_data[$key]['status'] = $log->status;
            $logs_data[$key]['update'] = $log->updated_at;
            $logs_data[$key]['pickup'] = $log->service->pickup_nim;
            $logs_data[$key]['return'] = $log->service->return_nim;
            $logs_data[$key]['org'] = null;
            $logs_data[$key]['rent'] = null;
            $logs_data[$key]['from'] = $log->pickup_time;
            $logs_data[$key]['until'] = $log->prom_return_time;
        }
        $this->data['logs'] = $logs_data;

        return view('log', $this->data);
    }

    public function pickupPost(Request $request){
        //return $request->id;
        $log = Log::find($request->id);
        //return $log;
        $log->status = 'picked';
        $log->service->pickup_nim = $request->nim;
        $log->save();
        $log->service->save();
        return redirect()->route('pickup');
    }

    public function returnPost(Request $request){
        //return $request;    
        $log = Log::find($request->id);
        //return $log;
        //return $log;
        $log->status = 'returned';
        //return $request->nim;
        $log->service->return_nim = $request->nim;
       // return $log->service->return_nim;
        $log->save();
        $log->service->save();
        //return $log;
        return redirect()->route('return');
    }

    public function tes(){
        $this->data['sidebar'][0]['state'] = 'active';
        $this->data['header'] = ['main' => 'Pickup', 'sub' => 'Halaman untuk pengambilan barang'];
        $this->data['log'] = [
            'name' => 'Muhammad Salman Galileo',
            'waktu' => '2000/01/01 00:00:00 - 2000/01/01 00:00:00',
            'listLog' => [
                'Halogen' => [1,3],
                'Proyektor' => [2,4],
                'Layar' => [3,5],
                'Mixer' => [4,5]
            ]
        ];
        return view('update', $this->data);
    }

    public function aaa(Request $request){
        //return $request;
        $items = $request->except(['_token']);
        return array_keys($items);
    }

    public function seeItemStatus(Request $request){
        $this->data['sidebar'][0]['state'] = 'active';
        $this->data['header'] = ['main' => 'Pickup', 'sub' => 'Halaman untuk pengambilan barang'];
        $id = $request->id;
        $log = Log::with(['good.inventory','customer'])->where('id',$id)->get();
        $log = $log[0];
        //foreach($logs as $key=>$log){
        $order_data['name'] = $log->customer->name;
        $order_data['waktu'] = $log->pickup_time;
        foreach($log->good as $goods){

            $namabarang = $goods->inventory->name;
             
            $jumlahpinjam= $goods->qty;
            $jumlahada = $goods->inventory->quantity_ready;
            $id_barang = $goods->id;
            $good_table[$namabarang] = array($jumlahpinjam,$jumlahada, $id_barang);
        }
        $order_data['listLog'] = $good_table;
        $order_data['id'] = $id;
        //}
        $this->data['log'] = $order_data;
        return view('update',$this->data);
    }

    public function update(Request $request){
        //return $request;
        $items = $request->except(['_token','id']);
        $items_array = array_keys($items);
        $id = $request->id;
        
        foreach($items_array as $item){
            $target_qty = $items[$item];
            $to_change = Good::find($item);
            $qty_available = $to_change->inventory->quantity_ready;
            $curr_qty = $to_change->qty;
            if($target_qty <= $qty_available){
                $to_change->qty = $target_qty;
                $to_change->inventory->quantity_ready = $qty_available + $curr_qty - $target_qty;
                $to_change->save();
                $to_change->inventory->save();
            }


        }
        /*     
            $qty_available = $item->inventory->quantity_ready;
            $target_qty = $items[$key];
            $curr_qty = $item->qty;
            if($target_qty <= $qty_available){
                $item->qty = 69;
                $item->inventory->quantity_ready = $qty_available + $curr_qty - $target_qty;
                $item->save();
                $item->inventory->save();
            }else{

            }
        }
         */
        return redirect()->route('pickup');
        
    }

    public function logoutAdmin(){
        Auth::logout();
        return redirect()->route('pickup');
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
