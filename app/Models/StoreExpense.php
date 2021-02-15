<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreExpense extends Model
{
    use HasFactory;

    protected $table = 'store_expenses';
    protected $guarded = [];

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
