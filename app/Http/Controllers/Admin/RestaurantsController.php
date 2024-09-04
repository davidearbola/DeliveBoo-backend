<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;

        $categories = Category::all();

        return view('admin.restaurants.index', compact('restaurant', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = Auth::user();
        // $categories = Category::all();

        // //Se ha già un ristorante lo si rimanda alla index
        // if($user->restaurant){
        //     return redirect()->route('admin.restaurants.index');
        // }

        // //Altrimenti procede
        // return view('admin.restaurants.create', compact('user','categories'));
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        // $user = Auth::user();

        // $data = $request->validated();
        // $data['user_id'] = $user->id;


        // if ($request->hasFile('image_path')) {
        //     $image_path = $request->file('image_path')->store('uploads', 'public');
        //     $data['image_path'] = $image_path;
        // }

        // $newRestaurant = new Restaurant();
        // $newRestaurant->fill($data);
        // $newRestaurant->save();

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('admin.restaurants.index');
    }
}
