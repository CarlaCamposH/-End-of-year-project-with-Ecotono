<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Review::create(['id_user' =>'1','id_product'=>'2','puntuacion'=>'4','comentario'=>'Esta muy chulo el diseño']);
        App\Review::create(['id_user' =>'2','id_product'=>'2','puntuacion'=>'5','comentario'=>'Esta muy chulo']);

        App\Review::create(['id_user' =>'1','id_product'=>'1','puntuacion'=>'5','comentario'=>'Esta muy chulo y espectacular']);
        App\Review::create(['id_user' =>'2','id_product'=>'1','puntuacion'=>'3','comentario'=>'Un treh']);

        App\Review::create(['id_user' =>'3','id_product'=>'3','puntuacion'=>'2','comentario'=>'malo']);
        App\Review::create(['id_user' =>'4','id_product'=>'3','puntuacion'=>'1','comentario'=>'Un 1']);

        App\Review::create(['id_user' =>'5','id_product'=>'4','puntuacion'=>'0','comentario'=>'nada que ver']);
        App\Review::create(['id_user' =>'1','id_product'=>'4','puntuacion'=>'1','comentario'=>'por suerte la tela es buena']);

        App\Review::create(['id_user' =>'5','id_product'=>'5','puntuacion'=>'0','comentario'=>'zeroooooooooooo']);
        App\Review::create(['id_user' =>'1','id_product'=>'5','puntuacion'=>'0','comentario'=>'zeroooooooooooo']);

        App\Review::create(['id_user' =>'2','id_product'=>'6','puntuacion'=>'5','comentario'=>'buen diseño me gusto!']);
        App\Review::create(['id_user' =>'1','id_product'=>'6','puntuacion'=>'2','comentario'=>'la tela esta bien pero el producto no es muy bueno']);
        App\Review::create(['id_user' =>'3','id_product'=>'6','puntuacion'=>'4','comentario'=>'un 4 esta muy bien']);
    }
}
