<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Coupon::create(['code' =>'FRESH','discount'=>'50']);
        App\Coupon::create(['code' =>'FRISH','discount'=>'30']);
   /*     $faker = Faker::create();
        for ($i=0; $i < 2; $i++) {
            \DB::table('coupon')->insert(array(
                'code'=>$faker->randomElement(['FRESH','NEW']),
                'discount'=>$faker->randomElement([20,50,60]),
    ));
}*/
    }
}
