<?php

namespace App;

//changes from here
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

// to here
use Illuminate\Database\Eloquent\Model;
use App\MerchantSubscriptions;




class Merchant extends Authenticatable implements JWTSubject {

    use Notifiable;
    public function parcels() {
        return $this->hasMany(Parcel::class, 'merchantId', 'id');
    }

    protected $fillable = [
        'password',

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function activeSubscription()
    {
        return $this->hasOne(MerchantSubscriptions::class, 'merchant_id', 'id')
            ->where('is_active', 1)
            ->with('plan');
    }

    // Implement required methods for JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
