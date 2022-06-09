<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id_category', 'name', 'description', 'price', 'image1', 'image2', 'image3', 'stock', 'created_at', 'updated_at'

    ];

    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
}
