<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyReview extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public static function agentRatings($user_id){

        $stars = PropertyReview::when('property_owner_id', function($query) use ($user_id) {
            $query->where('property_owner_id', '=', $user_id);
         })->avg('rate');
         return round($stars,2);
    }

    public static function agentRatingCount($user_id){

        $stars = PropertyReview::when('property_owner_id', function($query) use ($user_id) {
            $query->where('property_owner_id', '=', $user_id);
         })->count();

         return $stars;
    }

    public function propertyReviews($property_id){
        $property = Property::whereId($property_id)->first();

        $countReviews = $property->reviews->sum('rate');
        $review = 0;
        if($countReviews>0){
            $review = $countReviews/$property->reviews->count();
        }

        if($review>0){
            return $review;
        }

        return __('N/A');
    }
}
