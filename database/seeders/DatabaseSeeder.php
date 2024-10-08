<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            CategoriesTableSeeder::class,
            UserSeeder::class,
            RestaurantsTableSeeder::class,
            ProductsTableSeeder::class,
            CategoryRestaurantTableSeeder::class,
            OrdersTableSeeder::class,
            OrderProductTableSeeder::class
        ]);
    }
}
