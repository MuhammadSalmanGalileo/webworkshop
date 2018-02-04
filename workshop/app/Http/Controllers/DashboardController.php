<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class DashboardController extends Controller
{
    var $data = [
        'nama_orang' => 'Workshop HME',
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

    public function pickupBarang()
    {
        $this->data['sidebar'][0]['state'] = 'active';
        $this->data['header'] = ['main' => 'Pickup', 'sub' => 'Halaman untuk pengambilan barang'];

        $logs = Log::with(['customer.organizations','good.inventory','service'])->where('status','tagged')->get();
        //return $logs[0];
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
        return $pickup_log[1];
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
        $log = Log::find($request->id);
        //return $log;
        $log->status = 'picked';
        $log->service->pickup_nim = $request->nim;
        $log->save();
        $log->service->save();
        //
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
