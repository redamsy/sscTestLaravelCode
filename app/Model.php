<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Mmodel;

class Model extends Mmodel
{
    //
    protected $fillable=[
        'name',
        'make_id',
    ];

    public function cars(){
        return $this->hasMany('App\Car');
    }

    public function make(){
        return $this->belongsTo('App\Make');
    }
}
