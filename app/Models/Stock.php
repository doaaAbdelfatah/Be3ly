<?php

namespace App\Models;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(ProductController::class, 'product_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(BranchController::class, 'branch_id', 'id');
    }


    public function unit()
    {
        return $this->belongsTo(UnitController::class, 'unit_id', 'id');
    }
}
