<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'price',
        'bed',
        'bathroom',
        'square',
        'garage',
        'year_built',
        'area',
        'location_id',
        'real_address',
        'latitude',
        'longitude',
        'remodel_year',
        'pool_size',
        'additional_room',
        'amenities',
        'equipment',
        'category_id',
        'photo',
        'embed_video',
        'attributes',
        'type',
        'funding_amount',
        'invest_amount',
        'is_invest',
        'hold_years',
        'min_invest',
        'max_invest',
        'income_distribution',
        'gross_yeild',
        'payment_duration',
        'status',
    ];

    protected $dates = [
        'expire_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function floorplans()
    {
        return $this->hasMany(FloorPlan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlists::class);
    }

    public function buyrents()
    {
        return $this->hasMany(BuyRent::class);
    }

    public function reviews()
    {
        return $this->hasMany(PropertyReview::class);
    }

    public function enquiries()
    {
        return $this->hasMany(PropertyEnquiry::class);
    }

    public function invests()
    {
        return $this->hasMany(Invest::class);
    }

    public function checkFavourite($userId, $propertyId){
        if(Wishlists::whereUserId($userId)->wherePropertyId($propertyId)->exists()){
            return true;
        }

        return false;
    }
}
