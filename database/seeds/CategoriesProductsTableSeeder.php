<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
App\CategoryProduct::create(['category' =>'Man']);
App\CategoryProduct::create(['category' =>'Women']);
      /*  $faker = Faker::create();
        for ($i=0; $i < 2; $i++) {
            \DB::table('categoryproducts')->insert(array(
                'category'=>$faker->randomElement(['T-shirt','Trousers']),
           
    ));
}*/
    }
}
