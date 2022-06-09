<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false;
    protected $fillable = ['code', 'discount'];

    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('code', 'LIKE', "%$name%");
    }

    
}
