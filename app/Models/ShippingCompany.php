<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    use HasFactory;


    public function shipping_company_prices()
    {
        return $this->hasMany(ShippingCompanyPrice::class, 'shipping_company_id', 'id');
    }


    public function selling_orders()
    {
        return $this->hasMany(SellingOrder::class, 'shipping_company_id', 'id');
    }
}
