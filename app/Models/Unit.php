<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasing_order_details()
    {
        return $this->hasMany(PurchasingOrderDetail::class, 'purchasing_order_detail_id', 'id');
    }

    public function selling_order_details()
    {
        return $this->hasMany(SellingOrderDetail::class, 'selling_order_detail_id', 'id');
    }
}
