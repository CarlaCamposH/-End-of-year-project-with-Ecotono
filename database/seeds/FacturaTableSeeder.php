<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Factura::create(['id_cupon' =>'1','name_user'=>'jean','total_price'=>'50.45','date'=>date('Y-m-d H:m:s'),'direccion_de_envio'=>'Monseny 37 08903 22 4 1',
        'productos'=>"Camiseta con Estampado Espiral Eco - Talla: XS - Cantidad: 1; Camiseta Verde Eco - Talla: XS - Cantidad: 1; ",'estado'=>'pagado']);
        App\Factura::create(['id_cupon' =>'2','name_user'=>'edu','total_price'=>'49.99',
        'date'=>date('Y-m-d H:m:s'),'direccion_de_envio'=>'Mas 37 08903 22 4 1','productos'=>"Camiseta con Estampado Espiral Eco - Talla: XS - Cantidad: 1; Camiseta Verde Eco - Talla: XS - Cantidad: 1; ",'estado'=>'pagado']);
       
    }
}
