<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    // funzione protected per indicare a laravel il nome della tabella se non si seguono le convezioni 
    // in questo caso bisognerebbe usare order_products
    protected $table = 'order_product';

    protected $fillable = ['product_id', 'order_id', 'quantity', 'price', 'name'];
}
