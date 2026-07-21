<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =
    [
        'name',
        'img',
        'count',
        'price',
        'sale',
        'brand',
        'cat_id',
    ];

    public function cat(){
        return $this->belongsTo(cat::class);
    }

    public function images(){
        return $this->hasMany(image::class , 'product_id');
    }

    public function cart(){
        return $this->hasMany(product::class);
    }
}
