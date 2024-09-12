<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderProductTableSeeder extends Seeder
{
    public function run()
    {
        $restaurantId = 1; // Specifica il ristorante per tutti i prodotti
        $orders = DB::table('orders')->where('restaurant_id', $restaurantId)->pluck('id');
        $products = DB::table('products')->where('restaurant_id', $restaurantId)->pluck('id');

        foreach ($orders as $orderId) {
            $productIds = $products->random(rand(1, 14)); // Scegli casualmente 1 a 5 prodotti per ogni ordine

            foreach ($productIds as $productId) {
                DB::table('order_product')->insert([
                    'name' => DB::table('products')->where('id', $productId)->value('name'),
                    'quantity' => rand(1, 5),
                    'price' => DB::table('products')->where('id', $productId)->value('price'),
                    'product_id' => $productId,
                    'order_id' => $orderId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
