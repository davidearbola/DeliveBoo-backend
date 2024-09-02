<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $products = $restaurant->products()->get();

        return view('admin.products.index', compact('products'));

    }

  
    /**
     * Show 
     */
    public function create()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;

        return view('admin.products.create', compact('restaurant'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        
        $data = $request->validated();
        $data['restaurant_id'] = $restaurant->id;


        $image_path = Storage::disk("public")->put('uploads', $data->image_path);
        $data['image_path'] = $image_path;
        

        $newProduct = new Product();
        $newProduct->fill($data);
        $newProduct->save();
        
        return redirect()->route('admin.products.show', $newProduct->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $product = Product::where('restaurant_id', $restaurant->id)->findOrFail($id);
    
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $product = Product::where('restaurant_id', $restaurant->id)->findOrFail($id);
        
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $user = Auth::user();
        $restaurant = $user->restaurant;

        $data = $request->validated();
        $data['restaurant_id'] = $restaurant->id;


        if ($request->file('image_path')) {

            //Se il product già aveva un'immagine la si cancella e si mette la nuova
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            // save the image
            // $image_path = Storage::disk("public")->put('uploads', $data['image_path']);

            if ($request->hasFile('image_path')) {

                $image_path = $request->file('image_path')->store('uploads', 'public');

                $data['image_path'] = $image_path;
            }
        }

        $product->update($data);

        return redirect()->route('admin.products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $product = Product::where('restaurant_id', $restaurant->id)->findOrFail($id);

        if($product->image_path){
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index');
        
    }
}
