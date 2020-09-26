<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Restaurant extends Authenticatable implements JWTSubject {
    
    protected $table = 'restaurants';

    protected $fillable = [
        'name', 'email','password','address','order-price',
        'payment_way','district_id','note','created_at', 'updated_at'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function customerSupport()
    {
        return $this->hasMany('App\Models\CustomerSupport');
    }




    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }


}
