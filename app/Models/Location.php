<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;


    public function shipping_company_prices()
    {
        return $this->hasMany(ShippingCompanyPrice::class, 'location_id', 'id');
    }

    public function selling_orders()
    {
        return $this->hasMany(SellingOrder::class, 'location_id', 'id');
    }
}
