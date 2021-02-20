<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompanyPrice extends Model
{
    use HasFactory;


    public function location()

    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }


    public function shipping_company()

    {
        return $this->belongsTo(ShippingCompany::class, 'shipping_company_id', 'id');
    }
}
