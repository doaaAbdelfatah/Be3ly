<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingOrder extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function selling_order_details()
    {
     return $this->hasMany(SellingOrderDetail::class, 'selling_order_id', 'id');
    }


}
