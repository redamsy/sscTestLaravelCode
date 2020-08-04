<?php

namespace App\Http\Controllers;

use App\Rentalrate;
use App\Rentaltype;
use App\Car;
use App\Http\Resources\RentalrateResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RentalratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rentalrates = Rentalrate::all();
        return RentalrateResource::collection($rentalrates);
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
        if( Car::where('id', $request->input('car_id') )->exists() &&
            Rentaltype::where('id', $request->input('rentaltype_id') )->exists())
        {   $rentalrate = Rentalrate::create([
                "car_id" => $request->car_id,
                "rentaltype_id" => $request->rentaltype_id,
                "rate" => $request->rate,
            ]);
            if($rentalrate){
                return response()->json(["message" => "rentalrate created"], 201);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rentalrate  $rentalrate
     * @return \Illuminate\Http\Response
     */
    public function show(Rentalrate $rentalrate)
    {
        //
        $rentalrate = Rentalrate::findOrFail($id);
        return new rentalrateResource($rentalrate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rentalrate  $rentalrate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rentalrate $rentalrate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rentalrate  $rentalrate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rentalrate $rentalrate)
    {
        //
        $rentalrate = Rentalrate::findOrFail($id);
        if( Car::where('id', $request->input('car_id') )->exists() &&
            Rentaltype::where('id', $request->input('rentaltype_id') )->exists())
        {   $rentalrateUpdate = Rentalrate::where('id', $rentalrate->id)
                ->update([
                    "car_id" => $request->car_id,
                    "rentaltype_id" => $request->rentaltype_id,
                    "rate" => $request->rate,
                ]);
        
            if($rentalrateUpdate){
                return response()->json(["message" => "rentalrate updated"], 201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rentalrate  $rentalrate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rentalrate $rentalrate)
    {
        //
        $rentalrate = Rentalrate::findOrFail($id);
        
        if($rentalrate->delete()){
            return response()->json(["message" => "rentalrate deleted"], 201);
        }
    }
}
