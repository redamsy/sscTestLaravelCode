<?php

namespace App\Http\Controllers;

use App\Model;
use App\Make;
use App\Http\Resources\ModelResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $models = Model::all();
        return ModelResource::collection($models);
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
        if( Make::where('id', $request->input('make_id') )->exists() )
        {   $model = Model::create([
                "name" => $request->name,
                'make_id'=> $request->make_id,
            ]);
            if($model){
                return response()->json(["message" => "model created"], 201);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        //
        $model = Model::findOrFail($id);
        return new modelResource($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        //
        $model = Model::findOrFail($id);
        if( Make::where('id', $request->input('make_id') )->exists() )
        {   $modelUpdate = Model::where('id', $model->id)
                ->update([
                        'name'=> $request->name,
                        'make_id'=> $request->make_id,
                ]);
        
            if($modelUpdate){
                return response()->json(["message" => "model updated"], 201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        //
        $model = Model::findOrFail($id);
        
        if($model->delete()){
            return response()->json(["message" => "model deleted"], 201);
        }
    }
}
