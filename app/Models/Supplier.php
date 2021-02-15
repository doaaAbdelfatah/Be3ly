<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;


   public function purchasing_orders()
   {
       return $this->hasMany(PurchasingOrder::class, 'supplier_id', 'id');
   }
}
