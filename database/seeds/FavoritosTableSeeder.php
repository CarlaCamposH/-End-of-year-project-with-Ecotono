<?php

use Illuminate\Database\Seeder;

class FavoritosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Favorito::create(['id_product' =>'1','id_user'=>'2']);
        App\Favorito::create(['id_product' =>'2','id_user'=>'2']);
        App\Favorito::create(['id_product' =>'1','id_user'=>'1']);
    }
}
