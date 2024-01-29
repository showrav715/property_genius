<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyRent extends Model
{
    use HasFactory;
    protected $dates = [
        'next_rent_time',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
