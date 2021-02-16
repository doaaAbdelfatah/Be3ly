<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function productProperty()
    {
        return $this->hasMany(ProductProperty::class, 'property_id', 'id');
    }
}
