<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    protected $fillable = ['firstname',
        'middlename',
        'lastname',
        'employer',
        'sex',
        'fulladdress',
        'age',
        'cellphone',
        'batch'
        ];

    public function fullname(){

        return $this->lastname.", ".$this->firstname." ".$this->middlename;
    }
}
