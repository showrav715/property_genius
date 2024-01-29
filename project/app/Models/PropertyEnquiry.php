<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyEnquiry extends Model
{
    use HasFactory;

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
