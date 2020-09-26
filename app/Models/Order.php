<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'phone', 'order_price', 'total_price', 'order_status','delegate_id','restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
    public function delegate()
    {
        return $this->belongsTo('App\Models\Delegate');
    }
}
