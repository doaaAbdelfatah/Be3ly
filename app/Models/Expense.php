<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $guarded = [];

    /**
     * Get all of the comments for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function store_expenses()
    {
        return $this->hasMany(StoreExpense::class, 'expense_id', 'id');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class,  StoreExpense::class  , "expense_id" ,"store_id");
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class,  StoreExpense::class  , "expense_id" ,"branch_id");
    }

}
