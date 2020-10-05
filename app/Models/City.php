<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }
}
