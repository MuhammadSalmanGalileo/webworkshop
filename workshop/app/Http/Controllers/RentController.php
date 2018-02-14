<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Log;
use App\Good;
use App\Inventory;
use App\Customer;
use App\Organization;
use App\CustomerOrganization;


class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'title' => 'Rent'
        ];

        return view('customer/rent', $data);
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
        $customer = new Customer();
        $organization = new Organization();
        $customer_organization = new CustomerOrganization();
        $log = new Log();

        // Status variable
        $customerDidNotExist = false;
        $organizationDidNotExist = false;

        // Check if customer is already exist or not
        if (Customer::where('nim', '=', $request->input('customer_nim'))->first() == null) {
            // Create new customer
            $customer->name = $request->input('customer_name');
            $customer->nim = $request->input('customer_nim');
            $customer->email = $request->input('customer_email');
            $customer->no_tlp = $request->input('customer_tlp');
            $customer->penalty = 0;
            $customer->save();

            $customerDidNotExist = true;
        }

        // Check if organization already exist or not
        if(Organization::where('name', '=', strtolower($request->input('customer_organization')))->first() == null) {
            // Create new organization
            $organization->name = strtolower($request->input('customer_organization'));
            $organization->save();

            $organizationDidNotExist = true;
        }

        // Relate customer_id with organization_id
        if ($customerDidNotExist || $organizationDidNotExist) {
            $customer_temp = Customer::where('nim', '=', $request->input('customer_nim'))->first();
            $organization_temp = Organization::where('name', '=', strtolower($request->input('customer_organization')))->first();

            $customer_organization->customer_id = $customer_temp->id;
            $customer_organization->organization_id = $organization_temp->id;
            $customer_organization->save();
        }

        // Insert rent information into log table
        $log->customer_id = Customer::where('nim', '=', $request->input('customer_nim'))->first()->id;
        $log->pickup_time = $request->input('rent_date').' '.$request->input('rent_hour');
        $log->prom_return_time = $request->input('return_date').' '.$request->input('return_hour');
        $log->status = 'tagged';
        $log->save();

        // Insert inventories information into good table. First get the log id
        $log_id = $log->orderBy('created_at', 'decs')->first()->id;

        // Brute force each inventories in the inventories table
        foreach (Inventory::all() as $single) {
            $input_name = str_replace(' ', '_', $single->name)."_Qty";

            if ($request->input( $input_name ) != 0) {
                $good = new Good();
                $good->inventory_id = $single->id;
                $good->log_id = $log_id;
                $good->qty = $request->input( $input_name );
                $good->save();
            }
        }

        return redirect()->action('RentController@index');
    }

    /**git
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
