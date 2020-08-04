<?php

namespace App\Http\Controllers;

use App\Car;
use App\Image;
use App\Model;
use App\Fuel;
use App\Type;
use App\Color;
use App\Rentalrate;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        return CarResource::collection($cars);
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
        //return response()->json(["message" => is_array($request->file)], 201);
        $validatedData = $request->validate([
            'registration' => 'required|max:255|string',
            'chassis' => 'required|max:255|string',
            'year' => 'required|integer',
            'capacity' => 'required|integer',
            'isAutomatic' => 'required|boolean',
            'equipment' => 'required||string',
            'flaw' => 'required||string',
            'mileage' => 'required|integer',
            //'author.name' => 'required',

        ]);
        if( Model::where('id', $request->input('model_id') )->exists() &&
            Fuel::where('id', $request->input('fuel_id') )->exists() &&
            Type::where('id', $request->input('type_id') )->exists() &&
            Color::where('id', $request->input('color_id') )->exists() && $request->hasFile('file'))
        {   $car = Car::create([
                "registration" => $request->registration,
                "chassis" => $request->chassis,
                "year" => $request->year,
                "capacity" => $request->capacity,
                "isAutomatic" => $request->isAutomatic,
                "equipment" => $request->equipment,
                "flaw" => $request->flaw,
                "mileage" => $request->mileage,
                "model_id" => $request->model_id,
                "fuel_id" => $request->fuel_id,
                "type_id" => $request->type_id,
                "color_id" => $request->color_id,
            ]);
            if($request->hasFile('file'))
            {   $request->validate([
                'file' => 'required',
                'file.*' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg'
                ]);
                $imgs = $request->file;
                $fileName = '';
                foreach ($imgs as $img) {    
                    if ($img->isValid()) {
                        do{  
                            $extension = $img->getClientOriginalExtension(); // getting image extension
                            $fileName = rand(1,99999999).'.'.$extension; // renaming image//or use time().
                        }while(file_exists("images/" . $fileName));
        
                        $img->move(public_path('images/cars'), $fileName); // uploading file to given path
                        $image = new Image();
                        $image->fileName = $fileName;
                        $image->car_id = $car->id;
                        $image->save();
                    }
                }
            }
            if($car)
            {   $rentalrate1 = Rentalrate::create([
                    "car_id" => $car->id,
                    "rentaltype_id" => 1,
                    "rate" => $request->hourlyRate,
                ]);
                $rentalrate2 = Rentalrate::create([
                    "car_id" => $car->id,
                    "rentaltype_id" => 2,
                    "rate" => $request->dailyRate,
                ]);
                $rentalrate4 = Rentalrate::create([
                    "car_id" => $car->id,
                    "rentaltype_id" => 3,
                    "rate" => $request->monthlyRate,
                ]);
                return new carResource($car);
            }
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = car::findOrFail($id);
        return new carResource($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'registration' => 'required|max:255|string',
            'chassis' => 'required|max:255|string',
            'year' => 'required|integer',
            'capacity' => 'required|integer',
            'isAutomatic' => 'required|boolean',
            'equipment' => 'required||string',
            'flaw' => 'required||string',
            'mileage' => 'required|integer',
            //'author.name' => 'required',

        ]);
        $car = Car::findOrFail($request->input('id'));
        if( Model::where('id', $request->input('model_id') )->exists() &&
            Fuel::where('id', $request->input('fuel_id') )->exists() &&
            Type::where('id', $request->input('type_id') )->exists() &&
            Color::where('id', $request->input('color_id') )->exists() )
        {   $carUpdate = Car::where('id', $car->id)
                ->update([
                    "registration" => $request->registration,
                    "chassis" => $request->chassis,
                    "year" => $request->year,
                    "capacity" => $request->capacity,
                    "isAutomatic" => $request->isAutomatic,
                    "equipment" => $request->equipment,
                    "flaw" => $request->flaw,
                    "mileage" => $request->mileage,
                    "model_id" => $request->model_id,
                    "fuel_id" => $request->fuel_id,
                    "type_id" => $request->type_id,
                    "color_id" => $request->color_id,
                ]); 
            if($carUpdate)
            {   $car = Car::findOrFail($request->input('id'));
                $rentalrateUpdate1 = Rentalrate::where('car_id', $car->id)->where('rentaltype_id', 1)
                ->update([
                    "rate" => $request->hourlyRate,
                ]);
                $rentalrateUpdate2 = Rentalrate::where('car_id', $car->id)->where('rentaltype_id', 2)
                ->update([
                    "rate" => $request->dailyRate,
                ]);
                $rentalrateUpdate3 = Rentalrate::where('car_id', $car->id)->where('rentaltype_id', 3)
                ->update([
                    "rate" => $request->monthlyRate,
                ]);
                return new carResource($car);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $car = Car::findOrFail($id);
        
        if($car->delete()){
            return response()->json(["message" => "car deleted"], 201);
        }
    }
}
