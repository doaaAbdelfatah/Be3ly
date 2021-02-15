<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';
    // protected $fillable = ['name' ,'logo'];
    protected $guarded = [];

    // protected $hidden = [
    //     'logo' ,'name'
    // ];

    function branches(){
        return $this->hasMany(Branch::class , "store_id" ,"id");
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  strtolower($value) ;  // md5($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function store_expenses()
    {
        return $this->hasMany(StoreExpense::class, 'store_id', 'id');
    }


    public function expenses()
    {
        return $this->belongsToMany(Expense::class,  StoreExpense::class ,"store_id" , "expense_id");
    }
}
