<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        return CustomerResource::collection($customers);
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
        Customer::create([
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "image" => $request->image,
            "credentials" => $request->credentials,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::findOrFail($id);
        return new customerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customer = Customer::findOrFail($id);
        $customerUpdate = Customer::where('id', $customer->id)
            ->update([
                    'name'=> $request->name,
                    'contact'=> $request->contact,
                    'address'=> $request->address,
                    'credentials'=> $request->credentials,
            ]);
    
        if($customerUpdate){
            return response()->json(["message" => "customer updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $customer = Customer::findOrFail($id);
        
        if($customer->delete()){
            return response()->json(["message" => "customer deleted"], 201);
        }
    }
}
