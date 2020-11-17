<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function users(){
        return $this->belongsTo('App\user');
    }

    public function pizzas(){
        return $this->belongsTo('App\pizza');
    }   

}
