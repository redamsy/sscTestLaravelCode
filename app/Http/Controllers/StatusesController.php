<?php

namespace App\Http\Controllers;

use App\Status;
use App\Http\Resources\StatusResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuss = Status::all();
        return StatusResource::collection($statuss);
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
        Status::create([
            "name" => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
        $status = Status::findOrFail($id);
        return new statusResource($status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
        $status = Status::findOrFail($id);
        $statusUpdate = Status::where('id', $status->id)
            ->update([
                    'name'=> $request->name,
            ]);
    
        if($statusUpdate){
            return response()->json(["message" => "status updated"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
        $status = Status::findOrFail($id);
        
        if($status->delete()){
            return response()->json(["message" => "status deleted"], 201);
        }
    }
}
