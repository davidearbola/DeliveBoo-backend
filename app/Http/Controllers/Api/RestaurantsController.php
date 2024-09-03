<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantsController extends Controller
{
    // rotta per ricavare tutti i ristoranti
    public function allRestaurants()
    {
        // ??????
    }

    public function index(Request $request)
    {
        if ($request->categories) {
            // Controlla che i dati siano validi
            $request->validate([
                'categories.*' => 'integer|exists:categories,id'
            ]);
            // Se ho una singola categoria la trasformo in array così che il whereIn sia in grado di gestirlo
            $categories = (array) $request->categories;
            // Conto quante categorie sono state selezionate
            $categoryCount = count($categories);

            // Trova ristoranti che hanno tutte le categorie specificate
            $restaurants = Restaurant::whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('categories.id', $categories);
            }, '=', $categoryCount)->get();

            // DA MODIFICARE
            // if (empty($restaurant)) {
            //     return response()->json([
            //         'error' => 'RITENTA BELLO',
            //     ], 400); // 400 Bad Request
            // }

        } else {
            // Altrimenti, ottieni tutti i ristoranti
            $restaurants = Restaurant::all();
        }

        return response()->json([
            'restaurants' => $restaurants,
        ]);
    }

    // fai validazione
    public function show(string $restaurants_id)
    {
        $restaurant = Restaurant::where('id', $restaurants_id)->get();

        return response()->json([
            'restaurant' => $restaurant,
        ]);
    }
}
