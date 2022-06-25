<?php

namespace App\Models\Shop\Catalog\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
    protected $table = 'products';
}
