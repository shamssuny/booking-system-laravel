<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    //specify the guard
    protected $guard = "client";

    //relationship with center table
    public function centers(){
        return $this->hasOne(Center::class);
    }

}
