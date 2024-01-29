<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'price_color',
        'plan_type',
        'post_limit',
        'post_duration',
        'attribute',
        'status',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function subscription(){
        return $this->hasMany(UserSubscription::class);
    }

}
