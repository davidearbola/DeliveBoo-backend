<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_restaurant')->insert([
            ['category_id' => 1, 'restaurant_id' => 1],
            ['category_id' => 5, 'restaurant_id' => 1],
            ['category_id' => 2, 'restaurant_id' => 2],
            ['category_id' => 4, 'restaurant_id' => 3],
            ['category_id' => 8, 'restaurant_id' => 3],
            ['category_id' => 3, 'restaurant_id' => 4],
            ['category_id' => 5, 'restaurant_id' => 4],
            ['category_id' => 10, 'restaurant_id' => 4],
            ['category_id' => 6, 'restaurant_id' => 5],
            ['category_id' => 11, 'restaurant_id' => 5],
            ['category_id' => 7, 'restaurant_id' => 6],
            ['category_id' => 9, 'restaurant_id' => 7],
            ['category_id' => 1, 'restaurant_id' => 7],
            ['category_id' => 5, 'restaurant_id' => 7],
            ['category_id' => 12, 'restaurant_id' => 8],
            ['category_id' => 11, 'restaurant_id' => 9],
            ['category_id' => 2, 'restaurant_id' => 10],
            ['category_id' => 3, 'restaurant_id' => 10],
            ['category_id' => 6, 'restaurant_id' => 11],
            ['category_id' => 1, 'restaurant_id' => 12],
            ['category_id' => 4, 'restaurant_id' => 12],
        ]);
    }
}
