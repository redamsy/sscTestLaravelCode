<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable=[
        'name',
    ];

    public function rentals(){
        return $this->belongsToMany('App\Rental','rentals');
    }
}
