<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function product_properties()
    {
        return $this->hasMany(ProductProperty::class, 'property_id', 'id');
    }
}
