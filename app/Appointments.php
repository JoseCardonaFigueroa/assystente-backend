<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointments extends Model
{
    //
    use SoftDeletes;

    public function person()
    {
        return $this->hasOne('App\Person');
    }

    public function disease()
    {
        return $this->hasOne('App\Disease');
    }

    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }
}
