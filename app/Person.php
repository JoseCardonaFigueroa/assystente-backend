<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'name','name2','last-name','second-last-name',
      'gender', 'curp','marital-status','profession',
      'birthdate','address','phone','marital-status','title'
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
