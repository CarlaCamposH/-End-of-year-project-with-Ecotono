<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(['name' =>'jean','email'=>'jeanumat@gmail.com','password'=>bcrypt('12345678'),'ciudad'=>'Barcelona','Cpostal'=>'08903','calle'=>'Montseny',
        'provincia'=>'Hospitalet','portal'=>'37','piso'=>'4','puerta'=>'3','id_role'=>'1']);

        App\User::create(['name' =>'jesus','email'=>'jesusmega2000@gmail.com','password'=>bcrypt('12345678'),'ciudad'=>'Madrid','Cpostal'=>'08905','calle'=>'Mas',
        'provincia'=>'Llobregat','portal'=>'20','piso'=>'2','puerta'=>'1','bloque'=>'A','id_role'=>'1']);

        App\User::create(['name' =>'carla','email'=>'carla@gmail.com','password'=>bcrypt('12345678'),'ciudad'=>'Elsmonjos','Cpostal'=>'08905','calle'=>'Mas',
        'provincia'=>'Llobregat','portal'=>'20','piso'=>'2','puerta'=>'1','bloque'=>'A','id_role'=>'1']);

        App\User::create(['name' =>'cliente','email'=>'cliente@gmail.com','password'=>bcrypt('12345678'),'ciudad'=>'Madrid','Cpostal'=>'08905','calle'=>'Mas',
        'provincia'=>'Llobregat','portal'=>'20','piso'=>'2','puerta'=>'1','bloque'=>'A','id_role'=>'2']);

        App\User::create(['name' =>'admin','email'=>'admin@gmail.com','password'=>bcrypt('12345678'),'ciudad'=>'Madrid','Cpostal'=>'08905','calle'=>'Mas',
        'provincia'=>'Llobregat','portal'=>'20','piso'=>'2','puerta'=>'1','bloque'=>'A','id_role'=>'1']);
     
     
    }
}
