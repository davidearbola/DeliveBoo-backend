<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RestaurantConfirmMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'total_price' => 'required|string',
            'restaurant_id' => 'required|integer',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|string',
            'products.*.name' => 'required|string',
        ]);

        DB::transaction(function () use ($validatedData) {
            // Crea l'ordine
            $order = Order::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'total_price' => floatval($validatedData['total_price']),
                'restaurant_id' => $validatedData['restaurant_id'],
            ]);

            // Crea le voci della tabella pivot
            foreach ($validatedData['products'] as $productData) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['product_id'],
                    'quantity' => $productData['quantity'],
                    'price' => floatval($productData['price']),
                    'name' => $productData['name'],
                ]);
            }
        });

        $restaurant = Restaurant::find($validatedData['restaurant_id']);
        $orderMail = [
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            "phone" => $validatedData['phone'],
            "address" => $validatedData['address'], 
            'total_price' => floatval($validatedData['total_price']),
            
            "products" => $validatedData['products'],
            "restaurant" => $restaurant,    
        ];
        Mail::to('hello@example.com')->send(new RestaurantConfirmMail($orderMail));

        return response()->json(['message' => 'Order placed successfully']);
    }
}
