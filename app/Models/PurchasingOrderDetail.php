<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingOrderDetail extends Model
{
    use HasFactory;

    function purchasing_order(){
        return $this->belongsTo(PurchasingOrder::class, 'purchasing_order_id', 'id');
    }

    function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
