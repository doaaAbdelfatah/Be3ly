<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingOrder extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, "created_by" , "id");
    }
    public function user_update()
    {
        return $this->belongsTo(User::class, "updated_by" , "id");
    }

    function purchasing_order_details(){
        return $this->hasMany(PurchasingOrderDetail::class, 'purchasing_order_id', 'id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class,PurchasingOrderDetail::class, 'purchasing_order_id', 'product_id');
    }

    //https://gist.github.com/alexweissman/cae6303d2476d18b4a10eeef38919fcf
}
