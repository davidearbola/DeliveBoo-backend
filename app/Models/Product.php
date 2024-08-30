<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'price', 'visible', 'restaurant_id', 'type', 'image_path'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
