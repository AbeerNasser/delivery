<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CustomerSupport extends Model
{
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
