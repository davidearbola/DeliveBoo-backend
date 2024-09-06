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
            ['name' => 'Pizza', 'image_path' => 'https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/pizza-cat.png'],
            ['name' => 'Fast Food', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/fastfood-cat.png"],
            ['name' => 'Hamburger', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/hamb-cat.png"],
            ['name' => 'Italiano', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/spaghetti-cat.png"],
            ['name' => 'Panini', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/panini-cat.png"],
            ['name' => 'Sushi', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/sushi-cat.png"],
            ['name' => 'Gelato', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/gelato-cat.png"],
            ['name' => 'Vegano', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/vegan-cat.png"],
            ['name' => 'Kebab', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/kebab-cat.png"],
            ['name' => 'Piadine', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/piadina-cat.png"],
            ['name' => 'Cinese', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/cinese-cat.png"],
            ['name' => 'Messicano', 'image_path' => "https://raw.githubusercontent.com/davidearbola/prod-img-deliveboo/be31576b06c4ce70dad370418aaec3393093d5cb/messicano-cat.png"],
        ]);
    }
}
