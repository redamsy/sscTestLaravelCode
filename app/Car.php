<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable=[
        'registration',
        'chassis',
        'year',
        'capacity',
        'isAutomatic',
        'equipment',
        'flaw',
        'mileage',
        'isAvailable',
        'model_id',
        'fuel_id',
        'type_id',
        'color_id',
    ];
    
    public function rentaltypes(){
        return $this->belongsToMany('App\Rentaltype','rentalrates');
    }

    public function rentalrates(){
        return $this->hasMany('App\Rentalrate');
    }

    public function rentals(){
        return $this->belongsToMany('App\Rental','rentals');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function model(){
        return $this->belongsTo('App\Model');
    }

    public function fuel(){
        return $this->belongsTo('App\Fuel');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function color(){
        return $this->belongsTo('App\Color');
    }
}
