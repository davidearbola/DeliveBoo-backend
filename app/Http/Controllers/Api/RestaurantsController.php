<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantsController extends Controller
{
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
            }, '=', $categoryCount)->with('categories')->get();
        } else {
            // Altrimenti, ottieni tutti i ristoranti
            $restaurants = Restaurant::with('categories')->get();
        }

        return response()->json([
            'restaurants' => $restaurants,
        ]);
    }

    // fai validazione
    public function show(string $restaurants_id)
    {
        $restaurant = Restaurant::where('id', $restaurants_id)->with(['user', 'categories'])->get();

        return response()->json([
            'restaurant' => $restaurant,
        ]);
    }
}
