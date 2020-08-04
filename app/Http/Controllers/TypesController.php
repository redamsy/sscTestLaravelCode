<?php

namespace App\Http\Controllers;

use App\Type;
use App\Http\Resources\TypeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Type::all();
        return TypeResource::collection($types);
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
        Type::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
        $type = Type::findOrFail($id);
        return new typeResource($type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
        $type = Type::findOrFail($id);
        $typeUpdate = Type::where('id', $type->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($typeUpdate){
            return response()->json(["message" => "type updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
        $type = Type::findOrFail($id);
        
        if($type->delete()){
            return response()->json(["message" => "type deleted"], 201);
        }
    }
}
