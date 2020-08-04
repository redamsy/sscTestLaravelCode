<?php

namespace App\Http\Resources;

use App\Image;
use App\Rentalrate;
use App\Http\Resources\ImageResource;
use App\Http\Resources\RentalrateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'key' => $this->id,
            'text' => $this->registration,
            'value' => $this->id,
            'id' => $this->id,
            'registration' => $this->registration,
            'chassis' => $this->chassis,
            'year' => $this->year,
            'capacity' => $this->capacity,
            'isAutomatic' => $this->isAutomatic,
            'equipment' => $this->equipment,
            'flaw' => $this->flaw,
            'mileage' => $this->mileage,
            'isAvailable' => $this->isAvailable,
            'model_id' => $this->model_id,
            'model' => $this->model->name,
            'fuel_id' => $this->fuel_id,
            'fuel' => $this->fuel->name,
            'type_id' => $this->type_id,
            'type' => $this->type->name,
            'color_id' => $this->color_id,
            'color' => $this->color->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'image' => $this->images->first(),
            'rentalrates' => RentalrateResource::collection($this->rentalrates),
            'images' => ImageResource::collection($this->images),
        ];
    }
}
