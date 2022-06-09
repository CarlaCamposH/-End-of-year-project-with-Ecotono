<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsShirtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Product::create([
            'id_category' => '1', 
            'name' => 'Camiseta Verde Eco',
            'description' => 'Camiseta de color verde, tinta utilizada ecologica',
            'price' => 15.9,
            'stock' => 10,
            'image1' => 'verde1.jpg',
            'image2' => 'verde2.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        App\Product::create([
            'id_category' => '1',
             'name' => 'Camiseta purpura Eco',
            'description' => 'Camiseta de color purpura, tinta utilizada ecologica ',
            'price' => 21.9,
            'stock' => 10,
            'image1' => 'lila1.jpg',
            'image2' => 'lila2.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        App\Product::create([
            'id_category' => '1',
             'name' => 'Camiseta Gris Eco',
            'description' => 'Camiseta de color gris, tinta utilizada ecologica ',
            'price' => 21.9,
            'stock' => 10,
            'image1' => 'gris1.jpg',
            'image2' => 'gris2.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        App\Product::create([
            'id_category' => '2', 
            'name' => 'Camiseta con Estampado Espiral Eco',
            'description' => 'Camiseta con estampado en forma de espiral, con varios colores en el espiral como azul y purpura , tinta utilizada ecologica',
            'price' => 21.9,
            'stock' => 10,
            'image1' => 'estampado1.jpg',
            'image2' => 'estampado2.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        App\Product::create([
            'id_category' => '2', 
            'name' => 'Camiseta de lineas Azul Eco',
            'description' => 'Camiseta con estampado con lineas, con varios colores en las lineas como azul y blanco , tinta utilizada ecologica',
            'price' => 21.9,
            'stock' => 10,
            'image1' => 'estampado3.jpg',
            'image2' => 'estampado4.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        App\Product::create([
            'id_category' => '2', 
            'name' => 'Camiseta de lineas Rosas Eco',
            'description' => 'Camiseta con estampado con una linea, con dos colores que separa la linea blanca , el rosa y el rosa oscuro , tinta utilizada ecologica',
            'price' => 21.9,
            'stock' => 10,
            'image1' => 'estampado5.jpg',
            'image2' => 'estampado6.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
