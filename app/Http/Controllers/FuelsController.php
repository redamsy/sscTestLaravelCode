<?php

namespace App\Http\Controllers;

use App\Fuel;
use App\Http\Resources\FuelResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FuelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fuels = Fuel::all();
        return FuelResource::collection($fuels);
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
        Fuel::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
        $fuel = Fuel::findOrFail($id);
        return new fuelResource($fuel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
        $fuel = Fuel::findOrFail($id);
        $fuelUpdate = Fuel::where('id', $fuel->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($fuelUpdate){
            return response()->json(["message" => "fuel updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
        $fuel = Fuel::findOrFail($id);
        
        if($fuel->delete()){
            return response()->json(["message" => "fuel deleted"], 201);
        }
    }
}
