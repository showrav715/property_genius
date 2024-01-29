<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

   protected $fillable = [
       'country_id',
       'name',
       'username',
       'photo',
       'zip',
       'skype_name',
       'residency',
       'city',
       'address',
       'phone',
       'fax',
       'email',
       'password',
       'verification_link',
       'affilate_code',
       'is_provider',
       'twofa',
       'status',
       'go',
       'details',
       'kyc_status',
       'kyc_info',
       'kyc_reject_reason',
       'ad_limit',
       'fb_link',
       'twitter_link',
       'instagram_link',
       'linkedin_link',
       'is_agent'
    ];

    protected $dates = [
        'plan_end_date',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function balanceTransfers()
    {
        return $this->hasMany(BalanceTransfer::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction','user_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlists::class);
    }

    public function buyrents()
    {
        return $this->hasMany(BuyRent::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(PropertyReview::class);
    }

    public function invests()
    {
        return $this->hasMany(Invest::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
