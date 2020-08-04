<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //it's not a many to many table
    protected $fillable=[
        'pickupDate',
        'returnDate',
        'isPaid',
        'price',
        'addCharges',
        'status_id',
        'car_id',
        'customer_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function car(){
        return $this->belongsTo('App\Car');
    }
}
