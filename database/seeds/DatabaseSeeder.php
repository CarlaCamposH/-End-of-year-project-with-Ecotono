<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        $this->call(CategoriesProductsTableSeeder::class);
        $this->call(ProductsShirtsTableSeeder::class);
        
        $this->call(CouponTableSeeder::class);

        $this->call(FacturaTableSeeder::class);

        $this->call(FavoritosTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        
    }
}
