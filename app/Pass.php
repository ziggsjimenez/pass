<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    protected $fillable = ['firstname',
        'middlename',
        'lastname',
        'sex',
        'fulladdress',
        'age',
        'cellphone',
        ];

    public function fullname(){

        return $this->lastname.", ".$this->firstname." ".$this->middlename;
    }
}
