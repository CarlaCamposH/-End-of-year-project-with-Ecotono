<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = [
        'id_user', 'id_product'

    ];

    public $timestamps = false;
}
