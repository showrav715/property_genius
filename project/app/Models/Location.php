<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'photo',
        'status'
    ];

    public function parent(){
        return $this->belongsTo(Location::class,'parent_id')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }
    public function child(){
        return $this->hasMany(Location::class,'parent_id');
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
