<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $guarded = [];

    function store(){
        return $this->belongsTo(Store::class , "store_id" ,"id");
    }

    public function getInfoAttribute($value)
    {
        return "Store:" . $this->store->name ."-" . $this->name . "-" . $this->type;
    }

    public function store_expenses()
    {
        return $this->hasMany(StoreExpense::class, 'branch_id', 'id');
    }

    public function expenses()
    {
        return $this->belongsToMany(Expense::class,  StoreExpense::class ,"branch_id" , "expense_id");
    }

}
