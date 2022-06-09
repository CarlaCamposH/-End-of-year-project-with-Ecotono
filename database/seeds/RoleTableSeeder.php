<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Role::create(['role' =>'admin']);
        App\Role::create(['role' =>'client']);
        /*$faker = Faker::create();
        for ($i=0; $i < 2; $i++) {
            \DB::table('roles')->insert(array(
                'role'=>$faker->randomElement(['admin','client']),

    ));
}*/
    }
}
