<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Ristoratori per Pizza & Panini del Gusto
            [
                'email' => 'info@pizzapaninidelgusto.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 1
            ],
            // Ristoratori per FastBite
            [
                'email' => 'info@fastbite.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 2
            ],
            // Ristoratori per BelaVita
            [
                'email' => 'info@belavita.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 3
            ],
            // Ristoratori per Grill & Wrap
            [
                'email' => 'info@grillwrap.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 4
            ],
            // Ristoratori per Waggshii
            [
                'email' => 'info@waggshii.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 5
            ],
            // Ristoratori per Gelato d'Amore
            [
                'email' => 'info@gelatodamore.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 6
            ],
            // Ristoratori per Kebab e Pizza King
            [
                'email' => 'info@kebabepizzaking.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 7
            ],
            // Ristoratori per El Sombrero Mexicano
            [
                'email' => 'info@elsombrero.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 8
            ],
            // Ristoratori per La Cina in Tavola
            [
                'email' => 'info@lacinatavola.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 9
            ],
            // Ristoratori per Burger Express
            [
                'email' => 'info@burgerexpress.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 10
            ],
            // Ristoratori per Sushi Sensation
            [
                'email' => 'info@sushisensation.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 11
            ],
            // Ristoratori per Bella Pizza e Cucina
            [
                'email' => 'info@bellapizzaecucina.it',
                'password' => Hash::make('password123'),
                'restaurant_id' => 12
            ],
        ]);
    }
}
