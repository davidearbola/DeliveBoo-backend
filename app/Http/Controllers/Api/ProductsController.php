<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(string $restaurants_id)
    {
        $validator = Validator::make(['restaurant_id' => $restaurants_id], [
            'restaurant_id' => 'integer|exists:restaurants,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid restaurant ID.',
            ], 400); // 400 Bad Request
        }

        $product = Product::where('restaurant_id', $restaurants_id)->with('restaurant')->get();

        return response()->json([
            'product' => $product,
        ]);
    }




    // aggiungere validazione del id ristorante e anche dei piatti se realmente sono contenuti in esso
    public function show(string $restaurants_id, string $product_id)
    {
        $product = Product::where('restaurant_id', $restaurants_id)->where('id', $product_id)->get();

        return response()->json([
            'product' => $product,
        ]);
    }
}
