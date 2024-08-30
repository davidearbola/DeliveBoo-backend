<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'total_price', 'restaurant_id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('quantity', 'price', 'name');
    }
}
