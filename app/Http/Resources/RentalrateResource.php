<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentalrateResource extends JsonResource
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
            'car_id' => $this->car_id,
            'rentaltype_id' => $this->rentaltype_id,
            'rentaltype' => $this->rentaltype->name,
            'rate' => $this->rate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
