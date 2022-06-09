<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'direccion_de_envio', 'total_price', 'id_coupon', 'name_user', 'productos', 'estado'
    ];


    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name_user', 'LIKE', "%$name%");
    }

    
}
