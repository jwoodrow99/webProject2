<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = [
        "product_code",
        "name",
        "description",
        "quantity",
        "price",
        "image"
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
