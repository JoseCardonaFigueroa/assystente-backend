<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //
    use SoftDeletes;

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function disease()
    {
        return $this->belongsTo('App\Disease');
    }

    public function phone()
    {
        return $this->belongsTo('App\Phone');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }
}
