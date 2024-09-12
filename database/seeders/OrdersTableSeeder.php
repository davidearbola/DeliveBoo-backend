<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $startDate = Carbon::create(2023, 10, 1);
        $endDate = Carbon::now(); // Data odierna
        $numberOfOrdersPerMonth = 20;
        $restaurantId = 1; // Specifica il ristorante per tutti gli ordini

        while ($startDate->lte($endDate)) {
            for ($i = 0; $i < $numberOfOrdersPerMonth; $i++) {
                // Genera una data casuale tra l'inizio del mese e oggi
                $createdAt = $startDate->copy()->addDays(rand(0, $startDate->daysInMonth - 1));
                if ($createdAt->gt($endDate)) {
                    $createdAt = $endDate;
                }

                DB::table('orders')->insert([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address,
                    'total_price' => rand(100, 500) / 10,
                    'restaurant_id' => $restaurantId,
                    'created_at' => $createdAt->format('Y-m-d H:i:s'),
                    'updated_at' => now()->format('Y-m-d H:i:s'),
                ]);
            }
            $startDate->addMonth();
        }
    }
}
