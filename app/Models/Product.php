<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'name', 
        'description',
        'meta_name',
        'meta_description',
        'price',
        'discount',
        'image',
    ];

    function RelationCategory(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
