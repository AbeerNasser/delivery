<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }
}
