<?php

namespace App\Http\Controllers;

use App\Rentaltype;
use App\Http\Resources\RentaltypeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RentaltypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rentaltypes = Rentaltype::all();
        return RentaltypeResource::collection($rentaltypes);
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
        Rentaltype::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rentaltype  $rentaltype
     * @return \Illuminate\Http\Response
     */
    public function show(Rentaltype $rentaltype)
    {
        //
        $rentaltype = Rentaltype::findOrFail($id);
        return new rentaltypeResource($rentaltype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rentaltype  $rentaltype
     * @return \Illuminate\Http\Response
     */
    public function edit(Rentaltype $rentaltype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rentaltype  $rentaltype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rentaltype $rentaltype)
    {
        //
        $rentaltype = Rentaltype::findOrFail($id);
        $rentaltypeUpdate = Rentaltype::where('id', $rentaltype->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($rentaltypeUpdate){
            return response()->json(["message" => "rentaltype updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rentaltype  $rentaltype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rentaltype $rentaltype)
    {
        //
        $rentaltype = Rentaltype::findOrFail($id);
        
        if($rentaltype->delete()){
            return response()->json(["message" => "rentaltype deleted"], 201);
        }
    }
}
