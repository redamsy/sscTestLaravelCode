<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Customer;
use App\Car;
use App\Rentalrate;
use App\Http\Resources\RentalResource;
use Carbon\carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rentals = Rental::all();
        return RentalResource::collection($rentals);
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
        $validatedData = $request->validate([
            'pickupDate' => 'required|date_format:"Y-m-d"',
            'returnDate' => 'required|date_format:"Y-m-d"',
            'pickupTime' => 'required|date_format:H:i:s',
            'returnTime' => 'required|date_format:H:i:s',
            'isPaid' => 'required|boolean',

        ]);
        $car = Car::findOrFail($request->car_id);
        if( Customer::where('id', $request->input('customer_id') )->exists() )
        {   
            if($car->isAvailable==1)
            {
                $date1 = explode("-", $request->pickupDate);
                $date2 = explode("-", $request->pickupDate);
                $time1 = explode(":", $request->pickupTime);
                $time2 = explode(":", $request->returnTime);
                // get price
                $rateH = Rentalrate::where('car_id','=',$car->id)
                    ->where('rentaltype_id','=',1)
                    ->first();
                $rateH = $rateH->rate;
                $rateD = Rentalrate::where('car_id','=',$car->id)
                    ->where('rentaltype_id','=',2)
                    ->first();
                $rateD = $rateD->rate;
                $rateM = Rentalrate::where('car_id','=',$car->id)
                    ->where('rentaltype_id','=',3)
                    ->first();
                $rateM = $rateM->rate;
                $dateA = new DateTime(Carbon::create($date1[0], $date1[1], $date1[2], $time1[0],  $time1[1]));
                $dateB = new DateTime(Carbon::create($date2[0], $date2[1], $date2[2], $time2[0],  $time2[1]));
                $interval = $dateA->diff($dateB);
                $priceH = $interval->h*$rateH;
                $priceD = $interval->d*$rateD;
                $priceM = $interval->m*$rateM;
                $price = $priceH + $priceD + $priceM;
                $rental = Rental::create([
                    "pickupDate" => Carbon::create($date1[0], $date1[1], $date1[2], $time1[0],  $time1[1]),
                    "returnDate" => Carbon::create($date2[0], $date2[1], $date2[2], $time2[0],  $time2[1]),
                    "isPaid" => $request->isPaid,
                    "price" => $price,
                    "customer_id" => $request->customer_id,
                    "car_id" => $request->car_id,
                    "user_id" => Auth::guard('api')->user()->id,
                ]);
                if($rental){
                    $car->isAvailable=false;
                    $car->save();
                    return new RentalResource($rental);
                }
            }
            return response()->json(["message" => "car not Available"], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rental = Rental::findOrFail($id);
        return new RentalResource($rental);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $car = Car::findOrFail($request->car_id);
        $validatedData = $request->validate([
            'pickupDate' => 'required|date_format:"Y-m-d"',
            'returnDate' => 'required|date_format:"Y-m-d"',
            'pickupTime' => 'required|date_format:H:i:s',
            'returnTime' => 'required|date_format:H:i:s',
            'isPaid' => 'required|boolean',

        ]);
        $date1 = explode("-", $request->pickupDate);
        $date2 = explode("-", $request->pickupDate);
        $time1 = explode(":", $request->pickupTime);
        $time2 = explode(":", $request->returnTime);
        // get price
        $rateH = Rentalrate::where('car_id','=',$car->id)
            ->where('rentaltype_id','=',1)
            ->first();
        $rateH = $rateH->rate;
        $rateD = Rentalrate::where('car_id','=',$car->id)
            ->where('rentaltype_id','=',2)
            ->first();
        $rateD = $rateD->rate;
        $rateM = Rentalrate::where('car_id','=',$car->id)
            ->where('rentaltype_id','=',3)
            ->first();
        $rateM = $rateM->rate;
        $dateA = new DateTime(Carbon::create($date1[0], $date1[1], $date1[2], $time1[0],  $time1[1]));
        $dateB = new DateTime(Carbon::create($date2[0], $date2[1], $date2[2], $time2[0],  $time2[1]));
        $interval = $dateA->diff($dateB);
        $priceH = $interval->h*$rateH;
        $priceD = $interval->d*$rateD;
        $priceM = $interval->m*$rateM;
        $price = $priceH + $priceD + $priceM;
        $rental = Rental::findOrFail($request->input('id'));
        $rentalUpdate = Rental::where('id', $rental->id)
            ->update([
                    "pickupDate" => Carbon::create($date1[0], $date1[1], $date1[2], $time1[0],  $time1[1]),
                    "returnDate" => Carbon::create($date2[0], $date2[1], $date2[2], $time2[0],  $time2[1]),
                    'isPaid'=> $request->isPaid,
                    "price" => $price,
                    "addCharges" => $request->addCharges,
                    'status_id'=> $request->status_id,
                    'car_id'=> $request->car_id,
                    'customer_id'=> $request->customer_id
            ]);
            if($request->status_id==2 || $request->status_id==1 || $request->status_id==null)
            {
                $car->isAvailable=true;
                $car->save();
            }
            if($request->status_id==3)
            {
                $car->isAvailable=false;
                $car->save();
            }
                
    
        if($rentalUpdate){
            return new RentalResource($rental);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
        $rental = Rental::findOrFail($id);
        
        if($rental->delete()){
            return response()->json(["message" => "rental deleted"], 201);
        }
    }
}
