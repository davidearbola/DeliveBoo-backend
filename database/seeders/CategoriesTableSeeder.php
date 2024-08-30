<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Pizza'],
            ['name' => 'Fast Food'],
            ['name' => 'Hamburger'],
            ['name' => 'Italiano'],
            ['name' => 'Panini'],
            ['name' => 'Sushi'],
            ['name' => 'Gelato'],
            ['name' => 'Vegano'],
            ['name' => 'Kebab'],
            ['name' => 'Piadine'],
            ['name' => 'Cinese'],
            ['name' => 'Messicano'],
        ]);
    }
}
