<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use App\ServiceMetaData;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $services = Service::with('serviceMetas')->get();

        return view('customer-service', compact('services', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $request = $request->all();
        unset($request['_token']);

        foreach ($request as $key => $value) {
            $customer_service = ServiceMetaData::where('customer_id', $customer->id)->where('service_meta_id', $key)->firstOrFail();

            $customer_service_data = $customer_service ?? new ServiceMetaData();
            $customer_service_data->customer_id = $customer->id;
            $customer_service_data->service_meta_id = $key;
            $customer_service_data->value = $value;
            $customer_service_data->save();
        }

        return back()->with('message', 'Customer service added.');
    }
}
