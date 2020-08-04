<?php

namespace App\Http\Controllers;

use App\Color;
use App\Http\Resources\ColorResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::all();
        return ColorResource::collection($colors);
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
        Color::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
        $color = Color::findOrFail($id);
        return new colorResource($color);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
        $color = Color::findOrFail($id);
        $colorUpdate = Color::where('id', $color->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($colorUpdate){
            return response()->json(["message" => "color updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
        
        $color = Color::findOrFail($id);
        
        if($color->delete()){
            return response()->json(["message" => "color deleted"], 201);
        }
    }
}
