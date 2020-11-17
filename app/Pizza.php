<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{   
    protected $fillable = [
        'name', 'image_url', 'price', 'description'
    ];

    public function transaction(){
        return $this->hasOne('app\Transaction');
    }
}
