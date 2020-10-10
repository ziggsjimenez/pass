<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printtable extends Model
{
    public function pass(){
        return $this->belongsTo('App\Pass');
    }
}
