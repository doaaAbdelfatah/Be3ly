<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function purchasing_order_details(){
        return $this->hasMany(PurchasingOrderDetail::class, 'product_id', 'id');
    }


    public function purchasing_orders()
    {
        return $this->belongsToMany(PurchasingOrder::class,PurchasingOrderDetail::class, 'product_id' , 'purchasing_order_id');
    }

    // public function suppliers()
    // {

    //   //  return $this->belongsToMany(Supplier::class,PurchasingOrderDetail::class, 'product_id' , 'purchasing_order_id');
    // }
}
