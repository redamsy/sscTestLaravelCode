<?php

namespace App\Http\Controllers;

use App\Make;
use App\Http\Resources\MakeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $makes = Make::all();
        return MakeResource::collection($makes);
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
        Make::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function show(Make $make)
    {
        //
        $make = Make::findOrFail($id);
        return new makeResource($make);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit(Make $make)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Make $make)
    {
        //
        $make = Make::findOrFail($id);
        $makeUpdate = Make::where('id', $make->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($makeUpdate){
            return response()->json(["message" => "make updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy(Make $make)
    {
        //
        $make = Make::findOrFail($id);
        
        if($make->delete()){
            return response()->json(["message" => "make deleted"], 201);
        }
    }
}
