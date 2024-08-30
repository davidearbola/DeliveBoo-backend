<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'address', 'PIVA', 'image_path'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_restaurant');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
