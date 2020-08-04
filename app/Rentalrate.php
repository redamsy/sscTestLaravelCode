<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentalrate extends Model
{
    //
    protected $table="rentalrates";
    protected $fillable=[
        'car_id',
        'rentaltype_id',
        'rate',
    ];
    
    public function rentaltype(){
        return $this->belongsTo('App\Rentaltype');
    }

    public function car(){
        return $this->belongsTo('App\Car');
    }
}
