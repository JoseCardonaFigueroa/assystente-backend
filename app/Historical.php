<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historical extends Model
{
    //
    use SoftDeletes;

    public function appointment()
    {
      return $this->hasOne('App\Appointment');
    }
}
