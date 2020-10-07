<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function delegates()
    {
        return $this->hasMany('App\Models\Delegate');
    }
}
