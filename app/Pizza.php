<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function transaction(){
        return $this->hasOne('app\Transaction');
    }
}
