<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pickupDate' => $this->pickupDate,
            'returnDate' => $this->returnDate,
            'isPaid' => $this->isPaid,
            'price' => $this->price,
            'addCharges' => $this->addCharges,
            'status_id' => $this->status_id,
            'car_id' => $this->car_id,
            'customer_id' => $this->customer_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
