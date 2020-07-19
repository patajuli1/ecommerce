<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'qty',
        'uom',
        'product_price'
    ];

    
}