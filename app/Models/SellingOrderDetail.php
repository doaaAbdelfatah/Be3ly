<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingOrderDetail extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the SellingOrderDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function selling_order()
    {
        return $this->belongsTo(SellingOrder::class, 'selling_order_id', 'id');
    }
}
