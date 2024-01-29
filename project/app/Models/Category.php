<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'status',
        'parent_id',
    ];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }
    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
