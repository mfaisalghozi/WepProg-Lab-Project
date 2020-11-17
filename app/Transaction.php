<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'pizza_id', 'quantity', 'total_price', 'transaction_date'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }

    public function pizza(){
        return $this->belongsTo('App\pizza');
    }   

}
